<?php

namespace app\core\db;

/**
 * Interface ConnectionInterface
 * @package app\core\db
 */
interface ConnectionInterface
{
    /**
     * @param array $config
     * @return mixed
     */
    public static function getConnection($config = []);
}