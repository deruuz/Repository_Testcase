@extends('admin.components.layout')

@section('content')
  <div class="flex justify-between mb-4">
    <h2 class="text-2xl font-semibold text-white">Manage Categories</h2>
    <a
      href="{{ route('admin.category.create') }}"
      class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200"
    >
      + Add Category
    </a>
  </div>

  <!-- Table to show categories -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th class="p-4">ID</th>
          <th class="px-6 py-3">Category Name</th>
          <th class="px-6 py-3">Description</th>
          <th class="px-6 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($category as $category)
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
          >
            <td class="p-4">{{ $category->id }}</td>
            <td class="px-6 py-4">{{ $category->name }}</td>
            <td class="px-6 py-4">{{ $category->description }}</td>
            <td class="px-6 py-4 flex gap-2">
              <a
                href="{{ route('admin.category.edit', $category) }}"
                class="text-blue-600 hover:underline text-sm"
              >
                Edit
              </a>
              <form
                method="POST"
                action="{{ route('admin.category.destroy', $category) }}"
              >
                @csrf
                @method('DELETE')
                <button
                  type="submit"
                  class="text-red-600 hover:underline text-sm"
                >
                  Delete
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
