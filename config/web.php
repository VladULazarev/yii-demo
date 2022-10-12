<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'main',
    'defaultRoute' => 'home/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'oaZ14DZgDSWWtY9Ohr0vsvZUw5rX17Af',
            'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\swiftmailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default (true).
            'useFileTransport' => true,
            'transport' => [
                'dsn' => 'smtp://user_name_of_your_Mail_Client:password@name_of_your_Outgoing_Server:smtp_port',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'about' => 'home/about',
                'contact-us' => 'contact/index',
                'blog' => 'blog/index',
                'blog/tag/<tag:[a-zA-Z0-9-]+>' => 'blog/bytag',
                'blog/<slug:[a-zA-Z0-9-]+>' => 'blog/bycategory',
                'blog/<category_slug:[a-zA-Z0-9-]+>/<slug:[a-zA-Z0-9-]+>' => 'blog/show',
                'search-result' => 'blog/search',
                'contact-form' => 'contact/store',
                'comment-form' => 'comment/store',
                'site' => 'home/index',
                'site/login' => 'home/index',
                'site/logout' => 'home/index',
            ],
        ],

    ],
    'params' => $params,
];

// if (YII_ENV_DEV) {
//     // configuration adjustments for 'dev' environment
//     $config['bootstrap'][] = 'debug';
//     $config['modules']['debug'] = [
//         'class' => 'yii\debug\Module',
//         // uncomment the following to add your IP if you are not connecting from localhost.
//         //'allowedIPs' => ['127.0.0.1', '::1'],
//     ];

//     $config['bootstrap'][] = 'gii';
//     $config['modules']['gii'] = [
//         'class' => 'yii\gii\Module',
//         // uncomment the following to add your IP if you are not connecting from localhost.
//         //'allowedIPs' => ['127.0.0.1', '::1'],
//     ];
// }

return $config;
