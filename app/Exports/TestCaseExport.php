<?php

namespace App\Exports;

use App\Models\TestCase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestCaseExport implements FromCollection, WithHeadings
{
    /**
     * Return all TestCase data.
     */
    public function collection()
    {
        return TestCase::select(
            'nomor',
            'kategori',
            'type',
            'nama_test_case',
            'steps',
            'test_data',
            'expected_result'
        )->get();
    }

    /**
     * Define Excel column headings.
     */
    public function headings(): array
    {
        return [
            'Nomor',
            'Kategori',
            'Type',
            'Nama TestCase',
            'Steps',
            'Test Data',
            'Expected Result'
        ];
    }
}