<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalTestCase = \App\Models\TestCase::count();
        $totalKategori = \App\Models\Category::count();
        $totalTipe = \App\Models\Type::count();
        $totalSinonim = \App\Models\Synonym::count();

        // Distribusi test case per kategori
        $testCasePerKategori = \App\Models\Category::withCount('testCases')->get();
        // Distribusi test case per tipe
        $testCasePerTipe = \App\Models\Type::withCount('testCases')->get();
        // Recent activity (10 terakhir)
        $recentTestCases = \App\Models\TestCase::orderBy('updated_at', 'desc')->take(10)->get();

        return view('admin.dashboard', compact(
            'totalTestCase', 'totalKategori', 'totalTipe', 'totalSinonim',
            'testCasePerKategori', 'testCasePerTipe', 'recentTestCases'
        ));
    }
}