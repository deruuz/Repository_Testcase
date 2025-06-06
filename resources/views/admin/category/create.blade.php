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
            Create New Category
        </h2>

        <form action="{{ route('admin.category.store') }}" method="POST"
            class="space-y-6 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @csrf

            <!-- Category Name Input -->
            <div class="flex flex-col gap-2">
                <label for="name" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Category Name
                </label>
                <input type="text" name="name" id="name"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    value="{{ old('name') }}" required />
                @error('name')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description Input -->
            <div class="flex flex-col gap-2">
                <label for="description" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                    Description
                </label>
                <textarea name="description" id="description" rows="4"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white resize-none">
    {{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                    Save Category
                </button>
            </div>
        </form>
    </div>
@endsection
