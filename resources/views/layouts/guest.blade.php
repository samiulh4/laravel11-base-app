<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Laravel Base App | Guest')</title>
    @include('LayoutAdmin::partials.style')
    @include('LayoutAdmin::partials.alpine')
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    @yield('cover')
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="{{ asset('assets/admin/assets/img/create-account-office-dark.jpeg') }}" alt="..." />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            @yield('heading')
                        </h1>
                        @yield('content')
                        <hr class="my-8" />
                        @include('partials.admin.social-account-access')
                        @yield('page')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
