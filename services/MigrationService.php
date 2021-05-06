<?php

namespace app\services;

use app\repositories\contracts\MigrationRepositoryInterface;

/**
 * Class MigrationService
 * @package app\services
 */
class MigrationService
{
    /**
     * @var \app\repositories\contracts\MigrationRepositoryInterface
     */
    private MigrationRepositoryInterface $migrationRepo;

    /**
     * MigrationService constructor.
     * @param \app\repositories\contracts\MigrationRepositoryInterface $migrationRepo
     */
    public function __construct(MigrationRepositoryInterface $migrationRepo)
    {
        $this->migrationRepo = $migrationRepo;
    }

    /**
     * Run Migration
     */
    public function run()
    {
        $this->migrationRepo->applyMigration();
    }
}