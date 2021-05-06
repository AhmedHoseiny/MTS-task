<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\SeedController;

$seed = new SeedController();

try {
    $seed->seed();
} catch (\PhpOffice\PhpSpreadsheet\Reader\Exception | \PhpOffice\PhpSpreadsheet\Exception $e) {
    die('Error seeding file: '.$e->getMessage());

}