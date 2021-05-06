<?php

namespace app\models;

use app\core\db\DbModel;

/**
 * Class Product
 * @package app\models
 */
class Product extends DbModel
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'products';
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return ['name', 'price'];
    }
}