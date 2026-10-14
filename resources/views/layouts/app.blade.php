<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Fathalla & Co. Admin')</title>

    {{-- ⚡ Set dir + lang BEFORE CSS loads (no flash) --}}
    <script>
    (function () {
        var lang = localStorage.getItem('lang') || 'en';
        document.documentElement.setAttribute('lang', lang);
        document.documentElement.setAttribute('dir', lang === 'ar' ? 'rtl' : 'ltr');
    })();
    </script>
    <style>
            .apexcharts-canvas {
                max-width: 100% !important;
            }
            .apexcharts-svg {
                max-width: 100% !important;
            }
    </style>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        [dir="rtl"] body { font-family: 'Cairo', sans-serif; }
        [dir="ltr"] body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900"
      x-data="{
          lang: localStorage.getItem('lang') || 'en',
          sidebarOpen: false,
          sidebarCollapsed: false
      }"
      x-init="$watch('lang', v => {
          localStorage.setItem('lang', v);
          document.documentElement.setAttribute('lang', v);
          document.documentElement.setAttribute('dir', v === 'ar' ? 'rtl' : 'ltr');
      })">

    <div class="min-h-screen overflow-x-hidden xl:flex"
     x-data="{
         sidebarHovered: false,
         sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true',
         sidebarOpen: false,
         get expanded() {
             return !this.sidebarCollapsed || this.sidebarHovered;
         }
     }">

    @include('partials.sidebar')

    {{-- Main Content --}}
    <div class="min-w-0 flex-1 transition-all duration-300 ease-in-out"
         :class="expanded ? 'lg:ms-[290px]' : 'lg:ms-[90px]'">
        
        @include('partials.header')
        
        <main class="mx-auto max-w-(--breakpoint-2xl) p-3 sm:p-4 md:p-6">
            @yield('content')
        </main>
    </div>
</div>

    @stack('scripts')
</body>
</html>