<?php

use Xsigns\XsignsExt\Interface\Web\Controller\JsonReceiverController;
use Xsigns\XsignsExt\Interface\Web\Controller\AmenityController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

$extensionVendorAutoload = __DIR__ . '../../../vendor/autoload.php';
if (file_exists($extensionVendorAutoload)) {
    require_once $extensionVendorAutoload;
}

ExtensionUtility::configurePlugin(
    "Xsigns",
    "XsignsPlugin",
    [
        AmenityController::class => 'render, insert',
        JsonReceiverController::class => 'list, import',
    ],
    [
        JsonReceiverController::class => 'import',
        AmenityController::class => 'insert',
    ]
);