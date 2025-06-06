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

    <h2 class="text-2xl font-semibold text-white mb-6">Edit Synonym</h2>

    <form action="{{ route('admin.synonyms.update', $synonym) }}" method="POST"
        class="space-y-6 bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <!-- Original Word -->
        <div class="flex flex-col gap-2">
            <label for="original_word" class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                Original Word
            </label>
            <input type="text" name="original_word" id="original_word"
                value="{{ old('original_word', $synonym->original_word) }}"
                class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                required />
        </div>

        <!-- Synonyms -->
        <div class="flex flex-col gap-2">
            <label class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                Synonyms
            </label>
            <div id="synonym-fields" class="space-y-2">
                @foreach ($synonym->synonyms as $syn)
                    <input type="text" name="synonyms[]" value="{{ $syn }}"
                        class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        required />
                @endforeach
            </div>
            <button type="button" onclick="addSynonymField()" class="text-blue-600 text-sm hover:underline">
                + Add another synonym
            </button>
            @error('synonyms')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200">
                Update Synonym
            </button>
        </div>
    </form>

    <script>
        function addSynonymField() {
            const container = document.getElementById('synonym-fields');
            const input = document.createElement('input');
            input.type = 'text';
            input.name = 'synonyms[]';
            input.className =
                'w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white';
            input.placeholder = 'e.g. masuk';
            container.appendChild(input);
        }
    </script>
@endsection
