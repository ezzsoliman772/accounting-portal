{{-- Assign Service Modal --}}
<div x-show="isAssignOpen" x-cloak
     class="fixed inset-0 z-99999 flex items-end justify-center overflow-y-auto p-3 sm:items-center sm:p-4">
    
    {{-- Overlay --}}
    <div class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"
         x-on:click="closeAssign()"></div>

    {{-- Modal Box --}}
    <div class="relative w-full max-h-[90dvh] overflow-y-auto rounded-3xl bg-white dark:bg-gray-900 max-w-[680px] p-5 sm:p-6 lg:p-8">
        
        {{-- Close Button --}}
        <button type="button" x-on:click="closeAssign()"
                class="absolute right-3 top-3 z-10 flex h-9 w-9 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white rtl:right-auto rtl:left-3 sm:right-6 sm:top-6 sm:h-11 sm:w-11 rtl:sm:right-auto rtl:sm:left-6">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill="currentColor"/>
            </svg>
        </button>

        <div>
            <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90">Assign service</h3>

            <form x-on:submit.prevent="assignService()" class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                {{-- Client (full width) --}}
                <div class="sm:col-span-2">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Client</label>
                    <select x-model="assignForm.client_id" required
                            class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        <option value="">Select client</option>
                        <option value="cli_001">Nile Trading Co.</option>
                        <option value="cli_002">Alexandria Textiles SAE</option>
                        <option value="cli_003">Cairo Medical Center</option>
                        <option value="cli_004">Ahmed Hassan</option>
                        <option value="cli_005">Old Valley Trading</option>
                    </select>
                </div>

                {{-- Toggle: From catalog / Custom one-off --}}
                <div class="flex flex-wrap gap-3 sm:col-span-2">
                    <button type="button" x-on:click="setAssignMode('catalog')"
                            :class="assignMode === 'catalog'
                                ? 'bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600'
                                : 'bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700'"
                            class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm">
                        From catalog
                    </button>
                    <button type="button" x-on:click="setAssignMode('custom')"
                            :class="assignMode === 'custom'
                                ? 'bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600'
                                : 'bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700'"
                            class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm">
                        Custom one-off
                    </button>
                </div>

                {{-- Catalog dropdown — يظهر فقط في وضع catalog --}}
                <div x-show="assignMode === 'catalog'" class="sm:col-span-2">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Catalog</label>
                    <select x-model="assignForm.catalog_id" x-on:change="onCatalogChange()"
                            class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        <option value="">Select catalog item</option>
                        <template x-for="cat in catalogs" :key="cat.id">
                            <option :value="cat.id" x-text="cat.name"></option>
                        </template>
                    </select>
                </div>

                {{-- Service name --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Service name</label>
                    <input type="text" x-model="assignForm.service_name" required
                           class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                </div>

                {{-- Arabic service name --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Arabic service name</label>
                    <input type="text" x-model="assignForm.service_name_ar" dir="rtl"
                           class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                </div>

                {{-- Cost --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Cost</label>
                    <input type="number" x-model="assignForm.cost"
                           class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                </div>

                {{-- Frequency --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Frequency</label>
                    <select x-model="assignForm.frequency"
                            class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        <option value="one-time">One-time</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="annual">Annual</option>
                    </select>
                </div>

                {{-- Start date --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Start date</label>
                    <input type="date" x-model="assignForm.start_date"
                           class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                </div>

                {{-- Due date --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Due date</label>
                    <input type="date" x-model="assignForm.due_date" required
                           class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                </div>

                {{-- Assigned to (full width) --}}
                <div class="sm:col-span-2">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Assigned to</label>
                    <select x-model="assignForm.assigned_to" required
                            class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        <option value="">Select team member</option>
                        <option value="adm_001">Reda Ragab · Super Admin</option>
                        <option value="adm_002">Karim Nabil · Team Lead</option>
                        <option value="adm_003">Nour El-Masry · Senior Accountant</option>
                        <option value="adm_004">Youssef Adel · Junior Accountant</option>
                    </select>
                </div>

                {{-- Actions --}}
                <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                    <button type="button" x-on:click="closeAssign()"
                            class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
                        Cancel
                    </button>
                    <button type="submit"
                            class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600">
                        Assign
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>