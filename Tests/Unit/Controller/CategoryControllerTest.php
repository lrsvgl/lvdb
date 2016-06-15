<?php
namespace TYPO3\Lvdb\Tests\Unit\Controller;

/**
 * Test case for class TYPO3\Lvdb\Controller\CategoryController.
 *
 */
class CategoryControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * @var \TYPO3\Lvdb\Controller\CategoryController
     */
    protected $subject = NULL;

    public function setUp()
    {
        $this->subject = $this->getMock(\TYPO3\Lvdb\Controller\CategoryController::class, ['redirect', 'forward', 'addFlashMessage'], [], '', false);
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function listActionFetchesAllCategoriesFromRepositoryAndAssignsThemToView()
    {

        $allCategories = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, [], [], '', false);

        $categoryRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\CategoryRepository::class, ['findAll'], [], '', false);
        $categoryRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCategories));
        $this->inject($this->subject, 'categoryRepository', $categoryRepository);

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $view->expects($this->once())->method('assign')->with('categories', $allCategories);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCategoryToView()
    {
        $category = new \TYPO3\Lvdb\Domain\Model\Category();

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('category', $category);

        $this->subject->showAction($category);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenCategoryToCategoryRepository()
    {
        $category = new \TYPO3\Lvdb\Domain\Model\Category();

        $categoryRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\CategoryRepository::class, ['add'], [], '', false);
        $categoryRepository->expects($this->once())->method('add')->with($category);
        $this->inject($this->subject, 'categoryRepository', $categoryRepository);

        $this->subject->createAction($category);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenCategoryToView()
    {
        $category = new \TYPO3\Lvdb\Domain\Model\Category();

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('category', $category);

        $this->subject->editAction($category);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenCategoryInCategoryRepository()
    {
        $category = new \TYPO3\Lvdb\Domain\Model\Category();

        $categoryRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\CategoryRepository::class, ['update'], [], '', false);
        $categoryRepository->expects($this->once())->method('update')->with($category);
        $this->inject($this->subject, 'categoryRepository', $categoryRepository);

        $this->subject->updateAction($category);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenCategoryFromCategoryRepository()
    {
        $category = new \TYPO3\Lvdb\Domain\Model\Category();

        $categoryRepository = $this->getMock(\TYPO3\Lvdb\Domain\Repository\CategoryRepository::class, ['remove'], [], '', false);
        $categoryRepository->expects($this->once())->method('remove')->with($category);
        $this->inject($this->subject, 'categoryRepository', $categoryRepository);

        $this->subject->deleteAction($category);
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCategoryToView()
    {
        $category = new \TYPO3\Lvdb\Domain\Model\Category();

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('category', $category);

        $this->subject->showAction($category);
    }
}
