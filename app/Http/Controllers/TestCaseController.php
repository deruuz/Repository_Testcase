<?php
namespace App\Http\Controllers;

use App\Models\TestCase;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TestCaseExport;
use App\Exports\TestCaseSelectedExport;
use Illuminate\Routing\Controller;

use App\Models\Category;
use App\Models\Type;
use App\Models\Synonym;
use App\Models\Tag;


class TestCaseController extends Controller
{

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

        // Paginate
        $testCases = $query->paginate($perPage)->appends($request->except('page'));

        // Ambil data kategori & type untuk dropdown
        $categories = Category::all();
        $types = Type::all();
        $tags = Tag::all(); // Tambahkan ini untuk dropdown tag jika diperlukan

        return view('admin.testcases.index', compact('testCases', 'categories', 'types', 'tags'));
    }


    public function create()
    {
        // Ambil data kategori dan tipe dari database
        $category = Category::all(); // Ganti dengan model kategori Anda
        $type = Type::all(); // Ganti dengan model tipe Anda
        $tags = Tag::all();

        $lastTestcase = TestCase::orderBy('nomor', 'desc')->first();
        $nextNomor = $lastTestcase ? $lastTestcase->nomor + 1 : 1;

        return view('admin.testcases.create', compact('nextNomor', 'category', 'type', 'tags'));

    }//baru ditambah

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   dd($request->tags); // Cek data tags yang dikirim
            $request->validate([
                'nomor' => 'required|integer',
                'kategori_id' => 'required|string|max:255',
                'type_id' => 'required|string|max:255',
                'nama_test_case' => 'required|string|max:255',
                'steps' => 'required|string',
                'test_data' => 'nullable|string',
                'expected_result' => 'required|string',
                
                // Validasi tambahan:
                'case_type' => 'required|in:positive,negative',
                'admin_status' => 'required|in:created,updated',
                'priority' => 'required|in:critical,urgent,high,medium,low',
                'tags' => 'required|string', // Validasi tags sebagai string
            ]);

            $tagIds = explode(',', $request->tags);
            $tagIds = array_map('intval', $tagIds);

            // dd($tagIds);


            $lastTestCase = TestCase::orderBy('nomor', 'desc')->first();
            $position = $lastTestCase ? $lastTestCase->nomor + 1 : 1; // Jika tidak ada, mulai dari 1

            TestCase::create([
                'nomor' => $request->nomor,
                'kategori_id' => $request->kategori_id,
                'type_id' => $request->type_id,
                'nama_test_case' => $request->nama_test_case,
                'steps' => $request->steps,
                'test_data' => $request->test_data,
                'expected_result' => $request->expected_result,
                'case_type' => $request->case_type,
                'admin_status' => $request->admin_status,
                'priority' => $request->priority,
                'position' => $position,
                'tags' => $tagIds, // Menyimpan tags sebagai JSON
            ]);

        return redirect()->route('admin.testcases.index')
            ->with('success', 'Test Case created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testcase = TestCase::findOrFail($id);

    
         // Ambil tag_ids dari kolom JSON/array
        $tagIds = $testcase->tags; // misalnya ini field JSON yang isinya [1, 3, 5]

         // Ambil data tag dari tabel `tags` berdasarkan ID tadi
        $tags = Tag::whereIn('id', $tagIds)->get();

        $category = Category::all(); // Ambil semua kategori
        $type = Type::all(); // Ambil semua tipe


        if ($testcase->admin_status === 'created') {
        $testcase->admin_status = 'updated';
    }
        return view('admin.testcases.edit', [
            'testcase' => $testcase,
            'category' => $category,
            'type' => $type,
            'selectedTags' => $tags,
           ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestCase $testcase)
    {
        $request->validate([
            'nomor' => 'required|integer',
            'kategori_id' => 'required|string|max:255',
            'type_id' => 'required|string|max:255',
            'nama_test_case' => 'required|string|max:255',
            'steps' => 'required|string',
            'test_data' => 'nullable|string',
            'expected_result' => 'required|string',
            'case_type' => 'required|in:positive,negative',
            'admin_status' => 'required|in:created,updated',
            'priority' => 'required|in:critical,urgent,high,medium,low',
            'tags' => 'required|string',
        ]);

        $data = $request->except('tags');
        $tags = explode(',', $request->input('tags'));
        $tags = array_map('intval', $tags);

        $testcase->update($data);
        $testcase->tags = $tags;
        $testcase->save();

        return redirect()->route('admin.testcases.index')
            ->with('success', 'Test Case updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestCase $testcase)
    {
        $testcase->delete();

        return redirect()->route('admin.testcases.index')
            ->with('success', 'Test Case deleted successfully.');
    }

    /**
     * Export all test cases to Excel.
     */
    public function export()
    {
        return Excel::download(new TestCaseExport, 'testcases.xlsx');
    }

    /**
     * Export selected test cases to Excel.
     */
    public function exportSelected(Request $request)
    {
        $ids = $request->input('selected_testcases');

        if (!$ids) {
            return back()->with('error', 'Please select at least one Test Case to export.');
        }

        return Excel::download(new TestCaseSelectedExport($ids), 'selected_testcases.xlsx');
    }


    // REORDER FUNCTION
   public function reorder(Request $request)
    {
       $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:test_cases,test_case_id',
        ]);


        foreach ($request->ids as $index => $id) {
          TestCase::where('test_case_id', $id)->update(['position' => $index + 1]);
        }

        return response()->json(['status' => 'success']);
    }

    // Reset urutan test case
    public function resetOrder()
    {
        // Ambil semua test case dan urutkan berdasarkan kolom 'position'
        $testCases = TestCase::orderBy('position')->get();

        // Lalu assign ulang 'nomor' sesuai urutan
        foreach ($testCases as $index => $testCase) {
            $testCase->update(['nomor' => $index + 1]);
        }

        return redirect()->back()->with('success', 'Urutan berhasil di-reset.');
    }




}