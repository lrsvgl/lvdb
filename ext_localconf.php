<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TYPO3.' . $extKey,
            'Datenbank',
            [
                'Category' => 'list, show, create, edit, update, delete, navigation, catShow',
                'Data' => 'list, show, create, edit, update, delete',
                
            ],
            // non-cacheable actions
            [
                'Category' => 'create, update',
                'Data' => 'create, update, delete',
                
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TYPO3.' . $extKey,
            'Navigation',
            [
                'Category' => 'navigation',
                
            ],
            // non-cacheable actions
            [
                'Category' => 'create, update',
                'Data' => 'create, update, delete',
                
            ]
        );

    },
    $_EXTKEY
);
// ext_localconf.php
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache'])) {
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache'] = array();
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache']['frontend'] = 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend';
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache']['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend';
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['lvdb_cache']['options']['compression'] = 1;
}
