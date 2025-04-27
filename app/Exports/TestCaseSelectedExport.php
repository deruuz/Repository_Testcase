<?php

namespace App\Exports;

use App\Models\TestCase;
use Maatwebsite\Excel\Concerns\FromCollection;

class TestCaseSelectedExport implements FromCollection
{
    protected $ids;

    public function __construct($ids)
    {
        $this->ids = $ids;
    }

    public function collection()
    {
        return TestCase::whereIn('test_case_id', $this->ids)->get();
    }
}