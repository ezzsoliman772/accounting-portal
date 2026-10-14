@extends('layouts.app')

@section('title', 'Clients · Fathalla & Co.')

@section('content')

<div class="space-y-6"
     x-data="clientsPage()"
     x-cloak>

    {{-- ═══ Page Header ═══ --}}
    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Clients</h1>
        </div>
        <button x-on:click="openCreate()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300"
                type="button">
            New client
        </button>
    </div>

    {{-- ═══ Filters ═══ --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 grid grid-cols-1 gap-3 md:grid-cols-4">
        {{-- Search --}}
        <input type="text"
               x-model="filters.search"
               placeholder="Search"
               class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">

        {{-- Status filter --}}
        <select x-model="filters.status"
                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            <option value="all">All</option>
            <option value="active">Active</option>
            <option value="deactivated">Deactivated</option>
        </select>

        {{-- Type filter --}}
        <select x-model="filters.type"
                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
            <option value="all">All</option>
            <option value="business">Business</option>
            <option value="individual">Individual</option>
        </select>

        {{-- Empty grid cell for alignment --}}
        <div></div>
    </div>

    {{-- ═══ Clients Table ═══ --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
        <table class="w-full min-w-[640px]">
            <thead>
                <tr>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Name</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Type</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Email</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Phone</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Services</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Status</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Actions</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $clients = [
                        [
                            'id'            => 'cli_001',
                            'name'          => 'Nile Trading Co.',
                            'arabic_name'   => 'شركة النيل للتجارة',
                            'type'          => 'Business',
                            'type_key'      => 'business',
                            'email'         => 'info@niletrading.example',
                            'phone'         => '+201001234567',
                            'cr_number'     => 'CR-1001',
                            'services'      => 6,
                            'status'        => 'active',
                            'notes'         => '',
                            'arabic_notes'  => '',
                        ],
                        [
                            'id'            => 'cli_002',
                            'name'          => 'Alexandria Textiles SAE',
                            'arabic_name'   => 'الإسكندرية للمنسوجات',
                            'type'          => 'Business',
                            'type_key'      => 'business',
                            'email'         => 'accounts@alxtextiles.example',
                            'phone'         => '+201002223334',
                            'cr_number'     => 'CR-1002',
                            'services'      => 3,
                            'status'        => 'active',
                            'notes'         => '',
                            'arabic_notes'  => '',
                        ],
                        [
                            'id'            => 'cli_003',
                            'name'          => 'Cairo Medical Center',
                            'arabic_name'   => 'مركز القاهرة الطبي',
                            'type'          => 'Business',
                            'type_key'      => 'business',
                            'email'         => 'finance@cairomed.example',
                            'phone'         => '+201003334445',
                            'cr_number'     => 'CR-1003',
                            'services'      => 3,
                            'status'        => 'active',
                            'notes'         => '',
                            'arabic_notes'  => '',
                        ],
                        [
                            'id'            => 'cli_004',
                            'name'          => 'Ahmed Hassan',
                            'arabic_name'   => 'أحمد حسن',
                            'type'          => 'Individual',
                            'type_key'      => 'individual',
                            'email'         => 'ahmed.hassan@example.com',
                            'phone'         => '+201004445556',
                            'cr_number'     => 'NID-29012345678',
                            'services'      => 2,
                            'status'        => 'active',
                            'notes'         => '',
                            'arabic_notes'  => '',
                        ],
                        [
                            'id'            => 'cli_005',
                            'name'          => 'Old Valley Trading',
                            'arabic_name'   => 'وادي القدام للتجارة',
                            'type'          => 'Business',
                            'type_key'      => 'business',
                            'email'         => 'ops@oldvalley.example',
                            'phone'         => '+201005556667',
                            'cr_number'     => 'CR-1005',
                            'services'      => 1,
                            'status'        => 'deactivated',
                            'notes'         => '',
                            'arabic_notes'  => '',
                        ],
                    ];
                @endphp

                @foreach($clients as $client)
                    <tr>
                        <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                            <a href="{{ route('clients.show', $client['id']) }}"
                               class="font-medium text-brand-600 hover:underline">
                                {{ $client['name'] }}
                            </a>
                        </td>
                        <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                            {{ $client['type'] }}
                        </td>
                        <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                            {{ $client['email'] }}
                        </td>
                        <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                            {{ $client['phone'] }}
                        </td>
                        <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                            {{ $client['services'] }}
                        </td>
                        <td class="px-3 py-3 text-theme-sm sm:px-4">
                            @if($client['status'] === 'active')
                                <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-success-50 text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-white/80">
                                    Deactivated
                                </span>
                            @endif
                        </td>
                        <td class="px-3 py-3 text-theme-sm sm:px-4">
                            <div class="flex flex-wrap gap-2">
                               <a href="{{ route('clients.show', $client['id']) }}"
                                  class="text-brand-600 text-sm hover:underline">
                                    View
                                </a>

                                <button x-on:click="openEdit(@js($client))"
                                        class="text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                                    Edit
                                </button>

                                @if($client['status'] === 'active')
                                    <button x-on:click="toggleStatus(@js($client))"
                                            class="text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                                        Deactivate
                                    </button>
                                @else
                                    <button x-on:click="toggleStatus(@js($client))"
                                            class="text-sm text-brand-600 hover:underline">
                                        Activate
                                    </button>
                                @endif

                                <button x-on:click="resetCredentials(@js($client))"
                                        class="text-sm text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200">
                                    Reset credentials
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- ═══════════════════════════════════════════════════════
         MODAL — Create & Edit Client
         ═══════════════════════════════════════════════════════ --}}
    <div x-show="isOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-99999 flex items-end justify-center overflow-y-auto p-3 modal sm:items-center sm:p-4"
         style="display: none;">

        {{-- Backdrop --}}
        <div x-on:click="close()"
             class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>

        {{-- Modal Content --}}
        <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative w-full max-h-[90dvh] overflow-y-auto rounded-3xl bg-white dark:bg-gray-900 max-w-[640px] p-5 sm:p-6 lg:p-8">

            {{-- Close button --}}
            <button x-on:click="close()"
                    class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white rtl:right-auto rtl:left-3 sm:right-6 sm:top-6 sm:h-11 sm:w-11 rtl:sm:right-auto rtl:sm:left-6">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill="currentColor"></path>
                </svg>
            </button>

            {{-- Form --}}
            <div>
                <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white/90"
                    x-text="isEditMode ? 'Edit client' : 'New client'"></h3>

                <form x-on:submit.prevent="save()"
                      class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    {{-- Business / Client name --}}
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Business / client name
                        </label>
                        <input type="text"
                               x-model="form.name"
                               required
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Arabic name --}}
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Arabic name
                        </label>
                        <input type="text"
                               x-model="form.arabic_name"
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Client type --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Client type
                        </label>
                        <select x-model="form.type"
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                            <option value="business">Business</option>
                            <option value="individual">Individual</option>
                        </select>
                    </div>

                    {{-- CR / National ID --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            CR / National ID
                        </label>
                        <input type="text"
                               x-model="form.cr_number"
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Email
                        </label>
                        <input type="email"
                               x-model="form.email"
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Phone
                        </label>
                        <input type="text"
                               x-model="form.phone"
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Notes --}}
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Notes
                        </label>
                        <textarea x-model="form.notes"
                                  rows="4"
                                  placeholder="Enter your message"
                                  class="w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"></textarea>
                    </div>

                    {{-- Arabic notes --}}
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Arabic notes
                        </label>
                        <textarea x-model="form.arabic_notes"
                                  rows="4"
                                  placeholder="Enter your message"
                                  class="w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"></textarea>
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-wrap justify-end gap-3 sm:col-span-2">
                        <button type="button"
                                x-on:click="close()"
                                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
                            Cancel
                        </button>
                        <button type="submit"
                                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300">
                            Save client
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
function clientsPage() {
    return {
        isOpen: false,
        isEditMode: false,

        filters: {
            search: '',
            status: 'all',
            type: 'all',
        },

        form: {
            id: '',
            name: '',
            arabic_name: '',
            type: 'business',
            cr_number: '',
            email: '',
            phone: '',
            notes: '',
            arabic_notes: '',
        },

        openCreate() {
            this.isEditMode = false;
            this.form = {
                id: '',
                name: '',
                arabic_name: '',
                type: 'business',
                cr_number: '',
                email: '',
                phone: '',
                notes: '',
                arabic_notes: '',
            };
            this.isOpen = true;
        },

        openEdit(client) {
            this.isEditMode = true;
            this.form = {
                id: client.id,
                name: client.name,
                arabic_name: client.arabic_name || '',
                type: client.type_key || 'business',
                cr_number: client.cr_number || '',
                email: client.email,
                phone: client.phone || '',
                notes: client.notes || '',
                arabic_notes: client.arabic_notes || '',
            };
            this.isOpen = true;
        },

        close() {
            this.isOpen = false;
            setTimeout(() => {
                this.form = {
                    id: '',
                    name: '',
                    arabic_name: '',
                    type: 'business',
                    cr_number: '',
                    email: '',
                    phone: '',
                    notes: '',
                    arabic_notes: '',
                };
                this.isEditMode = false;
            }, 200);
        },

        toggleStatus(client) {
            const newStatus = client.status === 'active' ? 'deactivated' : 'active';
            console.log(`Toggle status for ${client.name} → ${newStatus}`);
            // TODO: fetch PATCH
        },

        resetCredentials(client) {
            console.log(`Reset credentials for ${client.name}`);
            // TODO: fetch POST
        },

        save() {
            console.log('Saving client:', {
                mode: this.isEditMode ? 'edit' : 'create',
                data: this.form,
            });
            // TODO: fetch POST/PUT
            this.close();
        },
    };
}
</script>
@endpush