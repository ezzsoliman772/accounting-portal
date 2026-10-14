<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
    <table class="w-full min-w-[640px]">
        <thead>
            <tr>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Name</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Remaining</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Due date</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Assigned to</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        <a href="/services/{{ $service->id }}" class="text-brand-600 hover:underline">{{ $service->name }}</a>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $service->client }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        @php
                            $statusClasses = match($service->status) {
                                'Completed' => 'bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500',
                                'Overdue', 'Cancelled' => 'bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500',
                                'In Progress' => 'bg-blue-light-50 text-blue-light-500 dark:bg-blue-light-500/15 dark:text-blue-light-500',
                                default => 'bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-400',
                            };
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs {{ $statusClasses }}">
                            {{ $service->status }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">EGP {{ number_format($service->remaining) }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $service->due_date }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $service->assigned_to }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>