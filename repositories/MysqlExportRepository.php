<?php

namespace app\repositories;

use app\core\db\ConnectionInterface;
use app\repositories\contracts\ExportRepositoryInterface;

/**
 * Class MysqlExportRepository
 * @package app\repositories
 */
class MysqlExportRepository implements ExportRepositoryInterface
{
    /**
     * @var \app\core\db\ConnectionInterface|mixed
     */
    private ConnectionInterface $connection;

    /**
     * MysqlExportRepository constructor.
     * @param \app\core\db\ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $config = require_once __DIR__.'/../config/database.php';
        $this->connection = $connection::getConnection($config['db']['mysql']);
    }

    /**
     * @return mixed
     */
    public function export()
    {
        $statement = $this->connection->pprepare("SELECT invoices.*
            FROM invoices
            INNER JOIN customers ON invoices.customer_id = customer.id 
            INNER JOIN invoice_product ON invoicees.id = invoice_product.invoice_id
            INNER JOIN products ON product.id = invoice_product.product_id
            WHERE invoices.id = invoice_product.invoice_id AND products.id = invoice_product.product_id");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}