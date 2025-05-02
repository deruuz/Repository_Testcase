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
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                oninput="document.getElementById('filter-form').submit()"
                class="w-full md:w-72 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />

            <select name="category" onchange="document.getElementById('filter-form').submit()"
                class="w-full md:w-64 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="perPage" onchange="document.getElementById('filter-form').submit()"
                class="w-32 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ([10, 25, 50, 100, 200] as $size)
                    <option value="{{ $size }}" {{ request('perPage', 10) == $size ? 'selected' : '' }}>
                        Show {{ $size }}
                    </option>
                @endforeach
            </select>
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
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="p-4"><input id="checkbox-all" type="checkbox" class="w-4 h-4"
                                onclick="toggleAll(this)" /></th>
                        <th class="px-6 py-3">Number</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Type</th>
                        <th class="px-6 py-3">TestCase Name</th>
                        <th class="px-6 py-3">Steps</th>
                        <th class="px-6 py-3">Test Data</th>
                        <th class="px-6 py-3">Expected Result</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testCases as $testcase)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 group">
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
                            <td class="px-6 py-4">{{ $testcase->test_data }}</td>
                            <td class="px-6 py-4">{{ $testcase->expected_result }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('admin.testcases.edit', $testcase) }}"
                                    class="text-blue-600 hover:underline text-sm">Edit</a>
                                <form method="POST" action="{{ route('admin.testcases.destroy', $testcase) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
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
