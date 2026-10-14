@extends('layouts.app')

@section('title', $client['name'] . ' · Fathalla & Co.')

@section('content')

<div class="space-y-6">

    {{-- ═══ Page Header ═══ --}}
    <div class="flex flex-wrap items-start justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">{{ $client['name'] }}</h1>
            <p class="text-sm text-gray-500 mt-1">{{ $client['email'] }}</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <button type="button"
                    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                Edit
            </button>
            <button type="button"
                    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600">
                Assign service
            </button>
        </div>
    </div>

    {{-- ═══ Client Info Card ═══ --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div>
            <p class="text-xs text-gray-400">Phone</p>
            <div class="text-sm text-gray-800 dark:text-white/90">{{ $client['phone'] }}</div>
        </div>
        <div>
            <p class="text-xs text-gray-400">Client type</p>
            <div class="text-sm text-gray-800 dark:text-white/90">{{ $client['type'] }}</div>
        </div>
        <div>
            <p class="text-xs text-gray-400">CR / National ID</p>
            <div class="text-sm text-gray-800 dark:text-white/90">{{ $client['cr_number'] }}</div>
        </div>
        <div>
            <p class="text-xs text-gray-400">Status</p>
            <div class="text-sm">
                @if($client['status'] === 'active')
                    <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500">
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-white/80">
                        Deactivated
                    </span>
                @endif
            </div>
        </div>
        <div class="sm:col-span-2">
            <p class="text-xs text-gray-400">Notes</p>
            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $client['notes'] ?: '—' }}</p>
        </div>
    </div>

    {{-- ═══ Assigned Staff ═══ --}}
    <section class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Assigned staff</h2>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            @foreach($assignedStaff as $staff)
                <label class="flex items-center space-x-3 group cursor-pointer">
                    <span class="relative inline-flex w-5 h-5 items-center justify-center">
                        <input type="checkbox"
                               @checked($staff['assigned'])
                               class="peer w-5 h-5 appearance-none cursor-pointer border border-gray-300 rounded-md
                                      checked:border-transparent checked:bg-brand-500
                                      dark:border-gray-700 disabled:opacity-60">
                        <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                                    w-3.5 h-3.5 text-white pointer-events-none opacity-0
                                    peer-checked:opacity-100 transition-opacity"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </span>
                    <span class="text-sm font-medium text-gray-800 dark:text-gray-200">
                        {{ $staff['name'] }} · {{ $staff['role'] }}
                    </span>
                </label>
            @endforeach
        </div>
    </section>

    {{-- ═══ Services Table ═══ --}}
    <section class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Services</h2>
        <div class="min-w-0 overflow-x-auto">
            <table class="w-full min-w-[640px]">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Name</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Remaining</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Due date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                <a href="#" class="text-brand-600 hover:underline">{{ $service['name'] }}</a>
                            </td>
                            <td class="px-3 py-3 text-theme-sm sm:px-4">
                                @php
                                    $statusMap = [
                                        'completed' => ['bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500', 'Completed'],
                                        'overdue'   => ['bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500',         'Overdue'],
                                        'cancelled' => ['bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500',         'Cancelled'],
                                    ];
                                    $badge = $statusMap[$service['status']] ?? $statusMap['completed'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs {{ $badge[0] }}">
                                    {{ $badge[1] }}
                                </span>
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                EGP {{ number_format($service['remaining']) }}
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                {{ $service['due_date'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- ═══ Payment History ═══ --}}
    <section class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Payment history</h2>
        <div class="min-w-0 overflow-x-auto">
            <table class="w-full min-w-[640px]">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Date</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Amount</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Method</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Attachment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                {{ $payment['date'] }}
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                EGP {{ number_format($payment['amount']) }}
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                {{ $payment['method'] }}
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                {{ $payment['attachment'] ?? '—' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- ═══ Uploaded Files ═══ --}}
    <section class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Uploaded files</h2>
        <div class="min-w-0 overflow-x-auto">
            <table class="w-full min-w-[640px]">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Filename</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Uploaded by</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Uploaded at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($uploadedFiles as $file)
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                {{ $file['filename'] }}
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                {{ $file['uploaded_by'] }}
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                {{ $file['uploaded_at'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

</div>

@endsection