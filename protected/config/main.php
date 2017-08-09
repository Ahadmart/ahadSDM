<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'ahadSDM',
    'theme' => 'adminlte', // bootstrap,
    'defaultController' => 'sistem',
    // preloading 'log' component
    'preload' => ['log'],
    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.components.*',
    ],
    'modules' => [
        // uncomment the following to enable the Gii tool

        'gii' => [
            'class' => 'system.gii.GiiModule',
            'password' => 'abc',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => ['127.0.0.1', '::1'],
        ],
    ],
    // application components
    'components' => [
        'user' => [
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => ['sistem/login'],
        ],
        // uncomment the following to enable URLs in path-format
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => [
            // use 'sistem/error' action to display errors
            'errorAction' => YII_DEBUG ? null : 'sistem/error',
        ],
        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ],
        ],
        'authManager' => [
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'defaultRoles' => ['authenticated'],
        ],
        'clientScript' => [
            'packages' => [
                'jquery' => [
                    'baseUrl' => 'js',
                    'js' => ['jquery.min.js']
                ]
            ]
        ],
    ],
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => [
        // dipakai untuk authManager
        'superuser' => 'admin',
        // this is used in contact page
        'adminEmail' => 'admin@example.com',
    ],
];
