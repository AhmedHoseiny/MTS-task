<?php

namespace app\repositories\contracts;

/**
 * Interface InvoicesRepositoryInterface
 * @package app\repositories\contracts
 */
interface InvoicesRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function create($data);
}