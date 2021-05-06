<?php

namespace app\services;

use app\repositories\contracts\CustomerRepositoryInterface;
use app\repositories\contracts\InvoicesRepositoryInterface;
use app\repositories\contracts\ProductRepositoryInterface;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

/**
 * Class SeedService
 * @package app\services
 */
class SeedService
{
    /**
     * @var \app\repositories\contracts\CustomerRepositoryInterface
     */
    private CustomerRepositoryInterface $customerRepo;
    /**
     * @var \app\repositories\contracts\ProductRepositoryInterface
     */
    private ProductRepositoryInterface $productRepo;
    /**
     * @var \app\repositories\contracts\InvoicesRepositoryInterface
     */
    private InvoicesRepositoryInterface $invoiceRepo;

    /**
     * SeedService constructor.
     * @param \app\repositories\contracts\CustomerRepositoryInterface $customerRepo
     * @param \app\repositories\contracts\ProductRepositoryInterface $productRepo
     * @param \app\repositories\contracts\InvoicesRepositoryInterface $invoiceRepo
     */
    public function __construct(CustomerRepositoryInterface $customerRepo,
                                ProductRepositoryInterface $productRepo,
                                InvoicesRepositoryInterface $invoiceRepo)
    {
        $this->customerRepo = $customerRepo;
        $this->productRepo = $productRepo;
        $this->invoiceRepo = $invoiceRepo;
    }

    /**
     * Seed Data
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function seedData($spreadsheet)
    {
        $worksheet = $spreadsheet->getActiveSheet();
        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        $customerData = [];
        $productsData = [];
        $invoiceData  = [];

        for ($row = 1; $row <= $highestRow; ++$row) {
            for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                $customerData['name'] = $value['Customer Name'];
                $customerData['address'] = $value['Customer Address'];
                $productsData['name'] = $value['Product Name'];
                $productsData['price'] = $value['Price'];
                $invoiceData['date'] = $value['Date'];
                $invoiceData['quantity'] = $value['Quantity'];
                $invoiceData['total'] = $value['Total'];
                $invoiceData['grand_total'] = $value['Grand Total'];
                $customerId = $this->customerRepo->create($customerData);
                $productId = $this->productRepo->create($productsData);
                $invoiceData['customer_id'] = $customerId;
                $invoiceData['product_id'] = $productId;
                $this->invoiceRepo->create($invoiceData);
            }
        }
    }
}