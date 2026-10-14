<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 space-y-4">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-white/90">Send payment reminder</h2>

    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
        <select x-model="reminderService"
                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            @foreach($overdueServices as $svc)
                <option value="{{ $svc->id }}">{{ $svc->label }}</option>
            @endforeach
        </select>

        <button type="button"
                x-on:click="sendReminder()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition w-full md:w-auto px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
            Send payment reminder
        </button>
    </div>
</div>