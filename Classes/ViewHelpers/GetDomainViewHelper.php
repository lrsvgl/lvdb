<?php

namespace TYPO3\Lvdb\ViewHelpers;

/**
 * 
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class getDomainViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

   /**
     * @param $link string Each `allowed` param need to have its line in PHPDoc
     * @return string
     */
    public function render($link) {
        $link = str_replace('http://', '', $link);
        $link = str_replace('https://', '', $link);
        $segments = explode('/', $link);
        $url = trim($segments[0]);
        $html = '<a href="http://'.$url.'" target="_blank">'.$url.'</a>';
        return $html;
    }
}
?>
