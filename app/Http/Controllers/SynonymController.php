<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Synonym;
use App\Http\Controllers\Controller;

class SynonymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $synonyms = Synonym::orderBy('id', 'asc')->paginate(10);
        return view('admin.synonyms.index', compact('synonyms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.synonyms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'original_word' => 'required|string|max:255',
            'synonyms' => 'required|array|min:1',
            'synonyms.*' => 'required|string|max:255',
        ]);

        Synonym::create([
            'original_word' => $request->original_word,
            'synonyms' => $request->synonyms,
        ]);

        return redirect()->route('admin.synonyms.index')
                    ->with('success', 'Synonym created successfully.');
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
    public function edit(Synonym $synonym)
    {
        return view('admin.synonyms.edit', compact('synonym'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Synonym $synonym)
    {
        $request->validate([
            'original_word' => 'required|string|max:255',
            'synonyms' => 'required|array|min:1',
            'synonyms.*' => 'required|string|max:255',
        ]);

        $synonym->update([
            'original_word' => $request->original_word,
            'synonyms' => $request->synonyms,
        ]);

        return redirect()->route('admin.synonyms.index')->with('success', 'Synonym updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Synonym $synonym)
    {
        $synonym->delete();
        return redirect()->route('admin.synonyms.index')->with('success', 'Synonym deleted successfully.');
    }
}
