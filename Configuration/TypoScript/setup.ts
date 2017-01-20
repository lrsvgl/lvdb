
plugin.tx_lvdb_datenbank {
  view {
    templateRootPaths.0 = EXT:lvdb/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_lvdb_datenbank.view.templateRootPath}
    partialRootPaths.0 = EXT:lvdb/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_lvdb_datenbank.view.partialRootPath}
    layoutRootPaths.0 = EXT:lvdb/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_lvdb_datenbank.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_lvdb_datenbank.persistence.storagePid}
  }
  settings {
    detailsPid = {$plugin.tx_lvdb_datenbank.settings.detailsPid}
    categoryPid = {$plugin.tx_lvdb_datenbank.settings.categoryPid}
    debug = {$plugin.tx_lvdb_datenbank.settings.debug}
    dataInterval = {$plugin.tx_lvdb_datenbank.settings.dataInterval}
    googleApiLink = {$plugin.tx_lvdb_datenbank.settings.googleApiLink}
  }
}

plugin.tx_lvdb_navigation {
  view {
    templateRootPaths.0 = EXT:lvdb/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_lvdb_navigation.view.templateRootPath}
    partialRootPaths.0 = EXT:lvdb/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_lvdb_navigation.view.partialRootPath}
    layoutRootPaths.0 = EXT:lvdb/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_lvdb_navigation.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_lvdb_navigation.persistence.storagePid}
  }
  settings {
    detailsPid = {$plugin.tx_lvdb_navigation.settings.detailsPid}
    categoryPid = {$plugin.tx_lvdb_navigation.settings.categoryPid}
    debug = {$plugin.tx_lvdb_navigation.settings.debug}
  }
}

plugin.tx_lvdb._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-lvdb table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-lvdb table th {
        font-weight:bold;
    }

    .tx-lvdb table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
