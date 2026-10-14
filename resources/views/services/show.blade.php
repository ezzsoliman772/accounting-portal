@extends('layouts.app')

@section('content')
<div class="space-y-6" x-data="serviceShowPage">

    {{-- ═══ Header ═══ --}}
    <div class="flex flex-wrap items-start justify-between gap-3">
        <div>
            <a href="{{ route('services.index') }}" class="text-sm text-brand-600 hover:underline">← Services</a>
            <h1 class="mt-2 text-2xl font-semibold text-gray-800 dark:text-white/90">{{ $service->name }}</h1>
            <p class="text-sm text-gray-500">
                <a href="/clients/{{ $service->client_id }}" class="hover:underline">{{ $service->client_name }}</a>
                · {{ $service->category }}
            </p>
        </div>
        
        @php
            $statusClass = match($service->status) {
                'Completed' => 'bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500',
                'Overdue', 'Cancelled' => 'bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500',
                'In Progress' => 'bg-blue-light-50 text-blue-light-500 dark:bg-blue-light-500/15 dark:text-blue-light-500',
                default => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400',
                };
                @endphp
        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs {{ $statusClass }}">
            {{ $service->status }}
        </span>
    </div>
    
    {{-- ═══ KPI Cards ═══ --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <p class="text-sm text-gray-500">Total</p>
            <p class="mt-2 text-lg font-semibold text-gray-800 dark:text-white/90">EGP {{ number_format($service->total) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <p class="text-sm text-gray-500">Paid</p>
            <p class="mt-2 text-lg font-semibold text-gray-800 dark:text-white/90">EGP {{ number_format($service->paid) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <p class="text-sm text-gray-500">Remaining</p>
            <p class="mt-2 text-lg font-semibold text-gray-800 dark:text-white/90">EGP {{ number_format($service->remaining) }}</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
            <p class="text-sm text-gray-500">Due date</p>
            <p class="mt-2 text-lg font-semibold text-gray-800 dark:text-white/90">{{ $service->due_date }}</p>
        </div>
    </div>
    @include('services.show._change_status')
    
    {{-- ═══ Document requests ═══ --}}
    <section class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Document requests</h2>
        <div class="min-w-0 overflow-x-auto">
            <table class="w-full min-w-[640px]">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Document name</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Requested at</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documentRequests as $req)
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $req->name }}</td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $req->status }}</td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $req->requested_at }}</td>
                        </tr>
                    @empty
                        {{-- فاضي زي الـ Screenshot --}}
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- ═══ Uploaded files + Required documents ═══ --}}
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
                                <a href="#" class="text-brand-600 hover:underline">{{ $file->filename }}</a>
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $file->uploaded_by }}</td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $file->uploaded_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3 class="mt-6 mb-2 text-sm font-medium text-gray-500">Required documents</h3>
        <ul class="list-disc ps-5 text-sm text-gray-600 dark:text-gray-400">
            @foreach($requiredDocuments as $doc)
                <li>{{ $doc }}</li>
            @endforeach
        </ul>
    </section>

    {{-- ═══ Status history ═══ --}}
    <section class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <h2 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white/90">Status history</h2>
        <ol class="space-y-3">
            @foreach($statusHistory as $entry)
                <li class="border-s-2 border-brand-200 ps-4">
                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                        {{ $entry->from }} → {{ $entry->to }}
                    </p>
                    <p class="text-xs text-gray-500">{{ $entry->at }} · Changed by {{ $entry->by }}</p>
                </li>
            @endforeach
        </ol>
    </section>

    {{-- ═══ Payment history ═══ --}}
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
                        <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Created by</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentHistory as $pay)
                        <tr>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $pay->date }}</td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">EGP {{ number_format($pay->amount) }}</td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $pay->method }}</td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                                @if($pay->attachment)
                                    <a href="#" class="text-brand-600 hover:underline">{{ $pay->attachment }}</a>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $pay->created_by }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    {{-- ═══ Reassign case ═══ --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 flex flex-col gap-3 sm:flex-row sm:items-center">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-400 mb-0 shrink-0">Reassign case</label>
        <select class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            @foreach($teamMembers as $member)
                <option value="{{ $member->id }}" @selected($service->assigned_to === $member->id)>
                    {{ $member->label }}
                </option>
            @endforeach
        </select>
    </div>

@include('services.show._record_payment_modal')
@include('services.show._request_document_modal')
@include('services.show._upload_modal')

</div>
@endsection