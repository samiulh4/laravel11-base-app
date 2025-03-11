<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Laravel Base App | Facebook')</title>
    @include('Facebook::partials.style')
    @yield('styles')
</head>

<body class="bg-gray-100">

    <!-- Header Section -->
    @include('Facebook::partials.header')

    <!-- Main Content Section -->
    <div class="flex pt-4 pr-[280px]">

        <!-- Sidebar -->
        @include('Facebook::partials.sidebar')

        <!-- Main Feed -->
        <div class="w-full sm:flex-1 p-4">
            @yield('content')
        </div>
    </div>

    <!-- Chat Sidebar -->
    @include('Facebook::partials.chat-sidebar')

    @include('Facebook::partials.script')
    @yield('scripts')
</body>

</html>
