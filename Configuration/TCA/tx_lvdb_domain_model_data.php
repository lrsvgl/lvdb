<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
		'versioningWS' => 2,
        'versioning_followPages' => true,

        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
        'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,text1,img1,text2,img2,text3,img3,textacc1,textacc2,textacc3,adresse,plz,ort,land,telefon,fax,email,sliderbilder,lat,lon,geocode,newsuid,termineuid,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('lvdb') . 'Resources/Public/Icons/tx_lvdb_domain_model_data.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, text1, img1, text2, img2, text3, img3, textacc1, textacc2, textacc3, adresse, plz, ort, land, telefon, fax, email, sliderbilder, lat, lon, geocode, newsuid, termineuid',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, text1;;;richtext:rte_transform[mode=ts_links], img1, text2;;;richtext:rte_transform[mode=ts_links], img2, text3;;;richtext:rte_transform[mode=ts_links], img3, textacc1;;;richtext:rte_transform[mode=ts_links], textacc2;;;richtext:rte_transform[mode=ts_links], textacc3;;;richtext:rte_transform[mode=ts_links], adresse, plz, ort, land, telefon, fax, email, sliderbilder, lat, lon, geocode, newsuid, termineuid, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'palettes' => [
        '1' => ['showitem' => ''],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ],
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_lvdb_domain_model_data',
                'foreign_table_where' => 'AND tx_lvdb_domain_model_data.pid=###CURRENT_PID### AND tx_lvdb_domain_model_data.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],

	    'title' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.title',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'text1' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.text1',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'rte[]'
	    ],
	    'img1' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.img1',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'img1',
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
			        'maxitems' => 1
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	        
	    ],
	    'text2' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.text2',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'rte[]'
	    ],
	    'img2' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.img2',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'img2',
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
			        'maxitems' => 1
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	        
	    ],
	    'text3' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.text3',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'rte[]'
	    ],
	    'img3' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.img3',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'img3',
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
			        'maxitems' => 1
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),

	    ],
	    'textacc1' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.textacc1',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'rte[]'
	    ],
	    'textacc2' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.textacc2',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'rte[]'
	    ],
	    'textacc3' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.textacc3',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim',
			],
	        'defaultExtras' => 'rte[]'
	    ],
	    'adresse' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.adresse',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'plz' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.plz',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'ort' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.ort',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'land' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.land',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'telefon' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.telefon',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'fax' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.fax',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'email' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.email',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
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
	    'lat' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.lat',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2'
			]
	        
	    ],
	    'lon' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.lon',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2'
			]
	        
	    ],
	    'geocode' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:lvdb/Resources/Private/Language/locallang_db.xlf:tx_lvdb_domain_model_data.geocode',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	        
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
        
    ],
];
