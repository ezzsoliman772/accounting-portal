{{-- Sidebar --}}
<aside
    x-on:mouseenter="sidebarHovered = true"
    x-on:mouseleave="sidebarHovered = false"
    class="fixed mt-16 flex flex-col lg:mt-0 top-0 px-5 start-0 bg-white dark:bg-gray-900 dark:border-gray-800 text-gray-900 h-screen transition-all duration-300 ease-in-out z-50 border-e border-gray-200"
    :class="{
        'translate-x-0': sidebarOpen,
        '-translate-x-full': !sidebarOpen,
        'lg:translate-x-0': true,
        'w-[90px]': sidebarCollapsed && !sidebarHovered,
        'w-[290px]': !sidebarCollapsed || sidebarHovered
    }">

    {{-- ═══ Logo ═══ --}}
    <div class="py-8 flex lg:justify-center">
        <a class="flex items-center gap-2" href="/">
            <div>
                <img x-show="!sidebarCollapsed || sidebarHovered" x-cloak
                     alt="Fathalla & Co."
                     width="180" height="45"
                     class="h-10 w-auto object-contain"
                     src="{{ asset('images/logo/fathalla_logo.jpg') }}">

                <img x-show="sidebarCollapsed && !sidebarHovered" x-cloak
                     alt="F"
                     width="36" height="36"
                     class="h-9 w-9 object-contain"
                     src="{{ asset('images/logo/fathalla_mark.png') }}">

                <p x-show="!sidebarCollapsed || sidebarHovered" x-cloak
                   class="mt-1 text-xs text-gray-400">Admin</p>
            </div>
        </a>
    </div>

    {{-- ═══ Menu ═══ --}}
    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <nav class="mb-6">
            <div class="flex flex-col gap-4">
                <div>
                    <h2 x-show="!sidebarCollapsed || sidebarHovered" x-cloak
                        class="mb-4 text-xs uppercase flex leading-[20px] text-gray-400 lg:justify-center">
                        Menu
                    </h2>

                    @php
                        $menuItems = [
                            ['route' => 'dashboard',           'icon' => 'dashboard',     'label' => 'Dashboard'],
                            ['route' => 'insights',            'icon' => 'insights',      'label' => 'Team insights'],
                            ['route' => 'team.index',          'icon' => 'team',          'label' => 'Team'],
                            ['route' => 'clients.index',       'icon' => 'clients',       'label' => 'Clients'],
                            ['route' => 'services.index',      'icon' => 'services',      'label' => 'Services'],
                            ['route' => 'catalog.index',       'icon' => 'catalog',       'label' => 'Catalog'],
                            ['route' => 'payments.index',      'icon' => 'payments',      'label' => 'Payments'],
                            ['route' => 'documents.index',     'icon' => 'documents',     'label' => 'Documents'],
                            ['route' => 'notifications.index', 'icon' => 'notifications', 'label' => 'Notifications'],
                        ];
                    @endphp

                    <ul class="flex flex-col gap-1">
                        @foreach($menuItems as $item)
                            @php $isActive = request()->routeIs($item['route']); @endphp
                            <li>
                                <a class="menu-item group {{ $isActive ? 'menu-item-active' : 'menu-item-inactive' }}"
                                   href="{{ route($item['route']) }}"
                                   :title="sidebarCollapsed && !sidebarHovered ? '{{ $item['label'] }}' : ''">
                                    <span class="{{ $isActive ? 'menu-item-icon-active' : 'menu-item-icon-inactive' }}">
                                        <x-icon :name="$item['icon']" />
                                    </span>
                                    <span x-show="!sidebarCollapsed || sidebarHovered" x-cloak
                                          class="menu-item-text">{{ $item['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</aside>