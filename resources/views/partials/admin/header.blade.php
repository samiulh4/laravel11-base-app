<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <!-- Mobile hamburger -->
        @include('partials.admin.mobile-hamburger')
        <!-- Search input -->
        @include('partials.admin.search-input')
        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Theme Toggler -->
            @include('partials.admin.theme-toggler')
            <!-- Notifications Menu -->
            @include('partials.admin.notifications-menu')
            <!-- Profile Menu -->
            @include('partials.admin.profile-menu')
        </ul>
    </div>
</header>
