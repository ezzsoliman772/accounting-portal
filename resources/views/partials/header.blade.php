{{-- Header --}}
<header class="sticky top-0 flex w-full bg-white border-gray-200 z-99999 dark:border-gray-800 dark:bg-gray-900 lg:border-b">
    <div class="flex flex-col items-center justify-between grow lg:flex-row lg:px-6">

        {{-- ═══ Left ═══ --}}
        <div class="flex items-center justify-between w-full gap-2 px-3 py-3 border-b border-gray-200 dark:border-gray-800 sm:gap-4 lg:justify-normal lg:border-b-0 lg:px-0 lg:py-4">

            {{-- Sidebar Toggle --}}
            <button
                x-on:click="window.innerWidth >= 1024 ? sidebarCollapsed = !sidebarCollapsed : sidebarOpen = !sidebarOpen"
                class="flex items-center justify-center w-10 h-10 text-gray-500 border-gray-200 rounded-lg z-99999 dark:border-gray-800 dark:text-gray-400 lg:h-11 lg:w-11 lg:border"
                aria-label="Toggle Sidebar">
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z" fill="currentColor"/>
                </svg>
            </button>

            {{-- Mobile Logo --}}
            <a class="lg:hidden" href="/">
                <img alt="Fathalla & Co."
                     loading="lazy"
                     width="154"
                     height="32"
                     class="h-8 w-auto object-contain"
                     src="{{ asset('images/logo/fathalla_logo.jpg') }}">
            </a>

            {{-- Mobile Menu Button --}}
            <button class="flex items-center justify-center w-10 h-10 text-gray-700 rounded-lg z-99999 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800 lg:hidden">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z" fill="currentColor"/>
                </svg>
            </button>

            {{-- Desktop Title --}}
            <div class="hidden lg:block">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Fathalla & Co. · Admin</p>
                <p class="text-xs text-gray-400">Accountants & Consultants</p>
            </div>
        </div>

        {{-- ═══ Right ═══ --}}
        <div class="hidden w-full flex-wrap items-center justify-end gap-3 px-3 py-3 shadow-theme-md lg:flex lg:px-0 lg:shadow-none">
            <div class="flex flex-wrap items-center justify-end gap-2">

                {{-- Reset demo data --}}
                <button class="inline-flex items-center justify-center font-medium gap-2 rounded-lg transition px-4 py-3 text-sm bg-white text-gray-700 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]"
                        type="button">
                    Reset demo data
                </button>

                {{-- Language Switch --}}
                <div class="flex items-center overflow-hidden rounded-lg border border-gray-200 dark:border-gray-800">
                    <button type="button"
                            x-on:click="lang = 'en'"
                            :class="lang === 'en' ? 'bg-brand-500 text-white' : 'text-gray-500 hover:bg-gray-100 dark:hover:bg-white/5'"
                            class="px-2.5 py-1.5 text-xs font-medium"
                            aria-label="English">EN</button>
                    <button type="button"
                            x-on:click="lang = 'ar'"
                            :class="lang === 'ar' ? 'bg-brand-500 text-white' : 'text-gray-500 hover:bg-gray-100 dark:hover:bg-white/5'"
                            class="px-2.5 py-1.5 text-xs font-medium"
                            aria-label="العربية">ع</button>
                </div>

                {{-- Dark Mode Toggle --}}
                <button x-data="{ dark: false }"
                        x-on:click="dark = !dark; document.documentElement.classList.toggle('dark', dark)"
                        class="relative flex items-center justify-center text-gray-500 transition-colors bg-white border border-gray-200 rounded-full hover:text-dark-900 h-11 w-11 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg class="hidden dark:block" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z" fill="currentColor"/>
                    </svg>
                    <svg class="dark:hidden" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z" fill="currentColor"/>
                    </svg>
                </button>

                            {{-- Notifications Bell --}}
                <div class="relative" x-data="notificationsBell">
                    <button type="button" x-on:click="open = !open" x-on:click.outside="open = false"
                            class="relative flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                        <span x-show="unreadCount > 0"
                            class="absolute right-0 top-0.5 z-10 h-2 w-2 rounded-full bg-error-500">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-error-500 opacity-75"></span>
                        </span>
                        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.75 2.29248C10.75 1.87827 10.4143 1.54248 10 1.54248C9.58583 1.54248 9.25004 1.87827 9.25004 2.29248V2.83613C6.08266 3.20733 3.62504 5.9004 3.62504 9.16748V13.4591H3.33337C2.87313 13.4591 2.50004 13.8322 2.50004 14.2925C2.50004 14.7527 2.87313 15.1258 3.33337 15.1258H16.6667C17.1269 15.1258 17.5 14.7527 17.5 14.2925C17.5 13.8322 17.1269 13.4591 16.6667 13.4591H16.375V9.16748C16.375 5.9004 13.9174 3.20733 10.75 2.83613V2.29248ZM4.99996 13.4591V9.16748C4.99996 6.41016 7.24262 4.16748 10 4.16748C12.7574 4.16748 15 6.41016 15 9.16748V13.4591H4.99996ZM8.00004 16.8758C8.00004 17.4961 8.50427 18.0004 9.12466 18.0004H10.8754C11.4958 18.0004 12 17.4961 12 16.8758H8.00004Z" fill="currentColor"></path>
                        </svg>
                    </button>

                    {{-- Dropdown Panel --}}
                    <div x-show="open" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute right-0 rtl:right-auto rtl:left-0 mt-2 w-[360px] rounded-2xl border border-gray-200 bg-white shadow-xl dark:border-gray-800 dark:bg-gray-900 z-50">
                        
                        {{-- Header --}}
                        <div class="px-5 pt-5 pb-3">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Office queue</h3>
                        </div>

                        {{-- List --}}
                        <div class="max-h-[380px] overflow-y-auto">
                            <template x-for="item in queue" :key="item.id">
                                <a :href="item.url"
                                class="block px-5 py-3 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors border-b border-gray-100 dark:border-gray-800 last:border-0">
                                    <p class="text-xs font-medium text-brand-600" x-text="item.type"></p>
                                    <p class="mt-0.5 text-sm font-semibold text-gray-800 dark:text-white/90" x-text="item.title"></p>
                                    <p class="mt-0.5 text-xs text-gray-500" x-text="item.subtitle"></p>
                                </a>
                            </template>
                        </div>

                        {{-- Footer Button --}}
                        <div class="p-3 border-t border-gray-100 dark:border-gray-800">
                            <a href="/documents"
                            class="block w-full text-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                                Documents
                            </a>
                        </div>
                    </div>
                </div>

                {{-- -------------------------------------------------- --}}

                {{-- User Avatar Dropdown --}}
