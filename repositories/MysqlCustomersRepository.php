<?php

namespace app\repositories;

use app\models\Customer;
use app\repositories\contracts\CustomerRepositoryInterface;

/**
 * Class MysqlCustomersRepository
 * @package app\repositories
 */
class MysqlCustomersRepository implements CustomerRepositoryInterface
{
    /**
     * @var \app\models\Customer
     */
    private Customer $customer;

    /**
     * MysqlCustomersRepository constructor.
     * @param \app\models\Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function create($data)
    {
        $this->customer->save($data);
    }
}