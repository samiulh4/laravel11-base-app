<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logos/512.png') }}" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title', 'Laravel Base App | Admin')</title>
    @include('partials.admin.style')
    @include('partials.admin.alpine')
    @stack('css')
    @yield('styles')
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop Sidebar -->
        @include('partials.admin.sidebar-desktop')
        <!-- Mobile sidebar -->
        @include('partials.admin.sidebar-mobile')
        <div class="flex flex-col flex-1">
            <!-- Header -->
            @include('partials.admin.header')
            <main class="h-full pb-16 overflow-y-auto">
                @include('partials.message')
                @yield('content')
            </main>
        </div>
    </div>

    @include('partials.admin.script')
    @stack('js')
    @yield('scripts')
</body>

</html>
