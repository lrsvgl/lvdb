<?php
namespace TYPO3\Lvdb\Domain\Model;

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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * img
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $img = null;
    
    /**
     * data
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Lvdb\Domain\Model\Data>
     */
    protected $data = null;
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->data = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Adds a Data
     *
     * @param \TYPO3\Lvdb\Domain\Model\Data $datum
     * @return void
     */
    public function addDatum(\TYPO3\Lvdb\Domain\Model\Data $datum)
    {
        $this->data->attach($datum);
    }
    
    /**
     * Removes a Data
     *
     * @param \TYPO3\Lvdb\Domain\Model\Data $datumToRemove The Data to be removed
     * @return void
     */
    public function removeDatum(\TYPO3\Lvdb\Domain\Model\Data $datumToRemove)
    {
        $this->data->detach($datumToRemove);
    }
    
    /**
     * Returns the data
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Lvdb\Domain\Model\Data> data
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * Sets the data
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\Lvdb\Domain\Model\Data> $data
     * @return void
     */
    public function setData(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $data)
    {
        $this->data = $data;
    }
    
    /**
     * Returns the img
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $img
     */
    public function getImg()
    {
        return $this->img;
    }
    
    /**
     * Sets the img
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $img
     * @return void
     */
    public function setImg(\TYPO3\CMS\Extbase\Domain\Model\FileReference $img)
    {
        $this->img = $img;
    }

}