@extends('layouts.app')

@section('content')
<div class="space-y-6" x-data="documentsPage">

    {{-- ═══ Header ═══ --}}
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Documents</h1>

    {{-- ═══ Tabs ═══ --}}
    @include('documents._tabs')

    {{-- ═══ Content حسب الـ tab النشط ═══ --}}
    <div class="space-y-4">

        {{-- Filter (يظهر بس في requests) --}}
        <div x-show="activeTab === 'requests'">
            <select x-model="statusFilter"
                    class="h-11 w-full max-w-xs rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                @foreach($statusOptions as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>

        {{-- Document requests table --}}
        <div x-show="activeTab === 'requests'">
            @include('documents._requests_table', ['documentRequests' => $documentRequests])
        </div>

        {{-- Uploaded files table --}}
        <div x-show="activeTab === 'files'" x-cloak>
            @include('documents._files_table', ['uploadedFiles' => $uploadedFiles])
        </div>
    </div>
</div>
@endsection