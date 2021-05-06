<?php

namespace app\core\db;

/**
 * Class Connection
 * @package app\core\db
 */
class Connection implements ConnectionInterface
{
    /**
     * Connection constructor.
     */
    private function __construct()
    {
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     * @param array $config
     * @return \PDO|null
     */
    public static function getConnection($config = []): ?\PDO
    {
        if ($config['driver'] === 'mysql') {
            $mySqlConnection =  new MysqlConnection();
            return $mySqlConnection->getConnection($config);
        }
    }
}