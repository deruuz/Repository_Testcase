<?php

namespace App\Exports;

use App\Models\TestCase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TestCaseExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * Return all TestCase data.
     */
    public function collection()
    {
        return TestCase::with(['category', 'jenis'])
            ->orderBy('nomor')
            ->get()
            ->map(function ($testcase) {
                return [
                    'Number' => $testcase->nomor,
                    'Category' => $testcase->category->name ?? '-',
                    'Type' => $testcase->jenis->name ?? '-',
                    'TestCase Name' => $testcase->nama_test_case,
                    'Steps' => $testcase->steps,
                    'TestCase Type' => $testcase->case_type,
                    'Priority' => $testcase->priority,
                    'Test Data' => $testcase->test_data,
                    'Expected Result' => $testcase->expected_result,
                    'Admin Status' => $testcase->admin_status,
                ];
            });
    }

    /**
     * Define Excel column headings.
     */
    public function headings(): array
    {
        return [
            'No',
            'Category',
            'Type',
            'TestCase Name',
            'Steps',
            'TestCase Type',
            'Priority',
            'Test Data',
            'Expected Result',
            'Admin Status',
        ];
    }

    // Styling
    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();

        return [
            // Header style
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                    'color' => ['argb' => 'FFFFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => '4CAF50'], // green background
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'border' => [
                    'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                ]
            ],
            // Data rows style
            "2:{$lastRow}" => [
                'font' => [
                    'size' => 10,
                    'color' => ['argb' => 'FF000000'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFFFFFF'], // white background
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'border' => [
                    'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                ]
            ],
            // Border for all cells (header + data)
            "A1:J{$lastRow}" => [
                'border' => [
                    'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                    'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOT],
                ]
            ],
        ];
    }
}