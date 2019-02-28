<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportManager
{
    private $headers = [
                        'City',
                        'Temperature',
                        'Sky'
                        ];

    public function generateReport($data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->fromArray($this->headers, NULL, 'A1');
        $sheet->setTitle("Raport pogodowy");

        $row = 2;
        foreach ($data as $rowValues) {
            $sheet->fromArray($rowValues, NULL, "A{$row}");
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        $date = (new \DateTime())->format("Y_m_d");
        if (!file_exists('reports')) {
            mkdir('reports', 0777, true);
        }
        $excelFilePath = getcwd() . "/reports/report_{$date}";
        $writer->save($excelFilePath);
    }



}