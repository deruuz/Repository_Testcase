<?php

namespace App\Http\Controllers;

use App\Models\TestCase;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TestCaseSelectedExport;
use Illuminate\Routing\Controller;


class GuestTestCaseController extends Controller
{
    /**
     * Show test cases to guest user at landing page.
     */
    public function index(Request $request)
    {
        $testCases = TestCase::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('nama_test_case', 'like', '%' . $request->search . '%')
                    ->orWhere('kategori', 'like', '%' . $request->search . '%')
                    ->orWhere('type', 'like', '%' . $request->search . '%')
                    ->orWhere('steps', 'like', '%' . $request->search . '%')
                    ->orWhere('expected_result', 'like', '%' . $request->search . '%');
            })
            ->paginate(10);

        return view('welcome', compact('testCases'));
    }

    /**
     * Export selected test cases into an Excel file.
     */
    public function exportSelected(Request $request)
    {
        $ids = $request->input('selected_testcases');

        if (!$ids || count($ids) === 0) {
            return back()->with('error', 'Please select at least one Test Case to export.');
        }

        return Excel::download(new TestCaseSelectedExport($ids), 'guest_selected_testcases.xlsx');
    }
}