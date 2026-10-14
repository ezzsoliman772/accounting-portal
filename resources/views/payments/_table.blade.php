<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
    <table class="w-full min-w-[900px]">
        <thead>
            <tr>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Date</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Related service</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Amount</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Method</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Attachment</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Created by</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $payment->date }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $payment->client }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        <a href="/services/{{ $payment->service_id }}" class="text-brand-600 hover:underline">{{ $payment->service_name }}</a>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">EGP {{ number_format($payment->amount) }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $payment->method }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                        @if($payment->attachment)
                            <a href="#" class="text-brand-600 hover:underline">{{ $payment->attachment }}</a>
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $payment->created_by }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>