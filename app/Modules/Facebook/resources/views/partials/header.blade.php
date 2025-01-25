<header class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex flex-wrap justify-between items-center">

            <div class="flex items-center space-x-4">
                <div class="text-xl font-bold">Facebook</div>
                <input class="px-4 py-2 rounded-lg" type="text" placeholder="Search" />
            </div>
            <div class="flex items-center space-x-6">
                <button class="text-white">Home</button>
                <button class="text-white">Messages</button>
                <button class="text-white">Notifications</button>
                <!-- User Profile Dropdown -->
                <div class="relative">
                    <button id="facebookProfileDropdownBtn" class="text-white flex items-center space-x-2">
                        <img class="w-8 h-8 rounded-full" src="{{ asset(auth()->user()->avatar) }}"
                            alt="Profile-Img-Top-Bar" />
                        <span>{{ auth()->user()->name }}</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="facebookProfileDropdownMenu"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                        <ul>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            </li>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                            </li>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>