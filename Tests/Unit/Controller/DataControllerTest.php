<?php
namespace TYPO3\Lvdb\Tests\Unit\Controller;

/**
 * Test case for class TYPO3\Lvdb\Controller\DataController.
 *
 */
class DataControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * @var \TYPO3\Lvdb\Controller\DataController
     */
    protected $subject = NULL;

    public function setUp()
    {
        $this->subject = $this->getMock(\TYPO3\Lvdb\Controller\DataController::class, ['redirect', 'forward', 'addFlashMessage'], [], '', false);
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function listActionFetchesAllDatasFromRepositoryAndAssignsThemToView()
    {

        $allDatas = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, [], [], '', false);

        $dataRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\DataRepository::class, ['findAll'], [], '', false);
        $dataRepository->expects($this->once())->method('findAll')->will($this->returnValue($allDatas));
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $view->expects($this->once())->method('assign')->with('datas', $allDatas);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenDataToView()
    {
        $data = new \TYPO3\Lvdb\Domain\Model\Data();

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('data', $data);

        $this->subject->showAction($data);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenDataToDataRepository()
    {
        $data = new \TYPO3\Lvdb\Domain\Model\Data();

        $dataRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\DataRepository::class, ['add'], [], '', false);
        $dataRepository->expects($this->once())->method('add')->with($data);
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $this->subject->createAction($data);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenDataToView()
    {
        $data = new \TYPO3\Lvdb\Domain\Model\Data();

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('data', $data);

        $this->subject->editAction($data);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenDataInDataRepository()
    {
        $data = new \TYPO3\Lvdb\Domain\Model\Data();

        $dataRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\DataRepository::class, ['update'], [], '', false);
        $dataRepository->expects($this->once())->method('update')->with($data);
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $this->subject->updateAction($data);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenDataFromDataRepository()
    {
        $data = new \TYPO3\Lvdb\Domain\Model\Data();

        $dataRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\DataRepository::class, ['remove'], [], '', false);
        $dataRepository->expects($this->once())->method('remove')->with($data);
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $this->subject->deleteAction($data);
    }
}
