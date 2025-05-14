<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

ExtensionUtility::registerPlugin(
    "Xsigns",
    "XsignsPlugin",
    "Xsigns Plugin"
);


$GLOBALS['TCA']['tx_xsigns_domain_model_jsondata'] = [
    'ctrl' => [
        'title' => 'LLL:EXT:xsigns/Resources/Private/Language/locallang_db.xlf:tx_xsigns_domain_model_jsondata',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'crdate',
        'delete' => 'deleted',
        'rootLevel' => 1,
        'enablecolumns' => [
            'disabled' => 'hidden',
        ]
    ],
    'columns' => [
        'title' => [
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'default' => '',
            ]
        ],
        'payload' => [
            'label' => 'Payload',
            'config' => [
                'type' => 'text',
                'eval' => 'trim',
            ]
        ]
    ],
    'types' => [
        '1' => ['showitem' => 'title, payload'],
    ],
];

$GLOBALS['TCA']['tx_xsigns_domain_model_amenity'] = [
    'ctrl' => [
        'title' => 'LLL:EXT:xsigns/Resources/Private/Language/locallang_db.xlf:tx_xsigns_domain_model_amenity',
        'label' => 'id',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'sortby' => 'crdate',
        'delete' => 'deleted',
        'rootLevel' => 1,
        'enablecolumns' => [
            'disabled' => 'hidden',
        ]
    ],
    'columns' => [
        'id' => [
            'label' => 'Id',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'default' => '',
            ]
        ],
        'icon' => [
            'label' => 'Icon',
            'config' => [
                'type' => 'text',
                'eval' => 'trim',
            ]
        ],
        'name' => [
            'label' => 'Name',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
            ]
        ]
    ],
    'types' => [
        '1' => ['showitem' => 'id, icon, name'],
    ],
];