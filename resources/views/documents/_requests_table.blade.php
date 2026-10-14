<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
    <table class="w-full min-w-[900px]">
        <thead>
            <tr>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Document name</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Related service</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Requested at</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="doc in filteredRequests" :key="doc.id">
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4" x-text="doc.name"></td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4" x-text="doc.client_name"></td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <a :href="'/services/' + doc.service_id"
                           class="text-brand-600 hover:underline"
                           x-text="doc.service_name"></a>
                    </td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-warning-50 text-warning-600 dark:bg-warning-500/15 dark:text-orange-400"
                              x-text="doc.status"></span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4" x-text="doc.requested_at"></td>
                </tr>
            </template>
        </tbody>
    </table>
</div>

{{-- تمرير البيانات للـ Alpine --}}
<script>
window.documentRequestsData = @json($documentRequests);
</script>