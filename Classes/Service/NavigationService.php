<?php

namespace TYPO3\LvProddb\Service;

class NavigationService {

    /**
     *
     * Enter description here ...
     * @var \TYPO3\LvProddb\Service\CacheService
     * @inject
     */
    protected $pdCacheService;

    /**
     * produktkategorieRepository
     *
     * @var \TYPO3\LvProddb\Domain\Repository\ProduktkategorieRepository
     * @inject
     */
    protected $produktkategorieRepository;

    /**
     * produktkategorie
     *
     * @var \TYPO3\LvProddb\Domain\Model\Produktkategorie
     * @inject
     */
    protected $produktkategorie;

    /**
     * @var \TYPO3\CMS\Extbase\MVC\Web\Routing\UriBuilder
     */
    protected $uriBuilder;

    /**
     * settings
     *
     * @var array $settings
     */
    protected $settings;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * 
     */
    protected $configurationManager;

    /**
     * Injects the Configuration Manager
     *
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     * @return void
     */
    public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager) {
        $this->configurationManager = $configurationManager;
    }

    /**
     *
     */
    public function initializeObject() {
        $this->settings = $this->configurationManager->getConfiguration('Settings', 'LvProddb', 'Produktdatenbank');
    }

    protected function cat2Array(\TYPO3\LvProddb\Domain\Model\Produktkategorie $cat) {


        $cur_id = $_GET['tx_lvproddb_produktdatenbank']['produktkategorie'];
        $cat_id = $cat->getUid();

        if ($cur_id == $cat_id) {
            $itemState = "ACT";
        } else {
            $itemState = "NO";
        }

        #var_dump("<br>CUR: " . $cur_id . " CAT: " . $cat_id);

        $ret = array(
            "uid" => $this->settings['kategoriePid'],
            "title" => $cat->getName(),
            "_OVERRIDE_HREF" => $this->getUriBuilder()
                    ->reset()
                    ->setTargetPageUid('43')
                    ->setAddQueryString(false)
                    ->uriFor("show", array("produktkategorie" => $cat->getUid()), "Produktkategorie", "LvProddb", "Produktdatenbank"),
            'ITEM_STATE' => $itemState
        );
        return $ret;
    }

    protected function getNavigationArrayWithoutState(\TYPO3\LvProddb\Domain\Model\Produktkategorie $cat = null, $level = 1) {
        if (is_null($cat)) {
            $id = 0;
        } else {

            $id = $cat->getUid();
        }

        // Cache aus, sonst veraltetet Status für unternavi
        //        $cached = unserialize($this->pdCacheService->get("navigationWithoutState" . $uid . $level));
        //        if (count($cached) > 1) {
        //            return $cached;
        //        }
        #$itemState = "NO";

        $i = 0;
        if (is_null($cat)) {
            $unterkategorien = $this->produktkategorieRepository->findFirstLevel();
            #var_dump("obj is_null: " . is_object($unterkategorien));
        } else {
            $ret = $this->cat2Array($cat);
            $unterkategorien = $cat->getUnterkategorien();
            #var_dump("cat uid: ".$cat->getName());
            #var_dump("obj not null: " . is_object($unterkategorien));
        }

        #var_dump("obj: " . is_object($unterkategorien));

        for ($unterkategorien->rewind(); $unterkategorien->valid(); $unterkategorien->next()) {
            $ucat = $unterkategorien->current();



            $data = $this->getNavigationArrayWithoutState($ucat, $level + 1);



            if (is_object($cat)) {
                $ret['_SUB_MENU'][$ucat->getUid()] = $data;
                ##var_dump("<br>BB: ".$ucat->getUid());
            } else {
                $ret[$ucat->getUid()] = $data;
                ##var_dump("<br>AA: ".$ucat->getUid());
            }
        }
        if ($level == 1) {
            $this->pdCacheService->set("navigationWithoutState" . $uid . $level, serialize($ret));
        }
        return $ret;
    }

    public function getCurrentNavigationArray(\TYPO3\LvProddb\Domain\Model\Produktkategorie $cat = null) {
        //$cached = unserialize($this->pdCacheService->get("currentNavi".$_GET['tx_lvproddb_produktdatenbank']['produktkategorie']));
        //        if (count($cached) > 0) {
        //            return $cached;
        //        }



        $without = $this->getNavigationArrayWithoutState($cat);
        //var_dump($without);
        if ($_GET['tx_lvproddb_produktdatenbank']['produktkategorie']) {


            #var_dump("ID: ".$_GET['tx_lvproddb_produktdatenbank']['produktkategorie']);

            $rootcat = $this->findRootline($this->produktkategorieRepository->findByUid($_GET['tx_lvproddb_produktdatenbank']['produktkategorie']));
            foreach ($without as $k1 => $l1) {



                if (in_array($k1, $rootcat)) {
                    $without[$k1]['ITEM_STATE'] = "ACT";
                    foreach ($l1['_SUB_MENU'] as $k2 => $l2) {
                        if (in_array($k2, $rootcat)) {
                            foreach ($l2['_SUB_MENU'] as $k3 => $l3) {
                                if (in_array($k3, $rootcat)) {
                                    
                                }
                            }
                            $without[$k1]['_SUB_MENU'][$k2]['ITEM_STATE'] = "ACT";
                        } else {
                            $without[$k1]['_SUB_MENU'][$k2]['_SUB_MENU'] = array();
                        }
                    }
                }
            }
        }
        //$this->pdCacheService->set("currentNavi".$_GET['tx_lvproddb_produktdatenbank']['produktkategorie'],serialize($without));

        return $without;
    }

    /**
     * findRootKategorie
     *
     * @param \TYPO3\LvProddb\Domain\Model\Produktkategorie $produktkategorie
     * @return
     */
    public function findRootline(\TYPO3\LvProddb\Domain\Model\Produktkategorie $produktkategorie) {
        $cached = unserialize($this->pdCacheService->get("rootline" . $produktkategorie->getUid()));

        if ($cached) {
            return $cached;
        }
        $ret = array();
        $parent = $produktkategorie->getProduktkategorie();
        $ret[] = $produktkategorie->getUid();
        if (is_object($parent)) {
            $ret = array_merge($ret, $this->findRootline($parent));
        }
        $this->pdCacheService->set("rootline" . $produktkategorie->getUid(), serialize($ret));
        return $ret;
    }

    public function setUriBuilder($builder) {
        $this->uriBuilder = $builder;
    }

    public function getUriBuilder() {
        return $this->uriBuilder;
    }

}