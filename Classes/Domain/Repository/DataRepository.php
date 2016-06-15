<?php
namespace TYPO3\Lvdb\Domain\Repository;

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
 * The repository for Datas
 */
class DataRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Updates lat lon
     *
     * @return id
     */
    public function updateLatLon()
    {
        $query = $this->createQuery();
        $query->setLimit(100);
        return $query->matching($query->logicalAnd($query->equals('lat', ''), $query->equals('lon', '')))->execute();
    }
    
    /**
     * Find locations within radius
     *
     * @param stdClass $latLon
     * @param int $radius
     * @param $categories
     * @param $storagePid
     * @return Tx_Extbase_Persistence_QueryResultInterface The locations
     */
    public function findLocationsInRadius($latLon, $radius, $categories, $storagePid)
    {
        $radius = intval($radius);
        $categorySelect = '';
        $pi = M_PI;
        $lat = $latLon->lat;
        $lon = $latLon->lon;
        $query = $this->createQuery();
        //$query->getQuerySettings()->setReturnRawQueryResult(TRUE);
        for ($i = 0; $i < count($categories); $i++) {
            if ($i == 0) {
                $categorySelect .= ' AND (b.uid_local = ' . $categories[$i] . ' AND b.uid_foreign = a.uid';
            } else {
                $categorySelect .= ' OR (b.uid_local = ' . $categories[$i] . ' AND b.uid_foreign = a.uid)';
            }
        }
        if ($categorySelect) {
            $categorySelect .= ')';
        }
        //$categorySelect = '';
        $result = $query->statement("SELECT distinct\n\t\t\t\t\ta.*, c.uid AS cuid,\n\t\t\t\t\tc.title AS cname,\n\t\t\t\t\tb.*, (((acos(sin(({$lat}*{$pi}/180)) * sin((lat*{$pi}/180)) + cos(({$lat}*{$pi}/180)) *  cos((lat*{$pi}/180)) * cos((({$lon} - lon)*{$pi}/180)))))*6370) as distance\n\t\t\t\t\tFROM tx_lvdb_domain_model_data a, tx_lvdb_category_data_mm b, tx_lvdb_domain_model_category c\n\t\t\t\t\tWHERE a.title LIKE '%' " . $categorySelect . "\n\t\t             having distance <= {$radius}\n\t\t            AND b.uid_local = c.uid\n\t\t            AND b.uid_foreign = a.uid\n\t\t            AND a.deleted = 0\n\t\t            AND a. hidden = 0\n\t\t            ORDER by cname DESC, a.ort   ")->execute(true);
        //debug("SELECT distinct\n\t\t\t\t\ta.*, c.uid AS cuid,\n\t\t\t\t\tc.title AS cname,\n\t\t\t\t\tb.*, (((acos(sin(({$lat}*{$pi}/180)) * sin((lat*{$pi}/180)) + cos(({$lat}*{$pi}/180)) *  cos((lat*{$pi}/180)) * cos((({$lon} - lon)*{$pi}/180)))))*6370) as distance\n\t\t\t\t\tFROM tx_lvdb_domain_model_data a, tx_lvdb_category_data_mm b, tx_lvdb_domain_model_category c\n\t\t\t\t\tWHERE a.title LIKE '%' " . $categorySelect . "\n\t\t             having distance <= {$radius}\n\t\t            AND b.uid_foreign = c.uid\n\t\t            AND b.uid_local = a.uid\n\t\t            AND a.deleted = 0\n\t\t            AND a. hidden = 0\n\t\t            ORDER by cname DESC, a.ort   ");
        return $result;
    }
    
    /**
     * Finds lall ocations order by sorting
     *
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult
     * @param boolean $explainOutput
     * @return Tx_Extbase_Persistence_QueryResultInterface The locations
     * @return void
     */
    public function debugQuery(\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult, $explainOutput = FALSE)
    {
        $GLOBALS['TYPO3_DB']->debugOuput = 2;
        if ($explainOutput) {
            $GLOBALS['TYPO3_DB']->explainOutput = true;
        }
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = true;
        $queryResult->toArray();
        DebuggerUtility::var_dump($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery);
        $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = false;
        $GLOBALS['TYPO3_DB']->explainOutput = false;
        $GLOBALS['TYPO3_DB']->debugOuput = false;
    }
    
    /**
     * Find Images for a location in search result
     *
     * @param $uid
     * @return Tx_Extbase_Persistence_QueryResultInterface The locations
     */
    public function findLocationImage($uid)
    {
        $query = $this->createQuery();
        $result = $query->statement('
				SELECT uid_local FROM sys_file_reference
				WHERE uid_foreign = ' . $uid . '
				AND deleted = 0
				AND hidden = 0
	            AND tablenames = \'tx_lvdb_domain_model_data\'
				AND fieldname = \'image\'
			')->execute(true);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($result, ' result locations');
        return $result;
    }

}