<!DOCTYPE html>

<html lang="en">

<head>
    <!-- favicon -->
    @include('partials.web.external-yield.favicon')
    <!-- theme meta -->
    <meta name="theme-name" content="LaravelWeb" />
    <meta name="msapplication-TileColor" content="#000000" />
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#fff" />
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#000" />
    <meta name="generator" content="gulp" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- title -->
    <title>@yield('title', 'Laravel Base App | Web')</title>

    <!-- noindex robots -->
    <meta name="robots" content="" />

    <!-- meta-description -->
    <meta name="description" content="meta description" />

    <!-- author from config.json -->
    <meta name="author" content="" />

    <!-- og-title -->
    <meta property="og:title" content="" />
    <!-- og-description -->
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="/" />
    <!-- og-image -->
    <meta property="og:image" content="" />

    <!-- twitter-title -->
    <meta name="twitter:title" content="" />
    <!-- twitter-description -->
    <meta name="twitter:description" content="" />
    <!-- twitter-image -->
    <meta name="twitter:image" content="" />
    <meta name="twitter:card" content="summary_large_image" />

    @include('partials.web.style')
    @stack('css')
    @yield('styles')
</head>

<body>
    @include('partials.web.navbar')
    {{-- @include('partials.web.floating') --}}
    @yield('hero')
    @include('partials.web.message')
    @yield('content')
    @include('partials.web.footer')
    @include('partials.web.script')
    @stack('js')
    @yield('scripts')
</body>

</html>
