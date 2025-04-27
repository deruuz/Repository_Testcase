<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kategori dari database
        $category = Category::all();
        // Kembalikan tampilan untuk menampilkan kategori
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kembalikan tampilan form untuk menambah kategori
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input kategori
        $request->validate([
            'name' => 'required|string|max:255|unique:category', // Pastikan nama kategori unik
            'description' => 'nullable|string|max:1000', // Deskripsi kategori boleh kosong
        ]);

        // Membuat kategori baru berdasarkan input yang ada
        Category::create($request->all());

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.category.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Mengembalikan tampilan untuk mengedit kategori tertentu
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validasi input kategori yang diperbarui
        $request->validate([
            'name' => 'required|string|max:255|unique:category,name,' . $category->id, // Nama kategori tetap unik, kecuali untuk kategori yang sedang diedit
            'description' => 'nullable|string|max:1000',
        ]);

        // Update kategori dengan data yang baru
        $category->update($request->all());

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.category.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Menghapus kategori yang dipilih
        $category->delete();

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.category.index')
            ->with('success', 'Category deleted successfully.');
    }
}