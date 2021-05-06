<?php

// To load configuration from env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'../');
$dotenv->load();

// here you can add your different db connections config
return [
    'db' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => $_ENV['DATABASE_URL'],
            'database' => $_ENV['DB_DATABASE'],
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => $_ENV['DATABASE_URL'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
        ],
    ],
];