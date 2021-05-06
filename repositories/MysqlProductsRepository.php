<?php

namespace app\repositories;

use app\models\Product;
use app\repositories\contracts\ProductRepositoryInterface;

/**
 * Class MysqlProductsRepository
 * @package app\repositories
 */
class MysqlProductsRepository implements ProductRepositoryInterface
{
    /**
     * @var \app\models\Product
     */
    private Product $product;

    /**
     * MysqlProductsRepository constructor.
     * @param \app\models\Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function create($data)
    {
        $this->product->save($data);
    }
}