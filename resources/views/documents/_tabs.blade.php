<div class="flex flex-wrap gap-2">
    <button type="button"
            x-on:click="activeTab = 'requests'"
            :class="activeTab === 'requests'
                ? 'bg-brand-500 text-white'
                : 'bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-gray-300'"
            class="rounded-lg px-4 py-2 text-sm font-medium transition-colors">
        Document requests
    </button>

    <button type="button"
            x-on:click="activeTab = 'files'"
            :class="activeTab === 'files'
                ? 'bg-brand-500 text-white'
                : 'bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-gray-300'"
            class="rounded-lg px-4 py-2 text-sm font-medium transition-colors">
        Uploaded files
    </button>
</div>