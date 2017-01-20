<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'TYPO3.' . $extKey,
            'Datenbank',
            'Datenbank'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'TYPO3.' . $extKey,
            'Navigation',
            'Navigation'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Datenbank');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lvdb_domain_model_data', 'EXT:lvdb/Resources/Private/Language/locallang_csh_tx_lvdb_domain_model_data.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lvdb_domain_model_data');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_lvdb_domain_model_category', 'EXT:lvdb/Resources/Private/Language/locallang_csh_tx_lvdb_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_lvdb_domain_model_category');

    },
    $_EXTKEY
);

// ext_tables.php
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_datenbank';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_datenbank.xml');