<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Routing\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua tag dari database
        $tag = Tag::all();
        // Kembalikan tampilan untuk menampilkan tag
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kembalikan tampilan form untuk menambah tag
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags',
        ]);

        Tag::create(['name' => $request->name]);

         return redirect()->route('admin.tag.index')
            ->with('success', 'tag created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        // Mengembalikan tampilan untuk mengedit tag tertentu
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.tag.index')
            ->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        // Menghapus kategori yang dipilih
        $tag->delete();

        // Redirect kembali ke halaman kategori dengan pesan sukses
        return redirect()->route('admin.tag.index')
            ->with('success', 'Tag deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->query('query');
        return Tag::where('name', 'like', "%{$query}%")->limit(10)->get();
    }
}
