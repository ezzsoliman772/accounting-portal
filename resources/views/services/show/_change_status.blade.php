<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 grid grid-cols-1 gap-4 lg:grid-cols-2">

    {{-- ═══ Change Status ═══ --}}
    <div>
        <h2 class="mb-3 text-lg font-semibold text-gray-800 dark:text-white/90">Change status</h2>

        <div class="flex flex-wrap gap-3">

            {{-- Dropdown --}}
            <div class="relative flex-1 min-w-[200px]">

                {{-- Trigger Button --}}
                <button type="button"
                        x-on:click="statusOpen = !statusOpen"
                        x-on:click.outside="statusOpen = false"
                        :class="statusOpen ? 'border-brand-300 ring-3 ring-brand-500/10' : 'border-gray-300'"
                        class="h-11 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-start text-gray-800 shadow-theme-xs focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 flex items-center justify-between transition">
                    <span x-text="newStatus ? statusLabels[newStatus] : '{{ $service->status }}'"
                          :class="!newStatus ? 'text-gray-800 dark:text-white/90' : 'text-gray-800 dark:text-white/90'"></span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform"
                         :class="statusOpen ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- Dropdown List --}}
                <div x-show="statusOpen" x-cloak
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-1"
                     class="absolute z-50 mt-1 w-full rounded-lg border border-gray-200 bg-white shadow-lg dark:border-gray-700 dark:bg-gray-800 overflow-hidden">

                    <template x-for="(label, key) in statusLabels" :key="key">
                        <button type="button"
                                x-on:click="newStatus = key; statusOpen = false"
                                :class="newStatus === key
                                    ? 'bg-brand-50 text-brand-700 dark:bg-brand-500/15 dark:text-brand-400'
                                    : 'text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700/50'"
                                class="w-full text-start px-4 py-2.5 text-sm transition-colors flex items-center justify-between">
                            <span x-text="label"></span>
                            <svg x-show="newStatus === key"
                                 class="w-4 h-4 text-brand-600"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>
                    </template>
                </div>
            </div>

            {{-- Save Button --}}
            <button type="button" x-on:click="saveStatus()"
                    :disabled="!newStatus"
                    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300 disabled:cursor-not-allowed">
                Save
            </button>
        </div>
    </div>

    {{-- ═══ Action Buttons ═══ --}}
    <div class="flex flex-wrap gap-2 items-end">
        <button type="button" x-on:click="openRecordPayment()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
            Record payment
        </button>

        <button type="button" x-on:click="openRequestDoc()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
            Request document
        </button>

        <button type="button" x-on:click="openUpload()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
            Upload on behalf of client
        </button>

        @if($isOverdue)
            <button type="button" x-on:click="sendReminder()"
                    class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700">
                Send payment reminder
            </button>
        @endif
    </div>
</div>