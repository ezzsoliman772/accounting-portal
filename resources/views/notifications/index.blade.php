@extends('layouts.app')

@section('content')
<div class="space-y-6" x-data="notificationsPage">

    {{-- ═══ Header ═══ --}}
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Notifications</h1>

    {{-- ═══ Send payment reminder card ═══ --}}
    @include('notifications._send_reminder')

    {{-- ═══ Filter ═══ --}}
    <div>
        <select x-model="typeFilter"
                class="h-11 w-full max-w-xs rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            @foreach($typeOptions as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>

    {{-- ═══ Table ═══ --}}
    @include('notifications._table', ['notifications' => $notifications])

</div>
@endsection