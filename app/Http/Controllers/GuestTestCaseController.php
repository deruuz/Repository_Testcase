<?php

namespace App\Http\Controllers;

use App\Models\TestCase;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TestCaseSelectedExport;
use Illuminate\Routing\Controller;

use App\Models\Category;
use App\Models\Type;
use App\Models\Synonym;
use App\Models\Tag;

class GuestTestCaseController extends Controller
{
    /**
     * Show test cases to guest user at landing page.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 200);

        $query = TestCase::with(['category', 'jenis'])->orderBy('position');

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $query->where('kategori_id', $request->category);
        }

        // Filter berdasarkan type
        if ($request->filled('type')) {
            $query->where('type_id', $request->type);
        }

        // Filter berdasarkan priority
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Filter berdasarkan case_type
        if ($request->filled('case_type')) {
            $query->where('case_type', $request->case_type);
        }

        // Filter pencarian keyword harus di atas paginate
        if ($request->filled('search')) {
            $search = $request->search;
            
            // Cari semua sinonim yang mungkin untuk pencarian umum
            $synonyms = Synonym::where('original_word', 'like', "%{$search}%")
                ->orWhere(function($q) use ($search) {
                    $q->whereJsonContains('synonyms', $search)
                    ->orWhereJsonContains('synonyms', str_replace(' ', '-', $search))
                    ->orWhereJsonContains('synonyms', str_replace(' ', '', $search));
                })
                ->get();

            // Cari tag yang sesuai dengan search term atau sinonimnya
            $tagSynonyms = Synonym::where('original_word', 'like', "%{$search}%")
                ->orWhere(function($q) use ($search) {
                    $q->whereJsonContains('synonyms', $search)
                    ->orWhereJsonContains('synonyms', str_replace(' ', '-', $search))
                    ->orWhereJsonContains('synonyms', str_replace(' ', '', $search));
                })
                ->get();

            // Kumpulkan semua kata kunci pencarian (termasuk original word dan sinonim)
            $searchTerms = [$search];
            $tagSearchTerms = [$search];
            
            foreach ($synonyms as $synonym) {
                $searchTerms[] = $synonym->original_word;
                $searchTerms = array_merge($searchTerms, $synonym->synonyms);
            }
            
            foreach ($tagSynonyms as $synonym) {
                $tagSearchTerms[] = $synonym->original_word;
                $tagSearchTerms = array_merge($tagSearchTerms, $synonym->synonyms);
            }
            
            // Hapus duplikat dan null values
            $searchTerms = array_unique(array_filter($searchTerms));
            $tagSearchTerms = array_unique(array_filter($tagSearchTerms));

            // Cari ID tag yang sesuai dengan search term atau sinonimnya
            $matchingTagIds = Tag::where(function($q) use ($tagSearchTerms) {
                foreach ($tagSearchTerms as $term) {
                    $q->orWhere('name', 'like', "%{$term}%");
                }
            })->pluck('id')->toArray();

            $query->where(function ($q) use ($searchTerms, $matchingTagIds) {
                // Pencarian di field biasa
                foreach ($searchTerms as $term) {
                    $q->orWhere('nama_test_case', 'like', "%{$term}%")
                    ->orWhere('steps', 'like', "%{$term}%")
                    ->orWhere('test_data', 'like', "%{$term}%")
                    ->orWhere('case_type', 'like', "%{$term}%")
                    ->orWhere('priority', 'like', "%{$term}%")
                    ->orWhere('expected_result', 'like', "%{$term}%")
                    ->orWhereHas('category', function ($cat) use ($term) {
                        $cat->where('name', 'like', "%{$term}%");
                    })
                    ->orWhereHas('jenis', function ($type) use ($term) {
                        $type->where('name', 'like', "%{$term}%");
                    });
                }

                // Pencarian berdasarkan tag
                if (!empty($matchingTagIds)) {
                    $q->orWhere(function($query) use ($matchingTagIds) {
                        foreach ($matchingTagIds as $tagId) {
                            $query->orWhereJsonContains('tags', $tagId);
                        }
                    });
                }
            });
        }


        // Baru paginate terakhir
        $testCases = $query->paginate($perPage)->appends($request->except('page'));

        // Ambil data kategori & type untuk dropdown
        $categories = Category::all();
        $types = Type::all();
        $allTags = Tag::all()->keyBy('id'); // Ubah ke format key=>value untuk pencarian cepat

        // Proses mapping tags sebelum dikirim ke view
        $testCases->getCollection()->transform(function($testCase) use ($allTags) {
            $testCase->tag_names = [];
            
            if (!empty($testCase->tags)) {
                $testCase->tag_names = array_filter(array_map(function($tagId) use ($allTags) {
                    return $allTags[$tagId]->name ?? null;
                }, $testCase->tags));
            }
            
            return $testCase;
        });
        
         return view('welcome', [
            'testCases' => $testCases,
            'categories' => $categories,
            'types' => $types,
            'allTags' => $allTags,  
         ]);
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

    public function toggleUsed($id)
    {
        $testcase = TestCase::findOrFail($id);
        $testcase->is_used = !$testcase->is_used;
        $testcase->save();

        return response()->json(['success' => true]);
    }

    public function resetUsed()
    {
        TestCase::where('is_used', true)->update(['is_used' => false]);
        return redirect()->route('welcome.testcases.index');
    }

}

