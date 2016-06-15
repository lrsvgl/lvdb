<?php
namespace TYPO3\Lvdb\Tests\Unit\Domain\Model;

/**
 * Test case for class \TYPO3\Lvdb\Domain\Model\Data.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class DataTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \TYPO3\Lvdb\Domain\Model\Data
     */
    protected $subject = NULL;

    public function setUp()
    {
        $this->subject = new \TYPO3\Lvdb\Domain\Model\Data();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getText1ReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getText1()
        );

    }

    /**
     * @test
     */
    public function setText1ForStringSetsText1()
    {
        $this->subject->setText1('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'text1',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImg1ReturnsInitialValueForFileReference()
    {
        $this->assertEquals(
            NULL,
            $this->subject->getImg1()
        );

    }

    /**
     * @test
     */
    public function setImg1ForFileReferenceSetsImg1()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImg1($fileReferenceFixture);

        $this->assertAttributeEquals(
            $fileReferenceFixture,
            'img1',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getText2ReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getText2()
        );

    }

    /**
     * @test
     */
    public function setText2ForStringSetsText2()
    {
        $this->subject->setText2('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'text2',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImg2ReturnsInitialValueForFileReference()
    {
        $this->assertEquals(
            NULL,
            $this->subject->getImg2()
        );

    }

    /**
     * @test
     */
    public function setImg2ForFileReferenceSetsImg2()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImg2($fileReferenceFixture);

        $this->assertAttributeEquals(
            $fileReferenceFixture,
            'img2',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getText3ReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getText3()
        );

    }

    /**
     * @test
     */
    public function setText3ForStringSetsText3()
    {
        $this->subject->setText3('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'text3',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTextacc1ReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getTextacc1()
        );

    }

    /**
     * @test
     */
    public function setTextacc1ForStringSetsTextacc1()
    {
        $this->subject->setTextacc1('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'textacc1',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTextacc2ReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getTextacc2()
        );

    }

    /**
     * @test
     */
    public function setTextacc2ForStringSetsTextacc2()
    {
        $this->subject->setTextacc2('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'textacc2',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTextacc3ReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getTextacc3()
        );

    }

    /**
     * @test
     */
    public function setTextacc3ForStringSetsTextacc3()
    {
        $this->subject->setTextacc3('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'textacc3',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getAdresseReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getAdresse()
        );

    }

    /**
     * @test
     */
    public function setAdresseForStringSetsAdresse()
    {
        $this->subject->setAdresse('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'adresse',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPlzReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getPlz()
        );

    }

    /**
     * @test
     */
    public function setPlzForStringSetsPlz()
    {
        $this->subject->setPlz('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'plz',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getOrtReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getOrt()
        );

    }

    /**
     * @test
     */
    public function setOrtForStringSetsOrt()
    {
        $this->subject->setOrt('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'ort',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getLandReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getLand()
        );

    }

    /**
     * @test
     */
    public function setLandForStringSetsLand()
    {
        $this->subject->setLand('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'land',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTelefonReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getTelefon()
        );

    }

    /**
     * @test
     */
    public function setTelefonForStringSetsTelefon()
    {
        $this->subject->setTelefon('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'telefon',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getFaxReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getFax()
        );

    }

    /**
     * @test
     */
    public function setFaxForStringSetsFax()
    {
        $this->subject->setFax('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'fax',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getEmail()
        );

    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail()
    {
        $this->subject->setEmail('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'email',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getSliderbilderReturnsInitialValueForFileReference()
    {
        $this->assertEquals(
            NULL,
            $this->subject->getSliderbilder()
        );

    }

    /**
     * @test
     */
    public function setSliderbilderForFileReferenceSetsSliderbilder()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setSliderbilder($fileReferenceFixture);

        $this->assertAttributeEquals(
            $fileReferenceFixture,
            'sliderbilder',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getLatReturnsInitialValueForFloat()
    {
        $this->assertSame(
            0.0,
            $this->subject->getLat()
        );

    }

    /**
     * @test
     */
    public function setLatForFloatSetsLat()
    {
        $this->subject->setLat(3.14159265);

        $this->assertAttributeEquals(
            3.14159265,
            'lat',
            $this->subject,
            '',
            0.000000001
        );

    }

    /**
     * @test
     */
    public function getLonReturnsInitialValueForFloat()
    {
        $this->assertSame(
            0.0,
            $this->subject->getLon()
        );

    }

    /**
     * @test
     */
    public function setLonForFloatSetsLon()
    {
        $this->subject->setLon(3.14159265);

        $this->assertAttributeEquals(
            3.14159265,
            'lon',
            $this->subject,
            '',
            0.000000001
        );

    }

    /**
     * @test
     */
    public function getGeocodeReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setGeocodeForIntSetsGeocode()
    {
    }

    /**
     * @test
     */
    public function getNewsuidReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setNewsuidForIntSetsNewsuid()
    {
    }
}