<div class="relative" x-data="{ userOpen: false }">
    <button type="button" x-on:click="userOpen = !userOpen" x-on:click.outside="userOpen = false"
            class="flex items-center text-gray-700 dark:text-gray-400">
        <span class="me-3 rtl:me-0 rtl:ms-3 flex h-11 w-11 items-center justify-center overflow-hidden rounded-full bg-brand-50 text-sm font-semibold text-brand-700 dark:bg-brand-500/15 dark:text-brand-400">RR</span>
        <span class="me-1 hidden max-w-[140px] truncate font-medium sm:block">Reda Ragab</span>
        <svg class="stroke-gray-500 dark:stroke-gray-400 transition-transform duration-200"
             :class="userOpen ? 'rotate-180' : ''"
             width="18" height="20" viewBox="0 0 18 20" fill="none">
            <path d="M4.3125 8.65625L9 13.3437L13.6875 8.65625" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </button>

                    {{-- Dropdown Panel --}}
                    <div x-show="userOpen" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute end-0 rtl:end-auto rtl:start-0 mt-2 w-[280px] rounded-2xl border border-gray-200 bg-white shadow-xl dark:border-gray-800 dark:bg-gray-900 z-50">
                        
                        <div class="p-5">
                            <p class="font-semibold text-gray-800 dark:text-white/90">Reda Ragab</p>
                            <p class="mt-0.5 text-sm text-gray-500">admin@fathalla.example</p>
                            <p class="mt-2 text-sm font-medium text-brand-600">Super Admin</p>
                        </div>

                        <div class="border-t border-gray-100 dark:border-gray-800 p-3">
                            <button type="button"
                                    class="w-full text-start px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800">
                                Sign out
                            </button>
                        </div>
                    </div>
            </div>

            </div>
        </div>
    </div>
</header>