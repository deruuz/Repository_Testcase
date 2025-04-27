@extends('admin.components.layout')

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Success!',
                    text: @json(session('success')),
                    icon: 'success',
                    confirmButtonColor: '#1f2937',
                    background: '#111827',
                    color: '#ffffff'
                });
            });
        </script>
    @endif
    <div class="p-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
            <!-- Search Box -->
            <form method="GET" class="flex w-full md:w-auto gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full md:w-80 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="Search Test Case...">
                <button type="submit"
                    class="w-full md:w-auto px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                    Search
                </button>
            </form>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row w-full md:w-auto gap-2">
                <a href="{{ route('admin.testcases.create') }}"
                    class="w-full md:w-auto px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg text-center transition duration-200">
                    + Add TestCase
                </a>

                <form id="export-selected-form" method="POST" action="{{ route('admin.testcases.exportSelected') }}">
                    @csrf
                    <button type="submit"
                        class="w-full md:w-auto px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                        Export Selected
                    </button>
                </form>

                <button type="button" onclick="copySelectedTexts()"
                    class="w-full md:w-auto px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                    Copy Selected
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="p-4">
                            <input id="checkbox-all" type="checkbox" class="w-4 h-4" onclick="toggleAll(this)">
                        </th>
                        <th class="px-6 py-3">Nomor</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Type</th>
                        <th class="px-6 py-3">Nama TestCase</th>
                        <th class="px-6 py-3">Steps</th>
                        <th class="px-6 py-3">Test Data</th>
                        <th class="px-6 py-3">Expected Result</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testCases as $testcase)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <input type="checkbox" name="selected_testcases[]" value="{{ $testcase->test_case_id }}"
                                    form="export-selected-form" class="row-checkbox w-4 h-4">
                            </td>
                            <td class="px-6 py-4">{{ $testcase->nomor }}</td>
                            <td class="px-6 py-4">{{ $testcase->kategori }}</td>
                            <td class="px-6 py-4">{{ $testcase->type }}</td>
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

        <!-- Pagination -->
        <div class="mt-6">
            {{ $testCases->links() }}
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function toggleAll(source) {
            document.querySelectorAll('.row-checkbox').forEach(checkbox => checkbox.checked = source.checked);
        }

        function copySelectedTexts() {
            const selectedIds = Array.from(document.querySelectorAll('input[name="selected_testcases[]"]:checked'))
                .map(cb => cb.closest('tr'));

            if (selectedIds.length === 0) {
                alert('Please select at least one Test Case to copy.');
                return;
            }

            let textToCopy = "Nomor | Kategori | Type | Nama TestCase | Steps | Expected Result\n";

            selectedIds.forEach(row => {
                const cells = row.querySelectorAll('td');
                let rowText = [];
                for (let i = 1; i < script cells.length; i++) {
                    rowText.push(cells[i].innerText.trim());
                }
                textToCopy += rowText.join(' | ') + "\n";
            });

            navigator.clipboard.writeText(textToCopy)
                .then(() => alert('Selected Test Cases copied to clipboard!'))
                .catch(err => alert('Failed to copy.'));
        }
    </script>
@endsection
