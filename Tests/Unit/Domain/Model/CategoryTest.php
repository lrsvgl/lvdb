<?php
namespace TYPO3\Lvdb\Tests\Unit\Domain\Model;

/**
 * Test case for class \TYPO3\Lvdb\Domain\Model\Category.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class CategoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \TYPO3\Lvdb\Domain\Model\Category
     */
    protected $subject = NULL;

    public function setUp()
    {
        $this->subject = new \TYPO3\Lvdb\Domain\Model\Category();
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
    public function getDescriptionReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImgReturnsInitialValueForFileReference()
    {
        $this->assertEquals(
            NULL,
            $this->subject->getImg()
        );

    }

    /**
     * @test
     */
    public function setImgForFileReferenceSetsImg()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImg($fileReferenceFixture);

        $this->assertAttributeEquals(
            $fileReferenceFixture,
            'img',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDataReturnsInitialValueForData()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->assertEquals(
            $newObjectStorage,
            $this->subject->getData()
        );

    }

    /**
     * @test
     */
    public function setDataForObjectStorageContainingDataSetsData()
    {
        $datum = new \TYPO3\Lvdb\Domain\Model\Data();
        $objectStorageHoldingExactlyOneData = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneData->attach($datum);
        $this->subject->setData($objectStorageHoldingExactlyOneData);

        $this->assertAttributeEquals(
            $objectStorageHoldingExactlyOneData,
            'data',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addDatumToObjectStorageHoldingData()
    {
        $datum = new \TYPO3\Lvdb\Domain\Model\Data();
        $dataObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['attach'], [], '', false);
        $dataObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($datum));
        $this->inject($this->subject, 'data', $dataObjectStorageMock);

        $this->subject->addDatum($datum);
    }

    /**
     * @test
     */
    public function removeDatumFromObjectStorageHoldingData()
    {
        $datum = new \TYPO3\Lvdb\Domain\Model\Data();
        $dataObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['detach'], [], '', false);
        $dataObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($datum));
        $this->inject($this->subject, 'data', $dataObjectStorageMock);

        $this->subject->removeDatum($datum);

    }
}
