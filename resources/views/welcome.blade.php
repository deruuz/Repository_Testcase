<!DOCTYPE html>
<html lang="en" data-theme="" class="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Repository TestCase</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  </head>

  <body class="container m-auto bg-gray-200 dark:bg-slate-900">
    <!-- Header Section Start -->
    <header>
      <div class="container m-auto">
        <nav
          class="fixed w-full z-20 top-0 start-0 bg-opacity-90 backdrop-blur-md dark:bg-opacity-50 shadow"
        >
          <div
            class="container mx-auto flex flex-wrap items-center justify-between mx-auto p-4 transition duration-300 ease-in-out px-4 mx-auto max-w-7xl sm:px-6 lg:px-8"
          >
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
              <img
                src="https://flowbite.com/docs/images/logo.svg"
                class="h-8"
                alt="Flowbite Logo"
              />
              <span
                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
              >
                Repository Test Case
              </span>
            </a>
            <div
              class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"
            >
              <a
                href="/login"
                type="button"
                class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center me-2"
              >
                Login
              </a>
              <button
                id="theme-toggle"
                type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
              >
                <svg
                  id="theme-toggle-dark-icon"
                  class="hidden w-5 h-5"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                  ></path>
                </svg>
                <svg
                  id="theme-toggle-light-icon"
                  class="hidden w-5 h-5"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <button
                id="burger-menu"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky"
                aria-expanded="false"
              >
                <span class="sr-only">Open main menu</span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 17 14"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15"
                  />
                </svg>
              </button>
              <div class="container">
                <div
                  id="dropdown-menu"
                  class="hidden md:hidden absolute top-full left-0 w-full bg-white shadow-md dark:bg-gray-800 z-30"
                >
                  <ul class="py-2 px-4">
                    <li>
                      <a
                        href="#"
                        class="block py-2 px-3 text-white hover:text-cyan-600"
                      >
                        Home
                      </a>
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block py-2 px-3 text-white hover:text-cyan-600"
                      >
                        About
                      </a>
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block py-2 px-3 text-white hover:text-cyan-600"
                      >
                        Features
                      </a>
                    </li>
                    <li>
                      <a
                        href="#"
                        class="block py-2 px-3 text-white hover:text-cyan-600"
                      >
                        Contact
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div
              class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 transition duration-300 ease-in-out"
              id="navbar-sticky"
            ></div>
          </div>
        </nav>
      </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Start -->
    <section id="home" class="pt-24 pb-36">
      <div
        class="absolute inset-0 bg-cover bg-center z-[-1]"
        style="background-image: url('/img/bg.png')"
      >
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
          class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
        >
          Reusable Test Case Repository
        </h1>
        <p
          class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"
        >
          A template-based test case repository designed to improve efficiency
          and ensure consistency in mobile application testing.
        </p>
      </div>
    </section>

    <section id="" class="pt-24 pb-14"></section>

    <section
      id="About"
      class="mt-40 py-10 bg-transparent sm:py-16 lg:py-36 pt-24 pb-48 rounded-lg"
    >
      <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-center text-white">
          Available Test Cases
        </h1>

        <div
          class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6"
        >
          <!-- Search Box -->
          <form
            method="GET"
            action="#testcaseTable"
            class="flex w-full md:w-auto gap-2"
          >
            <input
              type="text"
              id="searchInput"
              name="search"
              value="{{ request('search') }}"
              placeholder="Search Test Case..."
              class="w-full md:w-80 p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:text-white"
            />
            <button
              type="submit"
              class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg transition duration-200"
            >
              Search
            </button>
          </form>

          <!-- Action Buttons -->
          <div class="flex flex-col md:flex-row gap-2">
            <form
              id="export-selected-form"
              method="POST"
              action="{{ route('guest.testcases.exportSelected') }}"
            >
              @csrf
              <button
                type="submit"
                class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-semibold rounded-lg transition duration-200 w-full md:w-auto"
              >
                Export Selected
              </button>
            </form>

            <button
              type="button"
              onclick="copySelectedTexts()"
              class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-lg transition duration-200 w-full md:w-auto"
            >
              Copy Selected
            </button>
          </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table
            id="testcaseTable"
            class="table-fixed w-full text-sm text-left text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr>
                <th class="w-12 p-4">
                  <input
                    id="checkbox-all"
                    type="checkbox"
                    class="w-4 h-4"
                    onclick="toggleAll(this)"
                  />
                </th>
                <th class="w-20 px-4 py-3">No</th>
                <th class="w-32 px-4 py-3">Category</th>
                <th class="w-32 px-4 py-3">Type</th>
                <th class="w-64 px-4 py-3">Name TestCase</th>
                <th class="w-96 px-4 py-3">Steps</th>
                <th class="w-96 px-4 py-3">Test Data</th>
                <th class="w-96 px-4 py-3">Expected Result</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($testCases as $testcase)
                <tr
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 group"
                >
                  <td class="w-4 p-4">
                    <input
                      type="checkbox"
                      name="selected_testcases[]"
                      value="{{ $testcase->test_case_id }}"
                      form="export-selected-form"
                      class="row-checkbox w-4 h-4"
                    />
                  </td>

                  <!-- Nomor -->
                  <td class="px-4 py-4 relative">
                    {{ $testcase->nomor }}
                    <button
                      type="button"
                      onclick="copyText('{{ $testcase->nomor }}')"
                      class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                      title="Copy Nomor"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </td>

                  <!-- Kategori -->
                  <td class="px-4 py-4 relative">
                    {{ $testcase->kategori }}
                    <button
                      type="button"
                      onclick="copyText(`{{ $testcase->kategori }}`)"
                      class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                      title="Copy Kategori"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </td>

                  <!-- Type -->
                  <td class="px-4 py-4 relative">
                    {{ $testcase->type }}
                    <button
                      type="button"
                      onclick="copyText(`{{ $testcase->type }}`)"
                      class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                      title="Copy Type"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </td>

                  <!-- Nama TestCase -->
                  <td class="px-4 py-4 relative">
                    {{ $testcase->nama_test_case }}
                    <button
                      type="button"
                      onclick="copyText(`{{ $testcase->nama_test_case }}`)"
                      class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                      title="Copy Nama TestCase"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </td>

                  <!-- Steps -->
                  <td class="px-4 py-4 relative">
                    {!! nl2br(e($testcase->steps)) !!}
                    <button
                      type="button"
                      onclick="copyText(`{{ strip_tags($testcase->steps) }}`)"
                      class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                      title="Copy Steps"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </td>

                  <!-- Test Data -->
                  <td class="px-4 py-4 relative">
                    {!! nl2br(e($testcase->test_data)) !!}
                    <button
                      type="button"
                      onclick="copyText(`{{ strip_tags($testcase->test_data) }}`)"
                      class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                      title="Copy Steps"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </td>

                  <!-- Expected Result -->
                  <td class="px-4 py-4 relative">
                    {!! nl2br(e($testcase->expected_result)) !!}
                    <button
                      type="button"
                      onclick="copyText(`{{ strip_tags($testcase->expected_result) }}`)"
                      class="copy-btn invisible group-hover:visible absolute top-1/2 right-2 transform -translate-y-1/2 text-xs"
                      title="Copy Expected Result"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-4">
          {{ $testCases->links() }}
        </div>
      </div>

      <style>
        .copy-btn {
          transition: opacity 0.3s ease;
          opacity: 0;
        }

        .group:hover .copy-btn {
          opacity: 1;
        }
      </style>

      <script>
        function toggleAll(source) {
          document
            .querySelectorAll('.row-checkbox')
            .forEach((checkbox) => (checkbox.checked = source.checked));
        }

        function copyText(text) {
          navigator.clipboard
            .writeText(text)
            .then(() => console.log('Text copied!'))
            .catch((err) => console.error('Failed to copy text.', err));
        }

        function copySelectedTexts() {
          const selectedIds = Array.from(
            document.querySelectorAll(
              'input[name="selected_testcases[]"]:checked'
            )
          ).map((cb) => cb.closest('tr'));

          if (selectedIds.length === 0) {
            alert('Please select at least one Test Case to copy.');
            return;
          }

          let textToCopy =
            'Nomor | Kategori | Type | Nama TestCase | Steps | Expected Result\n';

          selectedIds.forEach((row) => {
            const cells = row.querySelectorAll('td');
            let rowText = [];
            for (let i = 1; i < cells.length; i++) {
              rowText.push(cells[i].innerText.trim());
            }
            textToCopy += rowText.join(' | ') + '\n';
          });

          navigator.clipboard
            .writeText(textToCopy)
            .then(() => alert('Selected Test Cases copied to clipboard!'))
            .catch((err) => alert('Failed to copy.'));
        }

        function searchTable() {
          var input = document.getElementById('searchInput');
          var filter = input.value.toUpperCase();
          var table = document.getElementById('testcaseTable');
          var tr = table.getElementsByTagName('tr');

          for (let i = 1; i < tr.length; i++) {
            let tdArray = tr[i].getElementsByTagName('td');
            let found = false;
            for (let j = 1; j < tdArray.length; j++) {
              let td = tdArray[j];
              if (td) {
                let txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  found = true;
                }
              }
            }
            tr[i].style.display = found ? '' : 'none';
          }
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
              <!-- <div class="mb-6 md:mb-0">
                            <a href="#" class="flex items-center">
                                <img src="/img/bkpm.png" class="h-14 w-24" alt="">
                                <span
                                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
                            </a>
                        </div> -->

              <!-- terms and condition -->
              <!-- <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                            <div>
                                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                                    Resources
                                </h2>
                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                    <li class="mb-4">
                                        <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                                    </li>
                                    <li>
                                        <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow
                                    us
                                </h2>
                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                    <li class="mb-4">
                                        <a href="https://github.com/themesberg/flowbite"
                                            class="hover:underline ">Github</a>
                                    </li>
                                    <li>
                                        <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal
                                </h2>
                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                    <li class="mb-4">
                                        <a href="#" class="hover:underline">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
            </div>

            <!-- <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" /> -->

            <div class="sm:flex sm:items-center sm:justify-between">
              <span
                class="text-sm text-gray-500 sm:text-center dark:text-gray-400"
              >
                © 2025
                <a href="#" class="hover:underline">RepositoryTestCase</a>
                . All Rights Reserved.
              </span>

              <div class="flex mt-4 sm:justify-center sm:mt-0">
                <!-- facebook -->
                <!-- <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 8 19">
                                    <path fill-rule="evenodd"
                                        d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Facebook page</span>
                            </a> -->

                <!-- discord -->
                <!-- <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 21 16">
                                    <path
                                        d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                                </svg>
                                <span class="sr-only">Discord community</span>
                            </a> -->

                <!-- twiter -->
                <!-- <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 17">
                                    <path fill-rule="evenodd"
                                        d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Twitter page</span>
                            </a> -->

                <!-- github -->
                <a
                  href="#"
                  class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5"
                >
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span class="sr-only">GitHub account</span>
                </a>

                <!-- dribble -->
                <!-- <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Dribbble account</span>
                            </a> -->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </section>
    <!-- Footer Section End -->

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const section = document.querySelector('section');
        section.classList.add('show');
      });

      document.addEventListener('DOMContentLoaded', function () {
        const burgerMenu = document.getElementById('burger-menu');
        const dropdownMenu = document.getElementById('dropdown-menu');

        burgerMenu.addEventListener('click', function () {
          dropdownMenu.classList.toggle('hidden');
        });
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    {{-- <script src="/resources/js/dropDown.js"></script> --}}
  </body>
</html>
