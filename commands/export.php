<?php

require_once __DIR__ . '/../vendor/autoload.php';

$export = new \app\controllers\ExportController();

$export->export();