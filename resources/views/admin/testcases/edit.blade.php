@extends('admin.components.layout')

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#1f2937',
                    background: '#111827',
                    color: '#ffffff',
                });
            });
        </script>
    @endif

    <div class="w-full p-6">
        <h2 class="text-2xl font-bold mb-6 text-start text-white">Edit TestCase</h2>

        <form action="{{ route('admin.testcases.update', $testcase) }}" method="POST"
            class="space-y-6 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-2">
                <label for="nomor" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Number
                </label>
                <input type="number" name="nomor" id="nomor" value="{{ old('nomor', $testcase->nomor) }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required />
            </div>

            <div class="flex flex-col gap-2">
                <label for="kategori_id" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Category
                </label>
                <select name="kategori_id" id="kategori_id"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled>Select Category</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}"
                            {{ old('kategori_id', $testcase->kategori_id) == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="type_id" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Type
                </label>
                <select name="type_id" id="type_id"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled>Select Type</option>
                    @foreach ($type as $cat)
                        <option value="{{ $cat->id }}"
                            {{ old('type_id', $testcase->type_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="case_type" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Case Type
                </label>
                <select name="case_type" id="case_type"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled>Select Case Type</option>
                    <option value="positive" {{ old('case_type', $testcase->case_type) == 'positive' ? 'selected' : '' }}>
                        Positive
                    </option>
                    <option value="negative" {{ old('case_type', $testcase->case_type) == 'negative' ? 'selected' : '' }}>
                        Negative
                    </option>
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="nama_test_case" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    TestCase Name
                </label>
                <input type="text" name="nama_test_case" id="nama_test_case"
                    value="{{ old('nama_test_case', $testcase->nama_test_case) }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required />
            </div>

            <div class="flex flex-col gap-2">
                <label for="steps" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Steps
                </label>
                <textarea name="steps" id="steps" rows="5"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"
                    required>
    {{ old('steps', $testcase->steps) }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label for="test_data" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Test Data
                </label>
                <textarea name="test_data" id="test_data" rows="4"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none">
    {{ old('test_data', $testcase->test_data) }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label for="expected_result" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Expected Result
                </label>
                <textarea name="expected_result" id="expected_result" rows="5"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"
                    required>
    {{ old('expected_result', $testcase->expected_result) }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label for="priority" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Priority
                </label>
                <select name="priority" id="priority"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled>Select Priority</option>
                    <option value="critical" {{ old('priority', $testcase->priority) == 'critical' ? 'selected' : '' }}>
                        Critical
                    </option>
                    <option value="urgent" {{ old('priority', $testcase->priority) == 'urgent' ? 'selected' : '' }}>
                        Urgent
                    </option>
                    <option value="high" {{ old('priority', $testcase->priority) == 'high' ? 'selected' : '' }}>
                        High
                    </option>
                    <option value="medium" {{ old('priority', $testcase->priority) == 'medium' ? 'selected' : '' }}>
                        Medium
                    </option>
                    <option value="low" {{ old('priority', $testcase->priority) == 'low' ? 'selected' : '' }}>
                        Low
                    </option>
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="admin_status" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Admin Status
                </label>
                <select name="admin_status" id="admin_status"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled>Select Admin Status</option>
                    <option value="created"
                        {{ old('admin_status', $testcase->admin_status) == 'created' ? 'selected' : '' }}>
                        Created
                    </option>
                    <option value="updated"
                        {{ old('admin_status', $testcase->admin_status) == 'updated' ? 'selected' : '' }}>
                        Updated
                    </option>

                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="tag-input" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Tags
                </label>

                <div class="relative">
                    <input type="text" id="tag-input" placeholder="Type and press enter..." autocomplete="off"
                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />

                    <ul id="tag-suggestions"
                        class="absolute z-10 w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg mt-1 max-h-40 overflow-auto hidden">
                        <!-- Suggestions will appear here -->
                    </ul>
                </div>

                <div id="selected-tags" class="flex flex-wrap gap-2 mt-2">



                </div>

                <!-- Hidden input untuk kirim array tag IDs -->
                <input type="hidden" name="tags" id="final-tags" value="{{ implode(',', $testcase->tags) }}">
            </div>


            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                    Update TestCase
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const input = document.getElementById("tag-input");
            const suggestions = document.getElementById("tag-suggestions");
            const selectedTags = document.getElementById("selected-tags");
            const finalTags = document.getElementById("final-tags");

            // List untuk menampung tag yang sudah dipilih
            let allSelectedTags = [];

            // Tag yang sudah ada dari database
            const initialSelectedTags = @json(
                $selectedTags->map(function ($tag) {
                    return ['id' => $tag->id, 'name' => $tag->name];
                }));

            // Masukin tag awal (existing) lewat addTag()
            initialSelectedTags.forEach(tag => {
                addTag(tag.name, tag.id, true); // Passing 'true' untuk tag yang dari DB
            });

            // Menangani pencarian dan menampilkan saran tag
            input.addEventListener("input", function() {
                const query = input.value.trim();
                if (query.length < 2) {
                    suggestions.innerHTML = "";
                    suggestions.classList.add("hidden");
                    return;
                }

                fetch(`/api/tags/search?query=${query}`)
                    .then(res => res.json())
                    .then(data => {
                        suggestions.innerHTML = "";
                        data.forEach(tag => {
                            const li = document.createElement("li");
                            li.textContent = tag.name;
                            li.className =
                                "px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer";
                            li.addEventListener("click", () => addTag(tag.name, tag.id));
                            suggestions.appendChild(li);
                        });
                        suggestions.classList.remove("hidden");
                    });
            });

            // Menangani tag yang diinput manual dengan menekan Enter
            input.addEventListener("keydown", function(e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    if (input.value.trim() !== "") {
                        addTag(input.value.trim()); // Menambahkan tag manual
                    }
                }
            });

            // Fungsi untuk menambahkan tag
            function addTag(name, id = null, isExisting = false) {
                // Jika tidak ada ID, buat ID sementara
                if (!id) {
                    id = 'temp_' + Math.random().toString(36).substr(2, 9);
                }

                // Pastikan tag tidak duplikat di UI dan allSelectedTags
                if (allSelectedTags.some(t => t.id === id)) return;

                // Tambahkan tag baru ke list allSelectedTags
                allSelectedTags.push({
                    name,
                    id
                });
                updateFinalTags();

                // Buat elemen span untuk menampilkan tag
                const span = document.createElement("span");
                span.className =
                    "bg-blue-600 text-white px-2 py-1 rounded-full text-sm flex items-center gap-2";
                span.innerHTML =
                    `${name} <button type="button" class="text-white hover:text-gray-200">&times;</button>`;

                // Menyimpan ID tag pada elemen span untuk referensi
                span.setAttribute('data-tag-id', id);

                // Tombol hapus tag
                const removeBtn = span.querySelector("button");
                removeBtn.addEventListener("click", () => {
                    // Hapus tag dari allSelectedTags
                    allSelectedTags = allSelectedTags.filter(t => t.id !== id);
                    selectedTags.removeChild(span);
                    updateFinalTags();
                });

                // Tambahkan tag ke selected tags
                selectedTags.appendChild(span);

                // Kosongkan input setelah menambah tag
                input.value = "";
                suggestions.innerHTML = "";
                suggestions.classList.add("hidden");
            }

            // Fungsi untuk memperbarui input tersembunyi (final tags)
            function updateFinalTags() {
                // Hanya tag dengan ID asli (bukan yang temporary) yang dikirim
                const realTagIds = allSelectedTags
                    .filter(tag => !String(tag.id).startsWith('temp_')) // Menghapus tag yang ID-nya sementara
                    .map(tag => tag.id);
                finalTags.value = realTagIds.join(','); // Set nilai input final
            }

            // Menyembunyikan saran ketika mengklik di luar input
            document.addEventListener("click", (e) => {
                if (!suggestions.contains(e.target) && e.target !== input) {
                    suggestions.classList.add("hidden");
                }
            });
        });
    </script>
@endsection
