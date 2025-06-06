<!DOCTYPE html>
<html lang="en" data-theme="" class="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Repository TestCase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="container m-auto bg-gray-200 dark:bg-slate-900">
    <!-- Header Section Start -->
    <header>
        <div class="container m-auto">
            <nav class="fixed w-full z-20 top-0 start-0 bg-opacity-90 backdrop-blur-md dark:bg-opacity-50 shadow">
                <div
                    class="container mx-auto flex flex-wrap items-center justify-between p-4 transition duration-300 ease-in-out px-4 max-w-7xl sm:px-6 lg:px-8">
                    <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                            Repository Test Case
                        </span>
                    </a>
                    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <a href="/login" type="button"
                            class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center me-2">
                            Login
                        </a>
                        <button id="theme-toggle" type="button"
                            class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button id="burger-menu" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="navbar-sticky" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                        <div class="container">
                            <div id="dropdown-menu"
                                class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-md dark:bg-gray-800 z-30">
                                <ul class="py-2 px-4">
                                    <li>
                                        <a href="#" class="block py-2 px-3 text-white hover:text-cyan-600">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-3 text-white hover:text-cyan-600">
                                            About
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-3 text-white hover:text-cyan-600">
                                            Features
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-3 text-white hover:text-cyan-600">
                                            Contact
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 transition duration-300 ease-in-out"
                        id="navbar-sticky"></div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Start -->
    <section id="home" class="pt-24 pb-36">
        <div class="absolute inset-0 bg-cover bg-center z-[-1]" style="background-image: url('/img/bg.png')">
            <!-- Overlay transparan untuk membuat gambar terlihat gelap -->
            <div class="absolute inset-0 bg-black opacity-30"></div>
            <div class="container relative z-10">
                {{-- hanya untuk menambah space --}}
            </div>
        </div>
    </section>

    <section class="bg-transparent">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Reusable Test Case Repository
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                A template-based test case repository designed to improve efficiency
                and ensure consistency in mobile application testing.
            </p>
        </div>
    </section>

    <section id="" class="pt-24 pb-14"></section>

    <section id="About" class="mt-40 py-10 bg-transparent sm:py-16 lg:py-36 pt-24 pb-48 rounded-lg px-4">
        <div class="max-w-8xl mx-auto">
            <h1 class="text-4xl font-bold mb-6 text-center text-white">
                Available Test Cases
            </h1>

            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                <!-- Search Box -->
                <form method="GET" id="filter-form" action="{{ route('welcome.testcases.index') }}#About"
                    class="flex flex-wrap gap-3 mb-6 items-center">
                    <input type="text" id="tag-input" name="search" value="{{ request('search') }}"
                        placeholder="Search..."
                        class="w-full md:w-72 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white" />

                    <ul id="tag-suggestions"
                        class="absolute z-10 w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg mt-1 max-h-40 overflow-auto hidden">
                        <!-- Suggestions will appear here -->
                    </ul>

                    <select name="category"
                        class="w-full md:w-64 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'selected' : '' }}>
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
                        <option value="positive" {{ request('case_type') == 'positive' ? 'selected' : '' }}>Positive
                        </option>
                        <option value="negative" {{ request('case_type') == 'negative' ? 'selected' : '' }}>Negative
                        </option>
                    </select>

                    <select name="perPage"
                        class="w-32 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach ([10, 25, 50, 100, 200] as $size)
                            <option value="{{ $size }}"
                                {{ request('perPage', 10) == $size ? 'selected' : '' }}>
                                Show {{ $size }}
                            </option>
                        @endforeach
                    </select>

                    <a href="{{ route('welcome.testcases.index') }}"
                        class="px-4 py-3 rounded-lg bg-gray-500 text-white hover:bg-gray-600 focus:ring-2 focus:ring-gray-400 focus:outline-none">
                        Clear Filter
                    </a>

                    <button type="submit"
                        class="px-4 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        Apply Filter
                    </button>

                </form>

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row gap-2">
                    <form id="export-selected-form" method="POST"
                        action="{{ route('guest.testcases.exportSelected') }}">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold rounded-lg transition duration-200 w-full md:w-auto">
                            Export Selected
                        </button>
                    </form>

                    <button type="button" onclick="copySelectedTexts()"
                        class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-lg transition duration-200 w-full md:w-auto">
                        Copy Selected
                    </button>

                    <button type="button" onclick="resetUsedStatus()"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-lg transition duration-200 w-full md:w-auto">
                        Clear Used
                    </button>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="testcaseTable"
                    class="min-w-[2000px] w-full text-sm text-left text-gray-500 dark:text-gray-400 border-0">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="w-12 p-4">
                                <input id="checkbox-all" type="checkbox" class="w-4 h-4"
                                    onclick="toggleAll(this)" />
                            </th>
                            <th class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Type</th>
                            <th class="px-6 py-3 min-w-[180px]">TestCase Name</th>
                            <th class="px-6 py-3">Steps</th>
                            <th class="px-6 py-3 min-w-[180px]">TestCase Type</th>
                            <th class="px-6 py-3">Priority</th>
                            <th class="px-6 py-3 min-w-[180px]">Test Data</th>
                            <th class="px-6 py-3 min-w-[180px]">Expected Result</th>
                            <th class="px-6 py-3 min-w-[180px]">Used Status</th>
                            <th class="px-6 py-3">Tags</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testCases as $testcase)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 group">
                                {{-- <td class="w-4 p-4">
                                    <input type="checkbox" name="selected_testcases[]"
                                        value="{{ $testcase->test_case_id }}" form="export-selected-form"
                                        class="row-checkbox w-4 h-4" />
                                </td> --}}

                                <td class="w-4 p-4">
                                    <input type="checkbox" class="row-checkbox w-4 h-4" name="selected_testcases[]"
                                        value="{{ $testcase->test_case_id }}" form="export-selected-form" />
                                </td>

                                <!-- Nomor -->
                                <td class="px-4 py-4 relative">
                                    {{ $testcase->nomor }}
                                    <button type="button" onclick="copyText('{{ $testcase->nomor }}', this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Nomor">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>

                                <!-- Kategori -->
                                <td class="px-4 py-4 relative">
                                    {{ $testcase->category->name ?? '-' }}
                                    <button type="button"
                                        onclick="copyText(`{{ $testcase->kategori->name ?? '-' }}`, this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Kategori">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>

                                <!-- Type -->
                                <td class="px-4 py-4 relative">
                                    {{ $testcase->jenis->name ?? '-' }}
                                    <button type="button"
                                        onclick="copyText(`{{ $testcase->jenis->name ?? '-' }}`, this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Type">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>

                                <!-- Nama TestCase -->
                                <td class="px-4 py-4 relative">
                                    {{ $testcase->nama_test_case }}
                                    <button type="button"
                                        onclick="copyText(`{{ $testcase->nama_test_case }}`, this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Nama TestCase">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>

                                <!-- Steps -->
                                <td class="px-4 py-4 relative">
                                    {!! nl2br(e($testcase->steps)) !!}
                                    <button type="button"
                                        onclick="copyText(`{{ strip_tags($testcase->steps) }}`, this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Steps">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>

                                <!-- Test Data -->

                                <td class="px-6 py-3 text-center">
                                    <span id="status-label-{{ $testcase->case_type }}"
                                        class="text-xs px-2 py-1 rounded 
            {{ $testcase->case_type == 'positive'
                ? 'bg-green-500 text-white'
                : ($testcase->case_type == 'negative'
                    ? 'bg-red-500 text-white'
                    : 'bg-gray-300 text-black') }}">
                                        {{ $testcase->case_type == 'positive' ? 'Positive' : ($testcase->case_type == 'negative' ? 'Negative' : 'Unknown') }}
                                    </span>
                                </td>
                                <button type="button"
                                    onclick="copyText(`{{ strip_tags($testcase->case_type) }}`, this)"
                                    class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                    title="Copy Steps">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                            clip-rule="evenodd" />
                                        <path fill-rule="evenodd"
                                            d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                </td>

                                <!-- Test Data -->
                                <td class="px-4 py-4 relative">
                                    {!! nl2br(e($testcase->priority)) !!}
                                    <button type="button"
                                        onclick="copyText(`{{ strip_tags($testcase->priority) }}`, this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Steps">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>

                                <td class="px-4 py-4 relative max-w-xs break-words whitespace-pre-line">
                                    {!! nl2br(e($testcase->test_data)) !!}
                                    <button type="button"
                                        onclick="copyText(`{{ strip_tags($testcase->test_data) }}`, this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Steps">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" ...> ... </svg>
                                    </button>
                                </td>


                                <!-- Expected Result -->
                                <td class="px-4 py-4 relative">
                                    {!! nl2br(e($testcase->expected_result)) !!}
                                    <button type="button"
                                        onclick="copyText(`{{ strip_tags($testcase->expected_result) }}`, this)"
                                        class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                                        title="Copy Expected Result">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </td>

                                <td
                                    class="px-6 py-3 text-center flex flex-col-reverse items-center justify-center gap-2">
                                    <span id="status-label-{{ $testcase->test_case_id }}"
                                        class="text-xs px-2 py-1 rounded mb-2 status-label">
                                        Unused
                                    </span>

                                    <label class="inline-flex items-center cursor-pointer mt-2 w-fit">
                                        <input type="checkbox" data-id="{{ $testcase->test_case_id }}"
                                            class="sr-only peer row-checkbox used-toggle">
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                                        </div>
                                    </label>
                                </td>


                                <td>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($testcase->tag_names as $tagName)
                                            <span
                                                class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm max-w-[80px] truncate"
                                                title="{{ $tagName }}">
                                                {{ $tagName }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- <div class="mt-4">
          {{ $testCases->links() }}
        </div> -->
            <!-- Pagination with Entries per Page on the right -->
            <div class="mt-6 flex flex-col md:flex-row justify-between items-center">
                <!-- Entries per Page Dropdown (right side) -->
                <!-- <form method="GET" class="flex items-center gap-2 mb-4 md:mb-0">
                    <label class="text-sm text-gray-600 dark:text-gray-400">Show</label>
                    <select name="perPage" onchange="this.form.submit()"
                        class="w-20 p-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="10" {{ request('perPage') == '10' ? 'selected' : '' }}>
                            10
                        </option>
                        <option value="25" {{ request('perPage') == '25' ? 'selected' : '' }}>
                            25
                        </option>
                        <option value="50" {{ request('perPage') == '50' ? 'selected' : '' }}>
                            50
                        </option>
                        <option value="100" {{ request('perPage') == '100' ? 'selected' : '' }}>
                            100
                        </option>
                        <option value="200" {{ request('perPage') == '200' ? 'selected' : '' }}>
                            200
                        </option>
                    </select>
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        entries
                    </span>
                </form> -->

                <!-- Pagination Controls (left side) -->
                <div class="mb-4 md:mb-0">
                    {{ $testCases->links() }}
                    <!-- This will render pagination controls -->
                </div>
            </div>
        </div>

        <style>
            .copied-msg {
                font-size: 12px;
                color: #22c55e;
                position: absolute;
                right: 0.5rem;
                top: -0.5rem;
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

        {{-- Script untuk menangani localStorage --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi status dari localStorage
                const usedTestCases = JSON.parse(localStorage.getItem('usedTestCases') || '{}');

                // Update tampilan checkbox dan label
                document.querySelectorAll('.used-toggle').forEach(checkbox => {
                    const testcaseId = checkbox.getAttribute('data-id');
                    const statusLabel = document.getElementById(`status-label-${testcaseId}`);

                    // Set status checkbox
                    checkbox.checked = usedTestCases[testcaseId] || false;

                    // Update label
                    updateStatusLabel(statusLabel, checkbox.checked);

                    // Event listener untuk perubahan checkbox
                    checkbox.addEventListener('change', function() {
                        const isUsed = this.checked;

                        // Update localStorage
                        usedTestCases[testcaseId] = isUsed;
                        localStorage.setItem('usedTestCases', JSON.stringify(usedTestCases));

                        // Update label
                        updateStatusLabel(statusLabel, isUsed);
                    });
                });
            });

            function updateStatusLabel(label, isUsed) {
                label.textContent = isUsed ? 'Used' : 'Unused';
                label.className =
                    `text-xs px-2 py-1 rounded mb-2 ${isUsed ? 'bg-green-500 text-white' : 'bg-gray-300 text-black'}`;
            }

            // Fungsi untuk reset semua status
            function resetUsedStatus() {
                localStorage.removeItem('usedTestCases');
                location.reload();
            }
        </script>



        <script>
            function toggleAll(source) {
                document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = source.checked);
            }

            function copyText(text, btn = null) {
                navigator.clipboard.writeText(text).then(() => {
                    if (btn) {
                        const msg = document.createElement('span');
                        msg.className = 'copied-msg';
                        msg.innerText = 'Copied!';
                        btn.parentElement.appendChild(msg);
                        setTimeout(() => msg.remove(), 1200);
                    } else {
                        alert('Copied!');
                    }
                });
            }

            function copySelectedTexts() {
                const selectedRows = Array.from(document.querySelectorAll('input[name="selected_testcases[]"]:checked')).map(
                    cb => cb.closest('tr'));
                if (selectedRows.length === 0) return alert('Please select at least one Test Case.');

                let textToCopy =
                    "Nomor | Kategori | Type | Nama TestCase | Steps | TestCase Type | Priority | Test Data | Expected Result\n";
                selectedRows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    let rowText = [];
                    // Mengambil semua kolom kecuali dua terakhir
                    for (let i = 1; i < cells.length - 3; i++) {
                        rowText.push(cells[i].innerText.trim());
                    }
                    textToCopy += rowText.join(' | ') + "\n";
                });

                navigator.clipboard.writeText(textToCopy)
                    .then(() => alert('Copied selected test cases to clipboard!'))
                    .catch(() => alert('Failed to copy.'));
            }
        </script>

    </section>

    <!-- Footer Section Start -->
    <section id="contact" class="pt-24 pb-24 m-auto">
        <div class="absolute left-0 right-0 transform translate-y-1/2">
            <footer class="bg-gray-300 dark:bg-slate-950">
                <div class="w-full p-24 py-6 lg:py-8 shadow-lg">
                    <div class="md:flex md:justify-between">
                        <!-- logo -->
                    </div>

                    <!-- <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" /> -->

                    <div class="sm:flex sm:items-center sm:justify-between">
                        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                            © 2025
                            <a href="#" class="hover:underline">RepositoryTestCase</a>
                            . All Rights Reserved.
                        </span>

                        <div class="flex mt-4 sm:justify-center sm:mt-0">
                            <!-- github -->
                            <a href="https://github.com/deruuz/Repository_testcase"
                                class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">GitHub account</span>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </section>
    <!-- Footer Section End -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const section = document.querySelector('section');
            section.classList.add('show');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const burgerMenu = document.getElementById('burger-menu');
            const dropdownMenu = document.getElementById('dropdown-menu');

            burgerMenu.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- <script src="/resources/js/dropDown.js"></script> --}}
</body>

</html>
