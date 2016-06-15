<?php
namespace TYPO3\LvProddb\Domain\Session;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Erwin Knoll <typo3coding@rootsystem.de>, Rootsystem
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
 *  www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 * session handling
 *
 * @package lv_proddb
 * @license www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class SessionHandler {
 
    /**
     * Return stored session data
     * @return Object the stored object
     */
    public function restoreFromSession() {
        $sessionData = $GLOBALS['TSFE']->fe_user->getKey('ses', 'tx_lvproddb');
        return unserialize($sessionData);
    }
 
    /**
     * Write session data
     * @param    $object    any serializable object to store into the session
     * @return    TYPO3\LvProddb\Domain\Session\SessionHandler this
     */
    public function writeToSession($object) {
        $sessionData = serialize($object);
        $GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_lvproddb', $sessionData);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        return $this;
    }
 
    /**
     * Clean up session
     * @return    TYPO3\LvProddb\Domain\Session\SessionHandler this
     */
    public function cleanUpSession() {
        $GLOBALS['TSFE']->fe_user->setKey('ses', 'tx_lvproddb', NULL);
        $GLOBALS['TSFE']->fe_user->storeSessionData();
        return $this;
    }
}
?>