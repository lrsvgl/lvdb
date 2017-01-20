<?php

// Configuration/TypoScript werden überschrieben, aus .bak-Datei anpassen:
// constants.txt
// setup.txt

// ext_localconf.php
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache'])) {
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache'] = array();
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache']['frontend'] = 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend';
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache']['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend';
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache']['options']['compression'] = 1;
}


// ext_tables.php
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_datenbank';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_datenbank.xml');

/*
lat double(11,6) DEFAULT '0.00' NOT NULL,
lon double(11,6) DEFAULT '0.00' NOT NULL,
*/

//// Model Data:
///**
// * sliderbilder
// *
// * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
// * @lazy
// */
//protected $bilder = null;
//
//
///**
// * __construct
// *
// * @return AbstractObject
// */
//public function __construct() {
//    $this->sliderbilder = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
//}


// TCA

# allgemein:  'defaultExtras' => 'richtext[*]:rte_transform[mode=ts_links]'
# text acc2 ausblenden, wird aus Content Elemtent 164 befuellt

array (


    // data
    'sliderbilder' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.sliderbilder',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'sliderbilder',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                'foreign_types' => [
                    '0' => [
                        'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                        'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                        'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                        'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                        'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
                    ],
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                        'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
                    ]
                ],
                'maxitems' => 99
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),

    ],


	'newsuid' => [
		'exclude' => 0,
		'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.newsuid',
		'config' => [
			'type'     => 'select',
			'foreign_table' => 'tt_content',
			'foreign_table_where' => 'AND tt_content.CType = "list" AND tt_content.list_type = "news_pi1" ',
			'eval'     => 'int',
			'checkbox' => '0',
			'default' => 0
		]
	],
	'termineuid' => [
		'exclude' => 1,
		'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.termineuid',
		'config' => [
			'type'     => 'select',
			'foreign_table' => 'tt_content',
			'foreign_table_where' => 'AND tt_content.CType = "list" AND tt_content.list_type = "news_pi1" ',
			'eval'     => 'int',
			'checkbox' => '0',
			'default' => 0
		]
	],

);

