<?php

namespace app\tests;

use app\controllers\SeedController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Class SeedTest
 * @package app\tests
 */
class SeedTest extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function testItLoadsTheExcelFileAndReturnSpreadSheetObject()
    {
        $seedController = new SeedController();
        $spreadSheet = $seedController->loadFile();

        $this->assertInstanceOf(Spreadsheet::class, $spreadSheet);
    }
}