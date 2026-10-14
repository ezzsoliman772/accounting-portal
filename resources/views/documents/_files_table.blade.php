<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
    <table class="w-full min-w-[900px]">
        <thead>
            <tr>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Filename</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Client</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Related service</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Uploaded by</th>
                <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Uploaded at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uploadedFiles as $file)
                <tr>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <a href="#" class="text-brand-600 hover:underline">{{ $file->filename }}</a>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $file->client_name }}</td>
                    <td class="px-3 py-3 text-theme-sm sm:px-4">
                        <a href="/services/{{ $file->service_id }}" class="text-brand-600 hover:underline">{{ $file->service_name }}</a>
                    </td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $file->uploaded_by }}</td>
                    <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">{{ $file->uploaded_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>