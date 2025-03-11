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
                    <!-- Profile Photo -->
                    <img class="w-32 h-32 rounded-full border-4 border-white object-cover" 
                         src="{{ asset(auth()->user()->avatar) }}" alt="Profile Photo" />
                    <div>
                        <p class="text-white text-xl font-semibold">{{ auth()->user()->name }}</p>
                        <p class="text-white text-sm">{{ auth()->user()->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="flex pt-4">

        <!-- Sidebar (Navigation Links) -->
        <div class="w-1/4 bg-white p-4 shadow-md">
            <div class="mb-8">
                <img class="w-16 h-16 rounded-full mx-auto mb-4" src="{{ asset(auth()->user()->avatar) }}"
                    alt="Profile-Img-Side-Bar" />
                <p class="text-center font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-center text-sm text-gray-600">{{ auth()->user()->bio }}</p>
            </div>
            <div>
                <ul>
                    <li><a href="#about" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">About</a></li>
                    <li><a href="#friends" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Friends</a></li>
                    <li><a href="#photos" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Photos</a></li>
                    <li><a href="#posts" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Posts</a></li>
                    <li><a href="#settings" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Settings</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Feed Section -->
        <div class="flex-1 p-4">
            <!-- Profile Navigation -->
            <div class="flex space-x-6 mb-8">
                <a href="#about" class="text-lg font-semibold text-blue-600 hover:text-blue-800">About</a>
                <a href="#friends" class="text-lg font-semibold text-blue-600 hover:text-blue-800">Friends</a>
                <a href="#photos" class="text-lg font-semibold text-blue-600 hover:text-blue-800">Photos</a>
                <a href="#posts" class="text-lg font-semibold text-blue-600 hover:text-blue-800">Posts</a>
            </div>

            <!-- About Section -->
            <div id="about" class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-xl font-semibold mb-4">About</h2>
                <p class="text-gray-700">This is where the user can add their detailed information, such as work, education, location, etc.</p>
            </div>

            <!-- Friends Section -->
            <div id="friends" class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-xl font-semibold mb-4">Friends</h2>
                <div class="grid grid-cols-4 gap-4">
                    <!-- Friend 1 -->
                    <div class="text-center">
                        <img class="w-16 h-16 rounded-full mx-auto mb-2" src="{{ asset(auth()->user()->avatar) }}" alt="Friend 1">
                        <p class="text-sm font-semibold">Friend 1</p>
                    </div>
                    <!-- Friend 2 -->
                    <div class="text-center">
                        <img class="w-16 h-16 rounded-full mx-auto mb-2" src="{{ asset(auth()->user()->avatar) }}" alt="Friend 2">
                        <p class="text-sm font-semibold">Friend 2</p>
                    </div>
                    <!-- Friend 3 -->
                    <div class="text-center">
                        <img class="w-16 h-16 rounded-full mx-auto mb-2" src="{{ asset(auth()->user()->avatar) }}" alt="Friend 3">
                        <p class="text-sm font-semibold">Friend 3</p>
                    </div>
                    <!-- Friend 4 -->
                    <div class="text-center">
                        <img class="w-16 h-16 rounded-full mx-auto mb-2" src="{{ asset(auth()->user()->avatar) }}" alt="Friend 4">
                        <p class="text-sm font-semibold">Friend 4</p>
                    </div>
                </div>
            </div>

            <!-- Photos Section -->
            <div id="photos" class="bg-white p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-xl font-semibold mb-4">Photos</h2>
                <div class="grid grid-cols-3 gap-4">
                    <!-- Photo 1 -->
                    <img src="{{ asset(auth()->user()->avatar) }}" alt="Photo 1" class="w-full h-32 object-cover rounded-lg">
                    <!-- Photo 2 -->
                    <img src="{{ asset(auth()->user()->avatar) }}" alt="Photo 2" class="w-full h-32 object-cover rounded-lg">
                    <!-- Photo 3 -->
                    <img src="{{ asset(auth()->user()->avatar) }}" alt="Photo 3" class="w-full h-32 object-cover rounded-lg">
                </div>
            </div>

            <!-- Posts Section -->
            <div id="posts" class="space-y-6">
                <!-- Post 1 -->
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

</body>

</html>
