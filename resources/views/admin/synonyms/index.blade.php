@extends('admin.components.layout')

@section('content')
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-semibold text-white">Manage Synonyms</h2>
        <a href="{{ route('admin.synonyms.create') }}"
            class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200">
            + Add Synonym
        </a>
    </div>

    <!-- Table to show synonyms -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="px-6 py-3">Original Word</th>
                    <th class="px-6 py-3">Synonyms</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($synonyms as $synonym)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">{{ $synonym->id }}</td>
                        <td class="px-6 py-4">{{ $synonym->original_word }}</td>
                        <td class="px-6 py-4">
                            {{ is_array($synonym->synonyms) ? implode(', ', $synonym->synonyms) : $synonym->synonyms }}
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('admin.synonyms.edit', $synonym) }}"
                                class="text-blue-600 hover:underline text-sm">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.synonyms.destroy', $synonym) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $synonyms->links() }}
    </div>
@endsection
