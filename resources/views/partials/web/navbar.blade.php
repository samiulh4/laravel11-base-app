<header class="header">
    <nav class="navbar container">
        <!-- logo -->
        <div class="order-0">
            <a href="index.html">
                <img src="{{ asset('assets/img/logos/512.png') }}" height="30" width="147" alt="logo"
                    style="height:40px;width:80px;" />
            </a>
        </div>
        <!-- navbar toggler -->
        <input id="nav-toggle" type="checkbox" class="hidden" />
        <label id="show-button" for="nav-toggle" class="order-1 flex cursor-pointer items-center lg:order-1 lg:hidden">
            <svg class="h-6 fill-current" viewBox="0 0 20 20">
                <title>Menu Open</title>
                <path d="M0 3h20v2H0V3z m0 6h20v2H0V9z m0 6h20v2H0V0z"></path>
            </svg>
        </label>
        <label id="hide-button" for="nav-toggle" class="order-2 hidden cursor-pointer items-center lg:order-1">
            <svg class="h-6 fill-current" viewBox="0 0 20 20">
                <title>Menu Close</title>
                <polygon points="11 9 22 9 22 11 11 11 11 22 9 22 9 11 -2 11 -2 9 9 9 9 -2 11 -2"
                    transform="rotate(45 10 10)"></polygon>
            </svg>
        </label>
        <!-- /navbar toggler -->
        <ul id="nav-menu"
            class="navbar-nav order-2 hidden w-full flex-[0_0_100%] lg:order-1 lg:flex lg:w-auto lg:flex-auto lg:justify-center lg:space-x-5">
            <li class="nav-item">
                <a href="" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
                <a href="about.html" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="blog.html" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
                <a href="features.html" class="nav-link">Features</a>
            </li>
            <li class="nav-item">
                <a href="how-it-works.html" class="nav-link">How It Works</a>
            </li>
            <li class="nav-item nav-dropdown group relative">
                <span class="nav-link inline-flex items-center">
                    Pages
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                    </svg>
                </span>
                <ul
                    class="nav-dropdown-list hidden group-hover:block lg:invisible lg:absolute lg:block lg:opacity-0 lg:group-hover:visible lg:group-hover:opacity-100">
                    <li class="nav-dropdown-item">
                        <a href="career.html" class="nav-dropdown-link">Career</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="career-single.html" class="nav-dropdown-link">Career Single</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="integrations.html" class="nav-dropdown-link">Integrations</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="integration-single.html" class="nav-dropdown-link">Integration Single</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="pricing.html" class="nav-dropdown-link">Pricing</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="changelogs.html" class="nav-dropdown-link">Changelogs</a>
                    </li>
                    <li class="nav-dropdown-item">
                        <a href="terms-conditions.html" class="nav-dropdown-link">Terms & Conditions</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="contact.html" class="nav-link">Contact</a>
            </li>
            <li class="nav-item mt-3.5 lg:hidden">
                <a class="btn btn-white btn-sm border-border" href="signin.html">Sing Up Now</a>
            </li>
        </ul>
        <div class="order-1 ml-auto hidden items-center md:order-2 md:ml-0 lg:flex">
            @guest
                <a class="btn btn-white btn-sm" href="{{ url('/admin/sign-up') }}">Sing Up</a>
                <a class="btn btn-white btn-sm" href="{{ url('/admin/sign-in') }}">Sing In</a>
            @else
                <!-- User Profile Dropdown -->
                <div class="relative ml-4">
                    <button id="profile-dropdown-toggle-web"
                        class="flex items-center rounded-full border border-gray-300 bg-white px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1">
                        <img class="h-8 w-16 rounded-full mr-2" src="{{ asset(auth()->user()->avatar) }}"
                            alt="Avatar" />
                        <span class="font-medium">{{ auth()->user()->name }}</span>
                        <svg class="ml-2 h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </button>
                    <ul id="profile-dropdown-menu-web"
                        class="absolute right-0 mt-2 w-48 rounded-md bg-white shadow-md ring-1 ring-black ring-opacity-5 hidden group-hover:block">
                        <li class="border-b border-gray-200">
                            <a href="{{ url('/user/profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                        </li>
                        <li class="border-b border-gray-200">
                            <a href="settings.html" class="block px-4 py-2 text-sm hover:bg-gray-100">Settings</a>
                        </li>
                        <li>
                            <a href="{{ url('/sign-out') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                            onclick="event.preventDefault();document.getElementById('web-signout-form').submit();">Sign Out</a>
                            <form id="web-signout-form" action="{{ url('/sign-out') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endguest
        </div>
    </nav>
</header>
