<?php

namespace app\repositories;

use app\models\Invoice;
use app\repositories\contracts\InvoicesRepositoryInterface;

/**
 * Class MysqlInvoicesRepository
 * @package app\repositories
 */
class MysqlInvoicesRepository implements InvoicesRepositoryInterface
{
    /**
     * @var \app\models\Invoice
     */
    private Invoice $invoice;

    /**
     * MysqlInvoicesRepository constructor.
     * @param \app\models\Invoice $invoice
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @param $data
     * @return mixed|void
     */
    public function create($data)
    {
        $this->invoice->save($data);
    }
}