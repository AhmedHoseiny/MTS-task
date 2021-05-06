<?php

namespace app\repositories;

use app\core\db\ConnectionInterface;
use app\repositories\contracts\MigrationRepositoryInterface;

/**
 * Class MysqlMigrationRepository
 * @package app\repositories
 */
class MysqlMigrationRepository implements MigrationRepositoryInterface
{
    /**
     * @var \app\core\db\ConnectionInterface|mixed
     */
    private ConnectionInterface $connection;

    /**
     * MysqlMigrationRepository constructor.
     * @param \app\core\db\ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $config = require_once __DIR__.'/../config/database.php';
        $this->connection = $connection::getConnection($config['db']['mysql']);
    }

    /**
     * @return mixed|void
     */
    public function applyMigration()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(__DIR__ .'/../migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once __DIR__ .'/../migrations'. $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("There are no migrations to apply");
        }
    }

    /**
     * Create Migration
     */
    protected function createMigrationsTable()
    {
        $this->connection->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    /**
     * @return mixed
     */
    protected function getAppliedMigrations()
    {
        $statement = $this->connection->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    /**
     * @param array $newMigrations
     */
    protected function saveMigrations(array $newMigrations)
    {
        $str = implode(',', array_map(fn($m) => "('$m')", $newMigrations));
        $statement = $this->connection->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");
        $statement->execute();
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function prepare($sql)
    {
        return $this->connection->prepare($sql);
    }

    /**
     * @param $message
     */
    private function log($message)
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
    }
}