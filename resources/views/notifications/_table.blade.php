<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
    <table class="w-full min-w-[900px]">
        <thead>
            <tr>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Date</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Type</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Related service</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Delivery</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="notif in filteredNotifications" :key="notif.id">
                <tr>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4" x-text="notif.date"></td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4" x-text="notif.client"></td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4" x-text="notif.type"></td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <a :href="'/services/' + notif.service_id"
                           class="text-brand-600 hover:underline"
                           x-text="notif.message"></a>
                    </td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs"
                              :class="notif.delivery === 'Sent'
                                  ? 'bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500'
                                  : 'bg-error-50 text-error-600 dark:bg-error-500/15 dark:text-error-500'"
                              x-text="notif.delivery"></span>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4" x-text="notif.status"></td>
                </tr>
            </template>
        </tbody>
    </table>
</div>

{{-- تمرير البيانات لـ Alpine --}}
<script>
window.notificationsData = @json($notifications);
</script>