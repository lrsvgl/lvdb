<?php

namespace TYPO3\Lvdb\ViewHelpers;

/**
 * 
 *
 * @package TYPO3
 * @subpackage Fluid
 * @version
 */
class PdfViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

    /**
     * Renders some classic dummy content: Lorem Ipsum...
     *
     * @param string $path The number of characters of the dummy content
     * @validate $path
     * @return string
     * @author Lars Vogel <l.vogel@nexgo.de>
     */
    public function render($path) {
        
        clearstatcache();
        
        #$file = "uploads/tx_lvproddb/Stepdateien/P1090.stp";
        $file = "uploads/tx_lvproddb/PDF/".$path;
        
        $isFile = file_exists($file);
        if ($isFile) {
            $html = '
                <li class="cad">
                    <a href="'.$file.'" target="blank" alt="'.$path.' PDF">Produktdownload (PDF)</a>
                </li>
                ';
        } else {
            $html = '';
            #$html ="";
        }
        
        #
        #var_dump("<br>path ".$path);
        #var_dump("<br>isfile? ".$isFile);

        return $html;
    }

}

?>