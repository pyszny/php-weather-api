<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportManager
{
    private $params = ['City', 'Temperature', 'Sky'];

    public function generateReport($data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', $this->params[0]);
        $sheet->setCellValue('B1', $this->params[1]);
        $sheet->setCellValue('C1', $this->params[2]);
        $sheet->setTitle("Raport pogodowy");

        $row = 2;
        foreach($data as $values) {
            $sheet->setCellValue("A{$row}", $values[$this->params[0]]);
            $sheet->setCellValue("B{$row}", $values[$this->params[1]]);
            $sheet->setCellValue("C{$row}", $values[$this->params[2]]);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        $date = (new \DateTime())->format("Y_m_d");
        $excelFilePath = "/var/www/html/untitled1/reports/report_{$date}";
        $writer->save($excelFilePath);
    }



}