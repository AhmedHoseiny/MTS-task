<?php

namespace app\controllers;

use app\services\ExportService;

/**
 * Class ExportController
 * @package app\controllers
 */
class ExportController
{
    /**
     * @var \app\services\ExportService
     */
    private ExportService $exportService;

    /**
     * ExportController constructor.
     * @param \app\services\ExportService $exportService
     */
    public function __construct(ExportService $exportService)
    {
        $this->exportService = $exportService;
    }

    /**
     * Export
     * @return string
     */
    public function export(): string
    {
        try {
            $this->exportService->exportData();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return 'exported';
    }
}