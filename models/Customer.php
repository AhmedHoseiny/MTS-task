<?php

namespace app\models;

use app\core\db\DbModel;

/**
 * Class Customer
 * @package app\models
 */
class Customer extends DbModel
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'customers';
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return ['name', 'address'];
    }

    /**
     * @param $data
     * @return int
     */
    public function save($data): int
    {
        return parent::save($data);
    }
}