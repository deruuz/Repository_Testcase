@extends('admin.components.layout')

@section('title', 'Admin Dashboard')

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


    {{-- Tombol Aksi Cepat --}}
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="{{ route('admin.testcases.create') }}"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded font-semibold">➕ Tambah Test Case</a>
        <a href="{{ route('admin.testcases.export') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded font-semibold">⬇ Export Semua</a>
        <a href="{{ route('admin.testcases.index') }}"
            class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded font-semibold">🔍 Buka Halaman Test Case</a>
    </div>

    {{-- Statistik Card --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 flex items-center gap-4 shadow-sm">
            <span class="text-3xl">📄</span>
            <div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalTestCase }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Test Case</div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 flex items-center gap-4 shadow-sm">
            <span class="text-3xl">🗂</span>
            <div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalKategori }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Category</div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 flex items-center gap-4 shadow-sm">
            <span class="text-3xl">🏷</span>
            <div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalTipe }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Type Test Case</div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 flex items-center gap-4 shadow-sm">
            <span class="text-3xl">🧠</span>
            <div>
                <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalSinonim }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">Total Synonym</div>
            </div>
        </div>
    </div>

    {{-- Chart Distribusi --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
            <h3 class="font-bold text-gray-900 dark:text-white mb-2">Distribusi Test Case per Category</h3>
            <div id="chart-kategori"></div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
            <h3 class="font-bold text-gray-900 dark:text-white mb-2">Distribusi Test Case per Type</h3>
            <div id="chart-tipe"></div>
        </div>
    </div>

    {{-- Recent Activity --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm mb-8">
        <h3 class="font-bold text-gray-900 dark:text-white mb-4 text-3xl">Recent Activity</h3>
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($recentTestCases as $tc)
                <li class="py-2 flex flex-col md:flex-row md:items-center md:justify-between">
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $tc->nama_test_case }}</span>
                    <span
                        class="text-xs text-gray-500 dark:text-gray-400 mt-1 md:mt-0">{{ $tc->updated_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>


    {{-- Script Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var kategoriData = {
            series: [
                @foreach ($testCasePerKategori as $k)
                    {{ $k->test_cases_count }},
                @endforeach
            ],
            labels: [
                @foreach ($testCasePerKategori as $k)
                    "{{ $k->name }}",
                @endforeach
            ]
        };
        var tipeData = {
            series: [
                @foreach ($testCasePerTipe as $t)
                    {{ $t->test_cases_count }},
                @endforeach
            ],
            labels: [
                @foreach ($testCasePerTipe as $t)
                    "{{ $t->name }}",
                @endforeach
            ]
        };
        var optionsKategori = {
            chart: {
                type: 'pie'
            },
            series: kategoriData.series,
            labels: kategoriData.labels,
            legend: {
                labels: {
                    colors: ['#fff', '#fff', '#fff', '#fff', '#fff']
                }
            },
        };
        var optionsTipe = {
            chart: {
                type: 'pie'
            },
            series: tipeData.series,
            labels: tipeData.labels,
            legend: {
                labels: {
                    colors: ['#fff', '#fff', '#fff', '#fff', '#fff']
                }
            },
        };
        new ApexCharts(document.querySelector("#chart-kategori"), optionsKategori).render();
        new ApexCharts(document.querySelector("#chart-tipe"), optionsTipe).render();
    </script>


@endsection
