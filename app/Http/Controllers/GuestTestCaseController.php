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
    // {
    //     $testCases = TestCase::query()
    //         ->when($request->search, function ($query) use ($request) {
    //             $query->where('nama_test_case', 'like', '%' . $request->search . '%')
    //                 ->orWhere('kategori', 'like', '%' . $request->search . '%')
    //                 ->orWhere('type', 'like', '%' . $request->search . '%')
    //                 ->orWhere('steps', 'like', '%' . $request->search . '%')
    //                 ->orWhere('expected_result', 'like', '%' . $request->search . '%');
    //         })
    //         ->paginate(10);

    //     return view('welcome', compact('testCases'));
    // }
    // {
    //     $perPage = $request->get('perPage', 10); // Ambil perPage dari URL, default 10 kalau kosong
    
    //     $query = TestCase::query();
    
    //     if ($search = $request->get('search')) {
    //         $query->where('nama_test_case', 'like', "%$search%")
    //               ->orWhere('kategori', 'like', "%$search%")
    //               ->orWhere('type', 'like', "%$search%")
    //               ->orWhere('steps', 'like', "%$search%")
    //               ->orWhere('expected_result', 'like', "%$search%");
    //     }
    
    //     $testCases = $query->paginate($perPage)->appends($request->except('page'));
    
    //     return view('welcome', compact('testCases', 'categories'));
    // }
    {
        $perPage = $request->get('perPage', 10); // Ambil perPage dari URL, default 10 kalau kosong
        
        $query = TestCase::with('category'); // Pastikan relasi ke kategori ada di model TestCase
        
        // Filter berdasarkan kategori
        if ($category = $request->get('category')) {
            $query->where('kategori', $category); // Sesuaikan dengan nama kolom foreign key
        }
    
        // Filter berdasarkan pencarian
        if ($search = $request->get('search')) {
            $query->where('nama_test_case', 'like', "%$search%")
                  ->orWhere('steps', 'like', "%$search%")
                  ->orWhere('expected_result', 'like', "%$search%");
        }
    
        // Paginate hasil query
        $testCases = $query->paginate($perPage)->appends($request->except('page'));
    
        // Ambil data kategori untuk dropdown
        $categories = \App\Models\Category::all();
    
        return view('welcome', compact('testCases', 'categories'));
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