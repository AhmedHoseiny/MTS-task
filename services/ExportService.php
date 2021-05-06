<?php

namespace app\services;

use app\repositories\contracts\ExportRepositoryInterface;

/**
 * Class ExportService
 * @package app\services
 */
class ExportService
{
    /**
     * @var \app\repositories\contracts\ExportRepositoryInterface
     */
    private ExportRepositoryInterface $exportRepo;

    /**
     * ExportService constructor.
     * @param \app\repositories\contracts\ExportRepositoryInterface $exportRepo
     */
    public function __construct(ExportRepositoryInterface $exportRepo)
    {
        $this->exportRepo = $exportRepo;
    }

    /**
     * Export Data
     */
    public function exportData()
    {
        $result = $this->exportRepo->export();
        $this->saveToJson($result);
    }

    /**
     * Save to Json file
     * @param $result
     */
    public function saveToJson($result)
    {
        $data = [];
        foreach ($result as $one) {
            $data['invoice'] = $one['invoice_id'];
            $data['Invoice Date'] = $one['date'];
            $data['Customer Name'] = $one['customer_name'];
            $data['Customer Address'] = $one['address'];
            $data['Product Name'] = $one['product_name'];
            $data['Quantity'] = $one['quantity'];
            $data['Price'] = $one['price'];
            $data['Total'] = $one['total'];
            $data['Grand Total'] = $one['grand_total'];
        }
        //write to json file
        $fp = fopen(__DIR__.'/../storage/json/invoices.json', 'w');
        fwrite($fp, json_encode($data));
        fclose($fp);
    }
}