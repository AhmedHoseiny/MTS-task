<?php

namespace app\models;

use app\core\db\DbModel;

/**
 * Class Invoice
 * @package app\models
 */
class Invoice extends DbModel
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'invoices';
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return ['date', 'customer_id', 'grand_total'];
    }

    /**
     * @param $data
     * @return int
     */
    public function save($data): int
    {
        $invoiceId = parent::save($data);

        $this->saveInvoiceProduct($invoiceId, $data);
    }

    /**
     * @param $invoiceId
     * @param $data
     */
    public function saveInvoiceProduct($invoiceId, $data)
    {
        $productId = $data['product_id'];
        $quantity = $data['quantity'];
        $total = $data['total'];
        $statement = self::prepare("INSERT INTO invoice_product ('invoice_id', 'product_id', 'quantity', 'total') 
                VALUES ($invoiceId, $productId, $quantity, $total) ");
        $statement->execute();
    }
}