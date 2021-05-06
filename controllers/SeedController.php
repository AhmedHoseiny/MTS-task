<?php

namespace app\controllers;

use app\services\SeedService;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Class SeedController
 * @package app\controllers
 */
class SeedController
{
    /**
     * @var \app\services\SeedService
     */
    private SeedService $seedService;

    /**
     * SeedController constructor.
     * @param \app\services\SeedService $seedService
     */
    public function __construct(SeedService $seedService)
    {
        $this->seedService = $seedService;
    }

    /**
     * Seed Data
     * @return string
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function seed(): string
    {
        $spreadsheet = $this->loadFile();
        try {
            $this->seedService->seedData($spreadsheet);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return 'All date are saved';
    }

    /**
     * Load Excel file
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function loadFile(): \PhpOffice\PhpSpreadsheet\Spreadsheet
    {
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        return $reader->load(__DIR__.'/../storage/excel/Data.xlsx');
    }
}