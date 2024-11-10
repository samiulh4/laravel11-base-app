<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
    <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
        <!-- Mobile hamburger -->
        @include('LayoutAdmin::partials.mobile-hamburger')
        <!-- Search input -->
        @include('LayoutAdmin::partials.search-input')
        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Theme Toggler -->
            @include('LayoutAdmin::partials.theme-toggler')
            <!-- Notifications Menu -->
            @include('LayoutAdmin::partials.notifications-menu')
            <!-- Profile Menu -->
            @include('LayoutAdmin::partials.profile-menu')
        </ul>
    </div>
</header>
