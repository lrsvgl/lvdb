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
 * Data
 */
class Data extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * text1
     *
     * @var string
     */
    protected $text1 = '';
    
    /**
     * img1
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $img1 = null;
    
    /**
     * text2
     *
     * @var string
     */
    protected $text2 = '';
    
    /**
     * img2
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $img2 = null;
    
    /**
     * text3
     *
     * @var string
     */
    protected $text3 = '';
    
    /**
     * textacc1
     *
     * @var string
     */
    protected $textacc1 = '';
    
    /**
     * textacc2
     *
     * @var string
     */
    protected $textacc2 = '';
    
    /**
     * textacc3
     *
     * @var string
     */
    protected $textacc3 = '';
    
    /**
     * adresse
     *
     * @var string
     */
    protected $adresse = '';
    
    /**
     * plz
     *
     * @var string
     */
    protected $plz = '';
    
    /**
     * ort
     *
     * @var string
     */
    protected $ort = '';
    
    /**
     * land
     *
     * @var string
     */
    protected $land = '';
    
    /**
     * telefon
     *
     * @var string
     */
    protected $telefon = '';
    
    /**
     * fax
     *
     * @var string
     */
    protected $fax = '';
    
    /**
     * email
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * sliderbilder
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @lazy
     */
    protected $sliderbilder = null;
    
    /**
     * lat
     *
     * @var float
     */
    protected $lat = 0.0;
    
    /**
     * lon
     *
     * @var float
     */
    protected $lon = 0.0;
    
    /**
     * geocode
     *
     * @var int
     */
    protected $geocode = 0;
    
    /**
     * newsuid
     *
     * @var int
     */
    protected $newsuid = 0;
    
    /**
     * termineuid
     *
     * @var int
     */
    protected $termineuid = 0;
    
    /**
     * __construct
     *
     * @return AbstractObject
     */
    public function __construct()
    {
        $this->sliderbilder = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the text1
     *
     * @return string text1
     */
    public function getText1()
    {
        return $this->text1;
    }
    
    /**
     * Sets the text1
     *
     * @param string $text1
     * @return void
     */
    public function setText1($text1)
    {
        $this->text1 = $text1;
    }
    
    /**
     * Returns the img1
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $img1
     */
    public function getImg1()
    {
        return $this->img1;
    }
    
    /**
     * Sets the img1
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $img1
     * @return void
     */
    public function setImg1(\TYPO3\CMS\Extbase\Domain\Model\FileReference $img1)
    {
        $this->img1 = $img1;
    }
    
    /**
     * Returns the text2
     *
     * @return string $text2
     */
    public function getText2()
    {
        return $this->text2;
    }
    
    /**
     * Sets the text2
     *
     * @param string $text2
     * @return void
     */
    public function setText2($text2)
    {
        $this->text2 = $text2;
    }
    
    /**
     * Returns the img2
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $img2
     */
    public function getImg2()
    {
        return $this->img2;
    }
    
    /**
     * Sets the img2
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $img2
     * @return void
     */
    public function setImg2(\TYPO3\CMS\Extbase\Domain\Model\FileReference $img2)
    {
        $this->img2 = $img2;
    }
    
    /**
     * Returns the text3
     *
     * @return string $text3
     */
    public function getText3()
    {
        return $this->text3;
    }
    
    /**
     * Sets the text3
     *
     * @param string $text3
     * @return void
     */
    public function setText3($text3)
    {
        $this->text3 = $text3;
    }
    
    /**
     * Returns the textacc1
     *
     * @return string textacc1
     */
    public function getTextacc1()
    {
        return $this->textacc1;
    }
    
    /**
     * Sets the textacc1
     *
     * @param string $textacc1
     * @return void
     */
    public function setTextacc1($textacc1)
    {
        $this->textacc1 = $textacc1;
    }
    
    /**
     * Returns the textacc2
     *
     * @return string textacc2
     */
    public function getTextacc2()
    {
        return $this->textacc2;
    }
    
    /**
     * Sets the textacc2
     *
     * @param string $textacc2
     * @return void
     */
    public function setTextacc2($textacc2)
    {
        $this->textacc2 = $textacc2;
    }
    
    /**
     * Returns the textacc3
     *
     * @return string textacc3
     */
    public function getTextacc3()
    {
        return $this->textacc3;
    }
    
    /**
     * Sets the textacc3
     *
     * @param string $textacc3
     * @return void
     */
    public function setTextacc3($textacc3)
    {
        $this->textacc3 = $textacc3;
    }
    
    /**
     * Returns the adresse
     *
     * @return string $adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
    
    /**
     * Sets the adresse
     *
     * @param string $adresse
     * @return void
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    
    /**
     * Returns the plz
     *
     * @return string $plz
     */
    public function getPlz()
    {
        return $this->plz;
    }
    
    /**
     * Sets the plz
     *
     * @param string $plz
     * @return void
     */
    public function setPlz($plz)
    {
        $this->plz = $plz;
    }
    
    /**
     * Returns the telefon
     *
     * @return string $telefon
     */
    public function getTelefon()
    {
        return $this->telefon;
    }
    
    /**
     * Sets the telefon
     *
     * @param string $telefon
     * @return void
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }
    
    /**
     * Returns the fax
     *
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }
    
    /**
     * Sets the fax
     *
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }
    
    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the ort
     *
     * @return string ort
     */
    public function getOrt()
    {
        return $this->ort;
    }
    
    /**
     * Sets the ort
     *
     * @param string $ort
     * @return void
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    }
    
    /**
     * Returns the lat
     *
     * @return float $lat
     */
    public function getLat()
    {
        return $this->lat;
    }
    
    /**
     * Sets the lat
     *
     * @param float $lat
     * @return void
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }
    
    /**
     * Returns the lon
     *
     * @return float $lon
     */
    public function getLon()
    {
        return $this->lon;
    }
    
    /**
     * Sets the lon
     *
     * @param float $lon
     * @return void
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
    }
    
    /**
     * Returns the geocode
     *
     * @return int $geocode
     */
    public function getGeocode()
    {
        return $this->geocode;
    }
    
    /**
     * Sets the geocode
     *
     * @param int $geocode
     * @return void
     */
    public function setGeocode($geocode)
    {
        $this->geocode = $geocode;
    }
    
    /**
     * Returns the land
     *
     * @return string $land
     */
    public function getLand()
    {
        return $this->land;
    }
    
    /**
     * Sets the land
     *
     * @param string $land
     * @return void
     */
    public function setLand($land)
    {
        $this->land = $land;
    }
    
    /**
     * Returns the newsuid
     *
     * @return int $newsuid
     */
    public function getNewsuid()
    {
        return $this->newsuid;
    }
    
    /**
     * Sets the newsuid
     *
     * @param int $newsuid
     * @return void
     */
    public function setNewsuid($newsuid)
    {
        $this->newsuid = $newsuid;
    }
    
    /**
     * Returns the sliderbilder
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $sliderbilder
     */
    public function getSliderbilder()
    {
        return $this->sliderbilder;
    }
    
    /**
     * Sets the sliderbilder
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $sliderbilder
     * @return void
     */
    public function setSliderbilder(\TYPO3\CMS\Extbase\Domain\Model\FileReference $sliderbilder)
    {
        $this->sliderbilder = $sliderbilder;
    }
    
    /**
     * Returns the termineuid
     *
     * @return int $termineuid
     */
    public function getTermineuid()
    {
        return $this->termineuid;
    }
    
    /**
     * Sets the termineuid
     *
     * @param int $termineuid
     * @return void
     */
    public function setTermineuid($termineuid)
    {
        $this->termineuid = $termineuid;
    }

}