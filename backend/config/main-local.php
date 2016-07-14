<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'nnWoj9YGQhEEL-XBsvpTGaq42qzVX1pp',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
	'allowedIPs' => ['127.0.0.1', '::1', '10.41.3.55', '*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
	'allowedIPs' => ['127.0.0.1', '::1', '10.41.3.55', '*'],
    ];
}

return $config;
