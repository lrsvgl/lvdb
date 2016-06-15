<?php
namespace TYPO3\Lvdb\ViewHelpers;

/**
 * ViewHelper zur Rückgabe eines geparsten tt_content Elementes
 */

class ContentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
	 */
	protected $configurationManager;

	/**
	 * @var Content Object
	 */
	protected $cObj;

	/**
	 * Parse content element
	 *
	 * @param    int           UID des Content Element
	 * @return   string        Geparstes Content Element
	 */
	public function render($uid) {

		$conf = array( // config
			'tables' => 'tt_content',
			'source' => $uid,
			'dontCheckPid' => 1
		);
		return $this->cObj->RECORDS($conf);
	}

	/**
	 * Injects Configuration Manager
	 *
	 * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager
	 * @return void
	 */
	public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager) {
		$this->configurationManager = $configurationManager;
		$this->cObj = $this->configurationManager->getContentObject();
	}

}

?>