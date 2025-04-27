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
    <div class="w-full p-6">
        <h2 class="text-2xl font-bold mb-6 text-start text-white">Edit TestCase</h2>

        <form action="{{ route('admin.testcases.update', $testcase) }}" method="POST"
            class="space-y-6 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="flex flex-col gap-2">
                <label for="nomor" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Number</label>
                <input type="number" name="nomor" id="nomor" value="{{ old('nomor', $testcase->nomor) }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
            </div>

            <div class="flex flex-col gap-2">
                <label for="kategori" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Category</label>
                <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $testcase->kategori) }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
            </div>

            <div class="flex flex-col gap-2">
                <label for="type" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Type</label>
                <input type="text" name="type" id="type" value="{{ old('type', $testcase->type) }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
            </div>

            <div class="flex flex-col gap-2">
                <label for="nama_test_case" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    TestCase Name</label>
                <input type="text" name="nama_test_case" id="nama_test_case"
                    value="{{ old('nama_test_case', $testcase->nama_test_case) }}"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    required>
            </div>

            <div class="flex flex-col gap-2">
                <label for="steps" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Steps</label>
                <textarea name="steps" id="steps" rows="5"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"
                    required>{{ old('steps', $testcase->steps) }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label for="test_data" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Test Data</label>
                <textarea name="test_data" id="test_data" rows="4"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none">{{ old('test_data', $testcase->test_data) }}</textarea>
            </div>

            <div class="flex flex-col gap-2">
                <label for="expected_result" class="text-sm font-semibold text-gray-700 dark:text-gray-200">Expected
                    Result</label>
                <textarea name="expected_result" id="expected_result" rows="5"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none"
                    required>{{ old('expected_result', $testcase->expected_result) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                    Update TestCase
                </button>
            </div>
        </form>
    </div>
@endsection
