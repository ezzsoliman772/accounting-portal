@extends('layouts.app')

@section('title', 'Team · Fathalla & Co.')

@section('content')

<div class="space-y-6"
     x-data="teamPage()"
     x-cloak>

    {{-- ═══ Page Header ═══ --}}
    <div class="flex flex-wrap items-start justify-between gap-3">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">Team</h1>
            <p class="mt-1 text-sm text-gray-500">Assign roles and clients. Staff only see the cases they are given.</p>
        </div>
        <button x-on:click="openCreate()"
                class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-5 py-3.5 text-sm bg-brand-500 text-white shadow-theme-xs hover:bg-brand-600 disabled:bg-brand-300"
                type="button">
            New staff
        </button>
    </div>

    {{-- ═══ Team Table ═══ --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6 min-w-0 overflow-x-auto">
        <table class="w-full min-w-[640px]">
            <thead>
                <tr>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Employee</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Role</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Assigned clients</th>
                    <th class="whitespace-nowrap px-3 py-3 text-start text-theme-xs font-medium text-gray-500 dark:text-gray-400 sm:px-4">Actions</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $staffMembers = [
                        [
                            'id' => 1,
                            'name' => 'Karim Nabil',
                            'arabic_name' => 'كريم نبيل',
                            'email' => 'staff@fathalla.example',
                            'phone' => '+20100110002',
                            'role' => 'Team Lead',
                            'role_key' => 'team_lead',
                            'assigned' => ['Nile Trading Co.'],
                        ],
                        [
                            'id' => 2,
                            'name' => 'Nour El-Masry',
                            'arabic_name' => 'نور المصري',
                            'email' => 'nour@fathalla.example',
                            'phone' => '+20100110003',
                            'role' => 'Senior Accountant',
                            'role_key' => 'senior_accountant',
                            'assigned' => ['Alexandria Textiles SAE', 'Ahmed Hassan'],
                        ],
                        [
                            'id' => 3,
                            'name' => 'Youssef Adel',
                            'arabic_name' => 'يوسف عادل',
                            'email' => 'youssef@fathalla.example',
                            'phone' => '+20100110004',
                            'role' => 'Junior Accountant',
                            'role_key' => 'junior_accountant',
                            'assigned' => ['Cairo Medical Center'],
                        ],
                    ];
                @endphp

                @foreach($staffMembers as $staff)
                    <tr>
                        <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                            <p class="font-medium text-gray-800 dark:text-white/90">{{ $staff['name'] }}</p>
                            <p class="text-xs text-gray-400">{{ $staff['email'] }}</p>
                        </td>
                        <td class="px-3 py-3 text-theme-sm sm:px-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 justify-center gap-1 rounded-full font-medium text-theme-xs bg-gray-100 text-gray-700 dark:bg-white/5 dark:text-white/80">
                                {{ $staff['role'] }}
                            </span>
                        </td>
                        <td class="px-3 py-3 text-theme-sm text-gray-700 dark:text-gray-300 sm:px-4">
                            {{ implode(', ', $staff['assigned']) }}
                        </td>
                        <td class="px-3 py-3 text-theme-sm sm:px-4">
                            <button x-on:click="openEdit(@js($staff))"
                                    class="text-sm text-brand-600 hover:underline">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- ═══════════════════════════════════════════════════════
         MODAL — Create & Edit (one unified modal)
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
                    x-text="isEditMode ? 'Edit' : 'New staff'"></h3>

                <form x-on:submit.prevent="save()"
                      class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    {{-- Name --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Name
                        </label>
                        <input type="text"
                               x-model="form.name"
                               required
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Arabic name --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Arabic name
                        </label>
                        <input type="text"
                               x-model="form.arabic_name"
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Email
                        </label>
                        <input type="email"
                               x-model="form.email"
                               required
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Phone
                        </label>
                        <input type="text"
                               x-model="form.phone"
                               required
                               class="h-11 w-full rounded-lg border appearance-none px-4 py-2.5 text-sm shadow-theme-xs placeholder:text-gray-400 focus:outline-hidden focus:ring-3 bg-transparent text-gray-800 border-gray-300 focus:border-brand-300 focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                    </div>

                    {{-- Role --}}
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Role
                        </label>
                        <select x-model="form.role"
                                class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                            <option value="team_lead">Team Lead</option>
                            <option value="senior_accountant">Senior Accountant</option>
                            <option value="junior_accountant">Junior Accountant</option>
                        </select>
                    </div>

                    {{-- Assigned clients --}}
                    <div class="sm:col-span-2">
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Assigned clients
                        </label>
                        <div class="mt-2 grid max-h-56 grid-cols-1 gap-2 overflow-y-auto rounded-lg border border-gray-200 p-3 dark:border-gray-800 sm:grid-cols-2">

                            @php
                                $clients = [
                                    'Nile Trading Co.',
                                    'Alexandria Textiles SAE',
                                    'Cairo Medical Center',
                                    'Ahmed Hassan',
                                    'Old Valley Trading',
                                ];
                            @endphp

                            @foreach($clients as $client)
                                <label class="flex items-center space-x-3 group cursor-pointer">
                                    <span class="relative inline-flex w-5 h-5 items-center justify-center">
                                        <input type="checkbox"
                                            value="{{ $client }}"
                                            x-model="form.assigned"
                                            class="peer w-5 h-5 appearance-none cursor-pointer border border-gray-300 rounded-md
                                                    checked:border-transparent checked:bg-brand-500
                                                    dark:border-gray-700 disabled:opacity-60">
                                            <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                                                    w-3.5 h-3.5 text-white pointer-events-none opacity-0
                                                    peer-checked:opacity-100 transition-opacity"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </span>
                                    <span class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                        {{ $client }}
                                    </span>
                                </label>
                            @endforeach

                        </div>
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
                            Save staff
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
function teamPage() {
    return {
        isOpen: false,
        isEditMode: false,

        form: {
            id: null,
            name: '',
            arabic_name: '',
            email: '',
            phone: '',
            role: 'junior_accountant',
            assigned: [],
        },

        openCreate() {
            this.isEditMode = false;
            this.form = {
                id: null,
                name: '',
                arabic_name: '',
                email: '',
                phone: '',
                role: 'junior_accountant',
                assigned: [],
            };
            this.isOpen = true;
        },

        openEdit(staff) {
            this.isEditMode = true;
            this.form = {
                id: staff.id,
                name: staff.name,
                arabic_name: staff.arabic_name || '',
                email: staff.email,
                phone: staff.phone || '',
                role: staff.role_key || 'junior_accountant',
                assigned: [...(staff.assigned || [])],
            };
            this.isOpen = true;
        },

        close() {
            this.isOpen = false;
            // Reset form بعد ما الـ transition تخلص
            setTimeout(() => {
                this.form = {
                    id: null,
                    name: '',
                    arabic_name: '',
                    email: '',
                    phone: '',
                    role: 'junior_accountant',
                    assigned: [],
                };
                this.isEditMode = false;
            }, 200);
        },

        save() {
            // Static — بعدين نبعت للـ API
            console.log('Saving staff:', {
                mode: this.isEditMode ? 'edit' : 'create',
                data: this.form,
            });

            // TODO: 
            //  fetch POST/PUT
            // fetch(this.isEditMode ? `/team/${this.form.id}` : '/team', {
            //     method: this.isEditMode ? 'PUT' : 'POST',
            //     headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '...' },
            //     body: JSON.stringify(this.form),
            // });

            this.close();
        },
    };
}
</script>
@endpush