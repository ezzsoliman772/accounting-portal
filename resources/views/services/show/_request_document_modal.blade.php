<div x-show="isRequestDocOpen" x-cloak
     class="fixed inset-0 z-99999 flex items-end justify-center overflow-y-auto p-3 sm:items-center sm:p-4">
    
    <div class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"
         x-on:click="closeRequestDoc()"></div>

    <div class="relative w-full max-h-[90dvh] overflow-y-auto rounded-3xl bg-white dark:bg-gray-900 max-w-[520px] p-5 sm:p-6 lg:p-8">
        
        <button type="button" x-on:click="closeRequestDoc()"
                class="absolute right-3 top-3 z-10 flex h-9 w-9 items-center justify-center rounded-full bg-gray-100 text-gray-400 hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 rtl:right-auto rtl:left-3 sm:right-6 sm:top-6 sm:h-11 sm:w-11 rtl:sm:right-auto rtl:sm:left-6">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill="currentColor"/>
            </svg>
        </button>

        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90">Request document</h3>

        <form x-on:submit.prevent="saveRequestDoc()" class="space-y-4">
            <div>
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Document name</label>
                <input type="text" x-model="requestDocForm.name" required
                       class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            </div>

            <div>
                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Arabic document name</label>
                <input type="text" x-model="requestDocForm.name_ar" dir="rtl"
                       class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            </div>

            <div class="flex flex-wrap justify-end gap-3 pt-2">
                <button type="button" x-on:click="closeRequestDoc()"
                        class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
                    Cancel
                </button>
                <button type="submit"
                        class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600">
                    Request document
                </button>
            </div>
        </form>
    </div>
</div>