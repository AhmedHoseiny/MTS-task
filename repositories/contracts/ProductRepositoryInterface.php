<?php

namespace app\repositories\contracts;

/**
 * Interface ProductRepositoryInterface
 * @package app\repositories\contracts
 */
interface ProductRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function create($data);
}