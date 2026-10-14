@extends('layouts.app')

@section('title', 'Team insights · Fathalla & Co.')

@section('content')

<div class="space-y-6">

    {{-- ═══ Page Header ═══ --}}
    <div>
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Team insights</h1>
        <p class="mt-1 text-sm text-gray-500">Who closed the most cases, who is fastest, and who collected the most.</p>
    </div>

    {{-- ═══ KPI Cards ═══ --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4 md:gap-6">

        {{-- Most cases closed --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M3.55 12a8.448 8.448 0 1 1 16.897 0 8.448 8.448 0 0 1-16.896 0M12 2.052c-5.494 0-9.948 4.454-9.948 9.948s4.454 9.948 9.948 9.948 9.948-4.454 9.948-9.948S17.493 2.052 12 2.052m3.514 8.581a.75.75 0 1 0-1.061-1.06l-3.264 3.263-1.642-1.642a.75.75 0 0 0-1.06 1.06l2.172 2.173a.75.75 0 0 0 1.06 0z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Most cases closed</p>
            <h4 class="mt-1 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">Nour El-Masry</h4>
            <p class="mt-1 text-sm text-gray-500">2 · Closed cases</p>
        </div>

        {{-- Fastest closer --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M3.042 10a6.958 6.958 0 1 1 13.916 0 6.958 6.958 0 0 1-13.916 0M10 1.542a8.458 8.458 0 1 0 0 16.916 8.458 8.458 0 0 0 0-16.916m0 9.208a.75.75 0 0 1-.75-.75V5.417a.75.75 0 0 1 1.5 0V9.25h2.583a.75.75 0 0 1 0 1.5z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Fastest closer</p>
            <h4 class="mt-1 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">Nour El-Masry</h4>
            <p class="mt-1 text-sm text-gray-500">6.7 days · Avg. time to close</p>
        </div>

        {{-- Top collector --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M13.416 2.792a.75.75 0 0 0-1.5 0v1.607a4.05 4.05 0 0 0-.857 7.8l2.688 1.008a2.548 2.548 0 0 1-.894 4.934h-1.057a1.863 1.863 0 0 1-1.864-1.864.75.75 0 0 0-1.5 0 3.363 3.363 0 0 0 3.364 3.364h.12v1.567a.75.75 0 0 0 1.5 0v-1.606a4.049 4.049 0 0 0 .858-7.8l-2.688-1.008a2.548 2.548 0 0 1 .895-4.934h1.056c1.03 0 1.864.834 1.864 1.863a.75.75 0 0 0 1.5 0 3.363 3.363 0 0 0-3.364-3.363h-.12z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Top collector</p>
            <h4 class="mt-1 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">Reda Ragab</h4>
            <p class="mt-1 text-sm text-gray-500">EGP 37,250 · Collected</p>
        </div>

        {{-- Most activity --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <div class="flex items-center justify-center w-12 h-12 bg-brand-50 rounded-xl text-brand-600 dark:bg-brand-500/15">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M7.756 5.501a.75.75 0 0 1 .75-.75h9.993a.75.75 0 0 1 .75.75v9.995a.75.75 0 0 1-.75.75H8.506a.75.75 0 0 1-.75-.75zm.75-2.25a2.25 2.25 0 0 0-2.25 2.25v.762h-.754a2.25 2.25 0 0 0-2.25 2.25V18.5a2.25 2.25 0 0 0 2.25 2.25h9.986a2.25 2.25 0 0 0 2.25-2.25v-.754h.76a2.25 2.25 0 0 0 2.25-2.25V5.5a2.25 2.25 0 0 0-2.25-2.25zm7.732 14.495H8.506a2.25 2.25 0 0 1-2.25-2.25V7.763h-.754a.75.75 0 0 0-.75.75V18.5c0 .414.336.75.75.75h9.986a.75.75 0 0 0 .75-.75z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">Most activity</p>
            <h4 class="mt-1 break-words font-bold text-gray-800 text-xl dark:text-white/90 sm:text-title-sm">Reda Ragab</h4>
            <p class="mt-1 text-sm text-gray-500">18 · Status updates</p>
        </div>
    </div>

    {{-- ═══ Chart: Closed vs assigned ═══ --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
    <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Closed vs assigned</h3>
    <div class="w-full min-w-0 overflow-hidden">
        <div id="closedAssignedChart" style="min-height: 295px; width: 100%;"></div>
    </div>
</div>

    {{-- ═══ Employee comparison Table ═══ --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
        <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Employee comparison</h2>
        <table class="w-full min-w-[640px]">
            <thead>
                <tr>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Employee</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Role</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Closed cases</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Avg. time to close</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Collected</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Assigned</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Active caseload</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status updates</th>
                </tr>
            </thead>
            <tbody>
                {{-- Row 1: Reda Ragab --}}
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        <p class="font-medium text-gray-800 dark:text-white/90">Reda Ragab</p>
                        <p class="text-xs text-gray-400">admin@fathalla.example</p>
                    </td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500">Super Admin</span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">2</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">84.3 days</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        EGP 37,250<span class="ms-2 text-xs text-brand-600">Top collector</span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">8</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">4</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">18</td>
                </tr>

                {{-- Row 2: Nour El-Masry --}}
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        <p class="font-medium text-gray-800 dark:text-white/90">Nour El-Masry</p>
                        <p class="text-xs text-gray-400">nour@fathalla.example</p>
                    </td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-white/80">Senior Accountant</span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        2<span class="ms-2 text-xs text-brand-600">Most cases closed</span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        6.7 days<span class="ms-2 text-xs text-brand-600">Fastest closer</span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">EGP 2,000</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">2</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">0</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">4</td>
                </tr>

                {{-- Row 3: Youssef Adel --}}
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        <p class="font-medium text-gray-800 dark:text-white/90">Youssef Adel</p>
                        <p class="text-xs text-gray-400">youssef@fathalla.example</p>
                    </td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-white/80">Junior Accountant</span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">1</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">21.1 days</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">EGP 8,000</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">1</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">0</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">2</td>
                </tr>

                {{-- Row 4: Karim Nabil --}}
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        <p class="font-medium text-gray-800 dark:text-white/90">Karim Nabil</p>
                        <p class="text-xs text-gray-400">staff@fathalla.example</p>
                    </td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-white/80">Team Lead</span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">0</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">—</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">EGP 4,500</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">4</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">4</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">7</td>
                </tr>
            </tbody>
        </table>
        <p class="mt-4 text-xs text-gray-400">
            Closed cases are credited to the admin who marked the service completed. Collections are credited to whoever recorded the payment.
        </p>
    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', async () => {
    const { default: ApexCharts } = await window.loadApexCharts();

    new ApexCharts(document.querySelector("#closedAssignedChart"), {
        series: [
            { name: 'Closed cases', data: [2, 2, 1, 0] },
            { name: 'Assigned',     data: [8, 2, 1, 4] },
        ],
        chart: {
            type: 'bar',
            height: 320,
            width: '100%',
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
            categories: ['Reda Ragab', 'Nour El-Masry', 'Youssef Adel', 'Karim Nabil'],
        },
        yaxis: {
            min: 0,
            max: 8,
        },
        legend: { position: 'top', horizontalAlign: 'left' },
        grid: { borderColor: '#e0e0e0' },
    }).render();
});
</script>
@endpush