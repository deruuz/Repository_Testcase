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

    <div class="p-6">
        <form method="GET" id="filter-form" class="flex flex-wrap gap-3 mb-6 items-center">
            <input type="text" name="search" id="tag-input" value="{{ request('search') }}" placeholder="Search..."
                class="w-full md:w-72 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />

            <ul id="tag-suggestions"
                class="absolute z-10 w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg mt-1 max-h-40 overflow-auto hidden">
                <!-- Suggestions will appear here -->
            </ul>

            <select name="category"
                class="w-full md:w-64 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="type"
                class="w-full md:w-64 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>

            <select name="priority"
                class="w-full md:w-64 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Priorities</option>
                @foreach (['critical', 'urgent', 'high', 'medium', 'low'] as $p)
                    <option value="{{ $p }}" {{ request('priority') == $p ? 'selected' : '' }}>
                        {{ ucfirst($p) }}
                    </option>
                @endforeach
            </select>

            <select name="case_type"
                class="w-full md:w-64 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Case Types</option>
                <option value="positive" {{ request('case_type') == 'positive' ? 'selected' : '' }}>Positive</option>
                <option value="negative" {{ request('case_type') == 'negative' ? 'selected' : '' }}>Negative</option>
            </select>

            <select name="perPage"
                class="w-32 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ([10, 25, 50, 100, 200] as $size)
                    <option value="{{ $size }}" {{ request('perPage', 10) == $size ? 'selected' : '' }}>
                        Show {{ $size }}
                    </option>
                @endforeach
            </select>

            <button type="submit"
                class="px-4 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                Apply Filter
            </button>
            <a href="{{ route('admin.testcases.index') }}"
                class="px-4 py-3 rounded-lg bg-gray-500 text-white hover:bg-gray-600 focus:ring-2 focus:ring-gray-400 focus:outline-none">
                Clear Filter
            </a>
        </form>


        <div class="flex flex-wrap gap-2 mb-4">

            <a href="{{ route('admin.testcases.create') }}"
                class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                + Add TestCase
            </a>

            <form id="export-selected-form" method="POST" action="{{ route('admin.testcases.exportSelected') }}">
                @csrf
                <button type="submit"
                    class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                    Export Selected
                </button>
            </form>

            <button type="button" onclick="copySelectedTexts()"
                class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                Copy Selected
            </button>
            <form method="POST" action="{{ route('admin.testcases.resetOrder') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Reset Urutan
                </button>
            </form>
        </div>

        <div class="relative overflow-x-auto shadow-sm bg-gray-800 rounded-lg">
            <table class="min-w-[2000px] w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="p-4"><input id="checkbox-all" type="checkbox" class="w-4 h-4"
                                onclick="toggleAll(this)" /></th>
                        <th class="px-6 py-3">Number</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Type</th>
                        <th class="px-6 py-3 min-w-[180px]">TestCase Name</th>
                        <th class="px-6 py-3">Steps</th>
                        <th class="px-6 py-3 min-w-[180px]">TestCase Type</th>
                        <th class="px-6 py-3">Priority</th>
                        <th class="px-6 py-3">Test Data</th>
                        <th class="px-6 py-3 min-w-[180px]">Expected Result</th>
                        <th class="px-6 py-3 min-w-[180px]">Admin Status</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testCases as $testcase)
                        <tr data-id="{{ $testcase->test_case_id }}"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 group sortable-item">
                            <td class="p-4">
                                <input type="checkbox" name="selected_testcases[]" value="{{ $testcase->test_case_id }}"
                                    form="export-selected-form" class="row-checkbox w-4 h-4" />
                            </td>
                            <td class="px-6 py-4 relative">
                                {{ $testcase->nomor }}
                                <button type="button" onclick="copyText('{{ $testcase->nomor }}', this)"
                                    class="text-xs absolute right-2 top-1/2 transform -translate-y-1/2 opacity-0 group-hover:opacity-100 transition">
                                    📋
                                </button>
                            </td>
                            <td class="px-6 py-4">{{ $testcase->category->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $testcase->jenis->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $testcase->nama_test_case }}</td>
                            <td class="px-6 py-4">{{ $testcase->steps }}</td>
                            <td class="px-6 py-4 min-w-[180px] text-center">
                                <span
                                    class="text-xs px-2 py-1 rounded 
                                    {{ $testcase->case_type == 'positive'
                                        ? 'bg-green-500 text-white'
                                        : ($testcase->case_type == 'negative'
                                            ? 'bg-red-500 text-white'
                                            : 'bg-gray-300 text-black') }}">
                                    {{ $testcase->case_type == 'positive' ? 'Positive' : ($testcase->case_type == 'negative' ? 'Negative' : 'Unknown') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $testcase->priority }}</td>
                            <td class="px-6 py-4">{{ $testcase->test_data }}</td>
                            <td class="px-6 py-4">{{ $testcase->expected_result }}</td>
                            <td class="px-6 py-4">{{ $testcase->admin_status }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('admin.testcases.edit', $testcase) }}"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                                <form method="POST" action="{{ route('admin.testcases.destroy', $testcase) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                {{ $testCases->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <style>
        .copied-msg {
            font-size: 12px;
            color: #22c55e;
            position: absolute;
            right: 2px;
            top: -12px;
            animation: fadeOut 1.2s forwards;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            70% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(-5px);
            }
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        // SORTABLE FUNCTIONALITY
        const el = document.querySelector("tbody"); // tbody target drag
        new Sortable(el, {
            animation: 150,
            onEnd: function() {
                const ids = Array.from(el.children).map(row => row.dataset.id);

                fetch("{{ route('admin.testcases.reorder') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            ids
                        })
                    })
                    .then(res => res.json())
                    .then(data => console.log(data))
                    .catch(err => console.error(err));
            }
        });
    </script>

    {{-- Script for suggest tag --}}
    <script>
        const input = document.getElementById("tag-input");
        const suggestions = document.getElementById("tag-suggestions");

        // Menangani input dan menampilkan saran tag
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
                            "px-4 py-2 hover:bg-gray-200 text-white dark:hover:bg-gray-700 cursor-pointer";
                        li.addEventListener("click", () => selectTag(tag.name, tag.id));
                        suggestions.appendChild(li);
                    });
                    suggestions.classList.remove("hidden");
                });
        });

        // Menangani keydown untuk memasukkan tag yang dipilih ke dalam input
        input.addEventListener("keydown", function(e) {
            if (e.key === "Enter") {
                e.preventDefault();
                if (input.value.trim() !== "") {
                    selectTag(input.value.trim());
                }
            }
        });

        // Fungsi untuk menambahkan tag ke dalam input
        function selectTag(name, id = null) {
            // Masukkan nama tag ke dalam input
            input.value = name;

            // Hilangkan saran setelah memilih tag
            suggestions.innerHTML = "";
            suggestions.classList.add("hidden");
        }
    </script>



    <script>
        function toggleAll(source) {
            document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = source.checked);
        }

        function copyText(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const span = document.createElement('span');
                span.textContent = 'Copied!';
                span.className = 'copied-msg';
                btn.parentElement.appendChild(span);
                setTimeout(() => span.remove(), 1200);
            });
        }

        function copySelectedTexts() {
            const selectedRows = Array.from(document.querySelectorAll('input[name="selected_testcases[]"]:checked')).map(
                cb => cb.closest('tr'));
            if (selectedRows.length === 0) return alert('Please select at least one Test Case.');

            let textToCopy = "Nomor | Kategori | Type | Nama TestCase | Steps | Test Data | Expected Result\n";

            selectedRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let rowText = [];
                for (let i = 1; i < cells.length - 1; i++) {
                    rowText.push(cells[i].innerText.trim());
                }
                textToCopy += rowText.join(' | ') + "\n";
            });

            navigator.clipboard.writeText(textToCopy)
                .then(() => alert('Copied selected test cases to clipboard!'))
                .catch(err => alert('Failed to copy text.'));
        }
    </script>
@endsection
