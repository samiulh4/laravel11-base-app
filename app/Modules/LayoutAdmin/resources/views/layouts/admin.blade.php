<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel Base App | Admin</title>
    @include('LayoutAdmin::partials.style')
    @include('LayoutAdmin::partials.alpine')
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop Sidebar -->
        @include('LayoutAdmin::partials.sidebar-desktop')
        <!-- Mobile sidebar -->
        @include('LayoutAdmin::partials.sidebar-mobile')
        <div class="flex flex-col flex-1">
            <!-- Header -->
            @include('LayoutAdmin::partials.header')
            <main class="h-full pb-16 overflow-y-auto">
                <!-- Remove everything INSIDE this div to a really blank page -->
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Blank
                    </h2>
                </div>
            </main>
        </div>
    </div>

    @include('LayoutAdmin::partials.script')
</body>

</html>
