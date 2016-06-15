<?php
namespace TYPO3\Lvdb\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
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
 * DataController
 */
class DataController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * dataRepository
     *
     * @var \TYPO3\Lvdb\Domain\Repository\DataRepository
     * @inject
     */
    protected $dataRepository = NULL;
    
    /**
     * categoryRepository
     *
     * @var \TYPO3\Lvdb\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = NULL;
    
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
        #die('datas');
        $datas = $this->dataRepository->findAll();
        $this->view->assign('datas', $datas);
    }
    
    /**
     * action show
     *
     * @param \TYPO3\Lvdb\Domain\Model\Data $data
     * @return void
     */
    public function showAction(\TYPO3\Lvdb\Domain\Model\Data $data)
    {
        //$bilder = $data->getBilder();
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($data, 'data');
        $dataUid = $data->getUid();
        $this->helperService->updateLatLon($dataUid);
        $this->view->assign('data', $data);
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
     * @param \TYPO3\Lvdb\Domain\Model\Data $newData
     * @return void
     */
    public function createAction(\TYPO3\Lvdb\Domain\Model\Data $newData)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->dataRepository->add($newData);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \TYPO3\Lvdb\Domain\Model\Data $data
     * @ignorevalidation $data
     * @return void
     */
    public function editAction(\TYPO3\Lvdb\Domain\Model\Data $data)
    {
        $this->view->assign('data', $data);
    }
    
    /**
     * action update
     *
     * @param \TYPO3\Lvdb\Domain\Model\Data $data
     * @return void
     */
    public function updateAction(\TYPO3\Lvdb\Domain\Model\Data $data)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->dataRepository->update($data);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \TYPO3\Lvdb\Domain\Model\Data $data
     * @return void
     */
    public function deleteAction(\TYPO3\Lvdb\Domain\Model\Data $data)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->dataRepository->remove($data);
        $this->redirect('list');
    }
    
    /**
     * action singleview
     *
     * @return void
     */
    public function singleviewAction()
    {
        $dataUid = $this->settings['dataUid'];
        $data = $this->dataRepository->findByUid($dataUid);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($data, 'data');
        $this->helperService->updateLatLon($dataUid);
        $this->view->assign('data', $data);
    }

}