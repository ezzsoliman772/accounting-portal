@extends('layouts.app')

@section('title', 'Dashboard · Fathalla & Co.')

@section('content')

<div class="space-y-6">

    {{-- ═══ Title ═══ --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Dashboard</h1>
    </div>

    {{-- ═══ KPI Cards ═══ --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 md:gap-6">

        {{-- Active services --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M8.804 5.602a2.197 2.197 0 1 0 0 4.393 2.197 2.197 0 0 0 0-4.393M5.107 7.799a3.697 3.697 0 1 1 7.394 0 3.697 3.697 0 0 1-7.394 0m-.244 7.522c-.775.767-1.16 1.74-1.346 2.54a.37.37 0 0 0 .09.35c.095.103.26.188.469.188h9.349c.21 0 .374-.085.469-.188a.37.37 0 0 0 .09-.35c-.187-.8-.57-1.773-1.346-2.54-.756-.749-1.948-1.366-3.888-1.366s-3.131.617-3.887 1.366m-1.056-1.066c1.065-1.054 2.649-1.8 4.943-1.8 2.295 0 3.88.746 4.944 1.8 1.046 1.036 1.527 2.306 1.75 3.265.322 1.377-.837 2.379-2.02 2.379H4.077c-1.182 0-2.341-1.002-2.02-2.379.224-.96.705-2.23 1.751-3.265m11.497-2.76a3.68 3.68 0 0 1-2.222-.742c.292-.422.523-.889.681-1.389a2.197 2.197 0 1 0 0-3.132c-.158-.5-.389-.966-.681-1.388a3.697 3.697 0 1 1 2.222 6.652m4.62 8.404H16.39a3.14 3.14 0 0 0 .593-1.5h2.942c.21 0 .374-.085.469-.188a.37.37 0 0 0 .09-.35c-.187-.8-.571-1.773-1.346-2.54-.733-.726-1.877-1.329-3.715-1.364a7.4 7.4 0 0 0-1.431-1.42 9 9 0 0 1 1.258-.082c2.295 0 3.88.746 4.944 1.8 1.046 1.036 1.527 2.306 1.75 3.265.322 1.377-.837 2.379-2.02 2.379" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Active services</span>
                <h4 class="mt-2 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">8</h4>
            </div>
        </div>

        {{-- Outstanding payments --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M13.416 2.792a.75.75 0 0 0-1.5 0v1.607a4.05 4.05 0 0 0-.857 7.8l2.688 1.008a2.548 2.548 0 0 1-.894 4.934h-1.057a1.863 1.863 0 0 1-1.864-1.864.75.75 0 0 0-1.5 0 3.363 3.363 0 0 0 3.364 3.364h.12v1.567a.75.75 0 0 0 1.5 0v-1.606a4.049 4.049 0 0 0 .858-7.8l-2.688-1.008a2.548 2.548 0 0 1 .895-4.934h1.056c1.03 0 1.864.834 1.864 1.863a.75.75 0 0 0 1.5 0 3.363 3.363 0 0 0-3.364-3.363h-.12z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Outstanding payments</span>
                <h4 class="mt-2 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">EGP 19,550</h4>
            </div>
        </div>

        {{-- Pending document requests --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M11.665 3.756a.75.75 0 0 1 .67 0l6.446 3.223-6.445 3.222a.75.75 0 0 1-.671 0L5.22 6.979zM4.293 8.192v7.903c0 .284.16.543.415.67l6.542 3.272V11.65a2 2 0 0 1-.256-.108zm8.457 11.845 6.543-3.272a.75.75 0 0 0 .415-.67V8.192l-6.701 3.35q-.126.063-.257.11zm.257-17.622a2.25 2.25 0 0 0-2.013 0L4.037 5.893a2.25 2.25 0 0 0-1.244 2.013v8.189a2.25 2.25 0 0 0 1.244 2.012l6.957 3.479.336-.671-.336.67a2.25 2.25 0 0 0 2.013 0l6.957-3.478a2.25 2.25 0 0 0 1.244-2.012v-8.19a2.25 2.25 0 0 0-1.244-2.012z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Pending document requests</span>
                <h4 class="mt-2 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">5</h4>
            </div>
        </div>

        {{-- Overdue services --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M3.042 10a6.958 6.958 0 1 1 13.916 0 6.958 6.958 0 0 1-13.916 0M10 1.542a8.458 8.458 0 1 0 0 16.916 8.458 8.458 0 0 0 0-16.916m0 9.208a.75.75 0 0 1-.75-.75V5.417a.75.75 0 0 1 1.5 0V9.25h2.583a.75.75 0 0 1 0 1.5z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="mt-5">
                <span class="text-sm text-gray-500 dark:text-gray-400">Overdue services</span>
                <h4 class="mt-2 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">7</h4>
            </div>
        </div>
    </div>

    {{-- ═══ Chart ═══ --}}
    <div class="overflow-x-auto rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Invoiced vs collected</h3>
        <div id="invoicedChart" style="min-height: 275px;"></div>
    </div>

    {{-- ═══ Tables Row ═══ --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

        {{-- Pending documents --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Pending documents</h3>
            <div class="min-w-0 overflow-x-auto">
                <table class="w-full min-w-[640px]">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Name</th>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                <a class="text-brand-600 hover:underline" href="#">Commercial Registry Renewal</a>
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">Nile Trading Co.</td>
                            <td class="px-3 py-3 text-theme-sm sm:px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500">Overdue</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                <a class="text-brand-600 hover:underline" href="#">Payroll Compliance Review — Aug 2026</a>
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">Alexandria Textiles SAE</td>
                            <td class="px-3 py-3 text-theme-sm sm:px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500">Overdue</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Awaiting review --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Awaiting review</h3>
            <div class="min-w-0 overflow-x-auto">
                <table class="w-full min-w-[640px]">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Name</th>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                <a class="text-brand-600 hover:underline" href="#">Corporate Tax Return 2025</a>
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">Nile Trading Co.</td>
                            <td class="px-3 py-3 text-theme-sm sm:px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500">Overdue</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                <a class="text-brand-600 hover:underline" href="#">Commercial Registry Renewal 2026</a>
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">Cairo Medical Center</td>
                            <td class="px-3 py-3 text-theme-sm sm:px-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500">Overdue</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Overdue --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Overdue</h3>
            <div class="min-w-0 overflow-x-auto">
                <table class="w-full min-w-[640px]">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Name</th>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                            <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach([
                            ['Annual Financial Statement Preparation', 'Nile Trading Co.'],
                            ['Commercial Registry Renewal', 'Nile Trading Co.'],
                            ['Corporate Tax Return 2025', 'Nile Trading Co.'],
                            ['Payroll Compliance Review', 'Nile Trading Co.'],
                            ['Payroll Compliance Review — Aug 2026', 'Alexandria Textiles SAE'],
                            ['Commercial Registry Renewal 2026', 'Cairo Medical Center'],
                            ['Personal / Corporate Tax Support 2025', 'Ahmed Hassan'],
                        ] as [$name, $client])
                            <tr>
                                <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                    <a class="text-brand-600 hover:underline" href="#">{{ $name }}</a>
                                </td>
                                <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $client }}</td>
                                <td class="px-3 py-3 text-theme-sm sm:px-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500">Overdue</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async () => {
    const { default: ApexCharts } = await window.loadApexCharts();

    new ApexCharts(document.querySelector("#invoicedChart"), {
        series: [
            { name: 'Invoiced',  data: [9000, 14500, 7500, 4200, 3000, 13000, 11000, 4000, 0, 0, 0, 0] },
            { name: 'Collected', data: [7500, 6800, 14800, 4200, 2200, 8000, 5800, 500, 0, 0, 0, 0] },
        ],
        chart: {
            type: 'bar',
            height: 350,
            width: '100%',
            redrawOnParentResize: true,   
            redrawOnWindowResize: true,  
            fontFamily: 'Outfit, sans-serif',
            toolbar: { show: false },
        },
        colors: ['#4a9928', '#c0d72f'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                borderRadius: 4,
            },
        },
        dataLabels: { enabled: false },
        xaxis: {
            categories: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        },
        legend: { position: 'top', horizontalAlign: 'left' },
        grid: { borderColor: '#e0e0e0' },
    }).render();
});
</script>
@endpush