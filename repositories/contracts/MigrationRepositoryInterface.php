<?php

namespace app\repositories\contracts;

/**
 * Interface MigrationRepositoryInterface
 * @package app\repositories\contracts
 */
interface MigrationRepositoryInterface
{
    /**
     * @return mixed
     */
    public function applyMigration();
}