<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\MigrationController;

$migration = new MigrationController();

$migration->run();