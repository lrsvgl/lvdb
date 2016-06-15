<?php
namespace TYPO3\Lvdb\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * CategoryController
 */
class CategoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * categoryRepository
     *
     * @var \TYPO3\Lvdb\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = NULL;
    
    /**
     * dataRepository
     *
     * @var \TYPO3\Lvdb\Domain\Repository\DataRepository
     * @inject
     */
    protected $dataRepository = NULL;
    
    /**
     * @var \TYPO3\Lvdb\Service\HelperService
     * @inject
     */
    protected $helperService = null;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $categories = $this->categoryRepository->findAll();
        $datas = $this->dataRepository->findAll();
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->helperService->test());
        $this->_GP = $this->request->getArguments();
        if (!($this->_GP['lat'] && $this->_GP['lon'])) {
            // now get the startingpoint coordinates
            if (count($this->_GP) == 0) {
                $this->_GP['radius'] = 500;
                $theAddress = array(
                    'address' => $this->_GP['address'],
                    'zipcode' => $this->_GP['zipcode'],
                    'city' => 'oldenburg',
                    'country' => 'Deutschland'
                );
                $latLon = $this->helperService->geocode($theAddress);
            } else {
                // now get the startingpoint coordinates
                $theAddress = array(
                    'address' => $this->_GP['address'],
                    'zipcode' => $this->_GP['zipcode'],
                    'city' => $this->_GP['city'],
                    'country' => $this->_GP['country']
                );
                $latLon = $this->helperService->geocode($theAddress);
            }
        } else {
            // lat lon values were fetched by client
            $latLon = new \stdclass();
            $latLon->lat = $this->_GP['lat'];
            $latLon->lon = $this->_GP['lon'];
        }
        if ($latLon->status == 'ZERO_RESULTS') {
            $this->addFlashMessage('Extension: stores', 'No coordinates found!');
        }
        $this->view->assign('start', $theAddress);
        if ($latLon->status != 'ZERO_RESULTS') {
            $locations = $this->dataRepository->findLocationsInRadius($latLon, $this->_GP['radius'], $this->_GP['categories'], $this->settings['storagePid']);
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($locations , 'locations');
            if (count($locations) > 0) {
                $i = 0;
                foreach ($locations as $location) {
                    $imgRef = $this->dataRepository->findLocationImage($location['uid']);
                    //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($location['uid'], 'location uid');
                    //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($imgRef[0], 'location imgRef ');
                    $locations[$i]['imgRef'] = $imgRef[0];
                    $i++;
                }
            }
            if (count($locations) == 0) {
                $this->flashMessage('Extension: lvdb', 'No locations found');
            }
            //for ($i = 0; $i < count($locations); $i++) {
            //    $category[$i] = $this->categoriesRepository->findCategoriesByLocation($locations[$i]['uid']);
            //}
            //for ($i = 0; $i < count($locations); $i++) {
            //    $categories[$i] = $category[$i][0]['categories'];
            //}
            //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($locations, 'locations');
            $this->view->assign('startingPoint', $latLon);
            //$this->view->assign('categories', $categories);
            $this->view->assign('locations', $locations);
        }
        $this->view->assign('categories', $categories);
        $this->view->assign('datas', $datas);
    }
    
    /**
     * action show
     *
     * @param \TYPO3\Lvdb\Domain\Model\Category $category
     * @return void
     */
    public function showAction(\TYPO3\Lvdb\Domain\Model\Category $category)
    {
        // \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($category->getUid(), 'category');
        $locations = $category->getData();
        $locationsArray = $this->helperService->getLocationsArray($locations);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($locationsArray, 'locations');
        $this->view->assign('category', $category);
        $this->view->assign('locations', $locationsArray);
        $this->view->assign('categoryUid', $category->getUid());
    }
    
    /**
     * action catShow
     *
     * @return void
     */
    public function catShowAction()
    {
        $categoryUid = $this->settings['categoryUid'];
        $category = $this->categoryRepository->findByUid($categoryUid);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings, 'settings');
        // calculate the identifier for the cached entry
        $cacheIdentifier = $this->calculateCacheIdentifier(array(
            $GLOBALS['TSFE']->sys_language_uid,
            $GLOBALS['TSFE']->fe_user->groupData['uid'],
            $categoryUid
        ));
        //        // instantiate the cache
        //        $cache = $GLOBALS['typo3CacheManager']->getCache('lvdb_cache');
        //        if (($code = $cache->get($cacheIdentifier)) === false) {
        //            // the cached content is NOT available
        //            $this->view->assign('category', $category);
        //            // save content in cache
        //            $cache->set($cacheIdentifier, $category, array(
        //                'getAction_' . $categoryUid
        //            ));
        //        }
        $this->view->assign('locations', $category->getData());
        $this->view->assign('category', $category);
        $this->view->assign('categoryUid', $categoryUid);
    }
    
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param \TYPO3\Lvdb\Domain\Model\Category $newCategory
     * @return void
     */
    public function createAction(\TYPO3\Lvdb\Domain\Model\Category $newCategory)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->categoryRepository->add($newCategory);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \TYPO3\Lvdb\Domain\Model\Category $category
     * @ignorevalidation $category
     * @return void
     */
    public function editAction(\TYPO3\Lvdb\Domain\Model\Category $category)
    {
        $this->view->assign('category', $category);
    }
    
    /**
     * action update
     *
     * @param \TYPO3\Lvdb\Domain\Model\Category $category
     * @return void
     */
    public function updateAction(\TYPO3\Lvdb\Domain\Model\Category $category)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->categoryRepository->update($category);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \TYPO3\Lvdb\Domain\Model\Category $category
     * @return void
     */
    public function deleteAction(\TYPO3\Lvdb\Domain\Model\Category $category)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->categoryRepository->remove($category);
        $this->redirect('list');
    }
    
    /**
     * Calculates the cache identifier
     *
     * @param \array $arr
     * @return \string
     */
    public static function calculateCacheIdentifier($arr)
    {
        return sha1(json_encode($arr));
    }
    
    /**
     * action navigation
     *
     * @return void
     */
    public function navigationAction()
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings, 'settings');
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('categories', $categories);
    }

}