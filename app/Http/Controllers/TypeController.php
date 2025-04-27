<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua kategori dari database
        $type = Type::all();
        // Kembalikan tampilan untuk menampilkan kategori
        return view('admin.type.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kembalikan tampilan form untuk menambah kategori
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input kategori
        $request->validate([
            'name' => 'required|string|max:255|unique:type', // Pastikan nama kategori unik
            'description' => 'nullable|string|max:1000', // Deskripsi kategori boleh kosong
        ]);

        // Membuat kategori baru berdasarkan input yang ada
        Type::create($request->all());

        // Redirect ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.type.index')
            ->with('success', 'type created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        // Mengembalikan tampilan untuk mengedit kategori tertentu
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        // Validasi input kategori yang diperbarui
        $request->validate([
            'name' => 'required|string|max:255|unique:type,name,' . $type->id, // Nama kategori tetap unik, kecuali untuk kategori yang sedang diedit
            'description' => 'nullable|string|max:1000',
        ]);

        // Update kategori dengan data yang baru
        $type->update($request->all());

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.type.index')
            ->with('success', 'Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        // Menghapus kategori yang dipilih
        $type->delete();

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.type.index')
            ->with('success', 'Type deleted successfully.');
    }
}