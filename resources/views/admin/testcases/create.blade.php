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
        <h2 class="text-2xl font-bold mb-6 text-start text-white">
            Create New TestCase
        </h2>

        <form onsubmit="tinymce.triggerSave()" action="{{ route('admin.testcases.store') }}" method="POST"
            class="space-y-6 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @csrf

            <div class="flex flex-col gap-2">
                <label for="nomor" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Number
                </label>

                <input type="number" name="nomor" id="nomor" value="{{ $nextNomor }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required readonly />
            </div>

            <div class="flex flex-col gap-2">
                <label for="kategori" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Category
                </label>
                <select name="kategori_id" id="kategori"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Case Type --}}
            <div class="flex flex-col gap-2">
                <label for="case_type" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Case Type
                </label>
                <select name="case_type" id="case_type"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled selected>Select Case Type</option>
                    <option value="positive">Positive</option>
                    <option value="negative">Negative</option>
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="type" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Type
                </label>
                <select name="type_id" id="type"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled selected>Select Type</option>
                    @foreach ($type as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col gap-2">
                <label for="nama_test_case" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    TestCase Name
                </label>
                <textarea type="text" name="nama_test_case" id="nama_test_case"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                <!-- required -->
            </div>

            <div class="flex flex-col gap-2">
                <label for="steps" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Steps
                </label>
                <textarea name="steps" id="steps" rows="5"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"></textarea>
                <!-- required -->
            </div>

            <div class="flex flex-col gap-2">
                <label for="test_data" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Test Data
                </label>
                <textarea name="test_data" id="test_data" rows="4"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"></textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label for="expected_result" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Expected Result
                </label>
                <textarea name="expected_result" id="expected_result" rows="5"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"></textarea>
                <!-- required -->
            </div>

            {{-- Priority --}}
            <div class="flex flex-col gap-2">
                <label for="priority" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Priority
                </label>
                <select name="priority" id="priority"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled selected>Select Priority</option>
                    <option value="critical">Critical</option>
                    <option value="urgent">Urgent</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>

            {{-- Admin Status --}}
            <div class="flex flex-col gap-2">
                <label for="admin_status" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Admin Status
                </label>
                <select name="admin_status" id="admin_status"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
                    <option value="" disabled>Select Admin Status</option>
                    <option value="created" selected>Created</option>
                    <option value="updated">Updated</option>
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

                <div id="selected-tags" class="flex flex-wrap gap-2 mt-2"></div>

                <!-- Hidden input untuk kirim array tag IDs -->
                <input type="hidden" name="tags" id="final-tags">
            </div>


            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                    Save TestCase
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

            let tags = [];

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

            input.addEventListener("keydown", function(e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    if (input.value.trim() !== "") {
                        addTag(input.value.trim());
                    }
                }
            });

            function addTag(name, id) {
                if (tags.find(t => t.id === id)) return;

                tags.push({
                    name,
                    id
                });
                updateFinalTags();

                const span = document.createElement("span");
                span.className = "bg-blue-600 text-white px-2 py-1 rounded-full text-sm flex items-center gap-2";
                span.innerHTML =
                    `${name} <button type="button" class="text-white hover:text-gray-200">&times;</button>`;

                span.querySelector("button").addEventListener("click", () => {
                    tags = tags.filter(t => t.id !== id);
                    selectedTags.removeChild(span);
                    updateFinalTags();
                });

                selectedTags.appendChild(span);
                input.value = "";
                suggestions.innerHTML = "";
                suggestions.classList.add("hidden");
            }

            function updateFinalTags() {
                // Hapus semua input tag sebelumnya
                finalTags.value = tags.map(tag => tag.id).join(','); // Kirim ID tag sebagai string terpisah koma
                console.log(finalTags.value); // Debug: Tampilkan nilai hidden input
            }

            document.addEventListener("click", (e) => {
                if (!suggestions.contains(e.target) && e.target !== input) {
                    suggestions.classList.add("hidden");
                }
            });
        });
    </script>
@endsection
