@extends('admin.components.layout')

@section('content')
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-semibold text-white">Manage Tags</h2>
        <a href="{{ route('admin.tag.create') }}"
            class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200">
            + Add Tag
        </a>
    </div>

    <!-- Table to show tags -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="px-6 py-3">Tag Name</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tag as $tag)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">{{ $tag->id }}</td>
                        <td class="px-6 py-4">{{ $tag->name }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('admin.tag.edit', $tag) }}"
                                class="text-blue-600 hover:underline text-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.tag.destroy', $tag) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
