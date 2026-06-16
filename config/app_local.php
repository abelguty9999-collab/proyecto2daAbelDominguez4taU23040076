<?php
return [
    'debug' => true,

    'Security' => [
        'salt' => env('SECURITY_SALT', '3f108e2624287a28f5e5c802b8f237abd41a7b7b0262453e2896e6ab9a18b023'),
    ],

    'Datasources' => [
        'default' => [
            'host' => env('MYSQLHOST', 'localhost'),
            'port' => env('MYSQLPORT', '3306'),

            'username' => env('MYSQLUSER', 'root'),
            'password' => env('MYSQLPASSWORD', ''),

            'database' => env('MYSQLDATABASE', 'proyecto2daabeldominguez4tau23040076'),

            'url' => null,
        ],

        'test' => [
            'host' => 'localhost',
            'port' => '3306',
            'username' => 'root',
            'password' => '',
            'database' => 'test_proyecto2daabeldominguez4tau23040076',
            'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tmp/tests.sqlite'),
        ],
    ],

    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];