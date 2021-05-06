<?php

namespace app\repositories\contracts;

/**
 * Interface CustomerRepositoryInterface
 * @package app\repositories\contracts
 */
interface CustomerRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function create($data);
}