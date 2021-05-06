<?php

namespace app\core\db;

use app\core\Model;

/**
 * Class DbModel
 * @package app\core\db
 */
abstract class DbModel extends Model
{
    /**
     * @var \app\core\db\ConnectionInterface|mixed
     */
    private ConnectionInterface $connection;

    /**
     * DbModel constructor.
     * @param \app\core\db\ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $config = require_once __DIR__.'/../../config/database.php';
        $this->connection = $connection::getConnection($config['db']['mysql']);
    }

    /**
     * @return string
     */
    abstract public static function tableName(): string;

    /**
     * @return string
     */
    public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * @param $data
     * @return integer
     */
    public function save($data): int
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_values($data);
        $values = "'" . implode( "','", $params ) . "'";
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (". $values.") ");
        try {
            $statement->execute();
        } catch ( \PDOException $e) {
            echo $e->getMessage();
        }

        return $this->connection->lastInsertId();
    }

    /**
     * @param $sql
     * @return \PDOStatement
     */
    public function prepare($sql): \PDOStatement
    {
        return $this->connection->prepare($sql);
    }
}