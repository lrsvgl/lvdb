<?php

namespace TYPO3\Lvdb\ViewHelpers;

/**
 * 
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class TelmobileViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

   /**
     * @param $tel string Each `allowed` param need to have its line in PHPDoc
     * @return string
     */
    public function render($tel) {
        $telmob = $tel;
        $telmob = str_replace(' ', '', $telmob);
        $telmob = str_replace('-', '', $telmob);
        $telmob = str_replace('|', '', $telmob);

        $html = '<a class="mobile" href="tel:'.$telmob.'">'.$tel.'</a>';

        return $html;
    }
}
?>
