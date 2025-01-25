<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-like Profile</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/tailwind/tailwind.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-6.7.2/css/all.min.css') }}" />
</head>

<body class="bg-gray-100">

    <!-- Profile Header Section -->
    <div class="bg-blue-600">
        <!-- Cover Photo -->
        <div class="relative">
            <img src="{{ asset(auth()->user()->cover_photo) }}" alt="Cover Photo"
                class="w-full h-48 object-cover">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-transparent p-4">
                <div class="flex items-center space-x-4">
                    <img class="w-16 h-16 rounded-full border-4 border-white" src="{{ asset(auth()->user()->avatar) }}"
                        alt="Profile Photo" />
                    <div>
                        <p class="text-white text-lg font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-white text-sm">{{ auth()->user()->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="flex pt-4">

        <!-- Sidebar -->
        <div class="w-1/4 bg-white p-4 shadow-md">
            <div class="mb-8">
                <img class="w-16 h-16 rounded-full mx-auto mb-4" src="{{ asset(auth()->user()->avatar) }}"
                    alt="Profile-Img-Side-Bar" />
                <p class="text-center font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-center text-sm text-gray-600">{{ auth()->user()->bio }}</p>
            </div>
            <div>
                <ul>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Friends</a>
                    </li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Groups</a>
                    </li>
                    <li><a href="#"
                            class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Marketplace</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Events</a>
                    </li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Pages</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Feed Section -->
        <div class="flex-1 p-4">
            <div class="space-y-6">
                <!-- Posts Section -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4 mb-4">
                        <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="Profile" />
                        <div>
                            <p class="font-semibold">{{ auth()->user()->name }}</p>
                            <p class="text-sm text-gray-600">3 hours ago</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">Just visited the beach today, it was amazing! #beachday</p>
                    <img class="w-full rounded-lg mb-4" src="{{ asset(auth()->user()->avatar) }}" alt="Beach">
                    <div class="flex space-x-8 text-gray-600">
                        <button class="flex items-center space-x-2 hover:text-blue-500">
                            <i class="fa-regular fa-heart"></i>
                            <span>Like</span>
                        </button>
                        <button class="flex items-center space-x-2 hover:text-blue-500">
                            <i class="fa-regular fa-comments"></i>
                            <span>Comment</span>
                        </button>
                        <button class="flex items-center space-x-2 hover:text-blue-500">
                            <i class="fa-regular fa-share-from-square"></i>
                            <span>Share</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
    <!-- Fontawesome -->
    <script src="{{ asset('assets/plugins/fontawesome-6.7.2/js/all.min.js') }}"></script>
    <script>
        // Profile photo dropdown toggle
        document.getElementById('profileDropdownBtn').addEventListener('click', function() {
            const menu = document.getElementById('profileDropdownMenu');
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
