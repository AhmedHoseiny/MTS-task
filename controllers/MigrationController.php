<?php

namespace app\controllers;

use app\services\MigrationService;

/**
 * Class MigrationController
 * @package app\controllers
 */
class MigrationController
{
    /**
     * @var \app\services\MigrationService
     */
    private MigrationService $migrationService;

    /**
     * MigrationController constructor.
     * @param \app\services\MigrationService $migrationService
     */
    public function __construct(MigrationService $migrationService)
    {
        $this->migrationService = $migrationService;
    }

    /**
     * @return string
     */
    public function run(): string
    {
        try {
            $this->migrationService->run();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return 'All data is migrated';
    }
}