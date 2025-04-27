@extends('admin.components.layout')

@section('content')
  <h2 class="text-2xl font-semibold text-white">Edit Category</h2>

  <form
    action="{{ route('admin.category.update', $category) }}"
    method="POST"
    class="space-y-6 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6"
  >
    @csrf
    @method('PUT')

    <div class="flex flex-col gap-2">
      <label
        for="name"
        class="text-sm font-semibold text-gray-700 dark:text-gray-200"
      >
        Category Name
      </label>
      <input
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $category->name) }}"
        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
        required
      />
    </div>

    <div class="flex flex-col gap-2">
      <label
        for="description"
        class="text-sm font-semibold text-gray-700 dark:text-gray-200"
      >
        Description
      </label>
      <textarea
        name="description"
        id="description"
        rows="4"
        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
      >
{{ old('description', $category->description) }}</textarea
      >
    </div>

    <div class="flex justify-end">
      <button
        type="submit"
        class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200"
      >
        Update Category
      </button>
    </div>
  </form>
@endsection
