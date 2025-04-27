<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Login')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-slate-900 rounded-full text-white m-auto">
    @if (session('success'))
      <script>
        document.addEventListener('DOMContentLoaded', function () {
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

    <section
      class="flex justify-center items-center h-screen bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]"
    >
      <div
        class="w-full max-w-sm p-8 rounded-lg shadow-lg bg-gray-800 bg-opacity-50 border-2 border-blue-500 neon-border"
      >
        <!-- logo -->
        <!-- <div class="flex justify-center mb-6">
                <img src="{{ asset('img/WD.png') }}" alt="Logo" class="h-12">
            </div> -->

        <form class="space-y-6" action="{{ route('login') }}" method="POST">
          <h5 class="text-xl font-medium text-white text-center">
            Login to Dashboard
          </h5>
          @csrf
          <div>
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-300"
            >
              Email:
            </label>
            <input
              type="text"
              id="email"
              name="email"
              required
              class="bg-gray-700 border border-gray-600 text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
          </div>

          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-300"
            >
              Password:
            </label>
            <input
              type="password"
              id="password"
              name="password"
              required
              class="bg-gray-700 border border-gray-600 text-gray-200 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
          </div>

          <button
            type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
          >
            Sign in
          </button>

          <!-- with google -->
          <!-- <a href=""
                    class="relative inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-gray-200 transition-all duration-200 bg-gray-800 border border-gray-600 rounded-md hover:bg-gray-700 focus:bg-gray-700 hover:text-white focus:text-white focus:outline-none">
                    <div class="absolute inset-y-0 left-0 p-4">
                        <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z">
                            </path>
                        </svg>
                    </div>
                    Sign in dengan Google
                </a> -->

          {{--
            <p class="text-gray-300 text-center">Belum punya akun? <a class="text-blue-500"
            href="{{ route('register') }}">Register</a></p>
          --}}
        </form>

        @if ($errors->any())
          <div class="mt-4 p-4 bg-red-800 text-red-300 rounded-lg">
            <p>{{ $errors->first() }}</p>
          </div>
        @endif
      </div>
    </section>
  </body>
</html>
