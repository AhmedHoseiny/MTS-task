<?php

namespace app\core\db;

/**
 * Class MysqlConnection
 * @package app\core\db
 */
class MysqlConnection implements ConnectionInterface
{
    /**
     * Singleton instance
     * @var \PDO|null
     */
    private static ? \PDO $dbInstance = null;

    /**
     * @param array $config
     * @return \PDO|null
     */
    public static function getConnection($config = []): ?\PDO
    {
        $dbDsn =  $config['driver'].':host='.$config['host'].';port='.$config['port'].';dbname='.$config['database'].';' ?? '';
        $username = $config['username'] ?? '';
        $password = $config['password'] ?? '';

        // Check if database is null
        if ( self::$dbInstance == null  ) {
            // Create a new PDO connection
            try {
                self::$dbInstance = new \PDO($dbDsn, $username, $password);
			} catch (\Exception $e) {
				echo $e->getMessage();
			}
		}

		return self::$dbInstance;
    }
}