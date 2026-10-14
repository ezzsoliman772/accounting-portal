@extends('layouts.app')

@section('content')
<div class="space-y-6" x-data="paymentsPage">

    {{-- Header --}}
    <div class="flex flex-wrap items-center justify-between gap-3">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Payments</h1>
        <button type="button" x-on:click="openCreate()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600">
            Record payment
        </button>
    </div>

    {{-- KPI Cards --}}
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <p class="text-sm text-gray-500">Invoiced</p>
            <p class="mt-2 text-xl font-semibold text-gray-800 dark:text-white/90">EGP {{ number_format($totals['invoiced']) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <p class="text-sm text-gray-500">Collected</p>
            <p class="mt-2 text-xl font-semibold text-gray-800 dark:text-white/90">EGP {{ number_format($totals['collected']) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <p class="text-sm text-gray-500">Outstanding</p>
            <p class="mt-2 text-xl font-semibold text-gray-800 dark:text-white/90">EGP {{ number_format($totals['outstanding']) }}</p>
        </div>
    </div>

    {{-- Filters --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 grid grid-cols-1 gap-3 md:grid-cols-3">
        <select class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            <option value="all">All Clients</option>
            <option value="cli_001">Nile Trading Co.</option>
            <option value="cli_002">Alexandria Textiles SAE</option>
            <option value="cli_003">Cairo Medical Center</option>
            <option value="cli_004">Ahmed Hassan</option>
            <option value="cli_005">Old Valley Trading</option>
        </select>
        <input type="date" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
        <input type="date" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
    </div>

    {{-- Table --}}
    @include('payments._table', ['payments' => $payments])

    {{-- Modal --}}
    @include('payments._modal')
</div>
@endsection