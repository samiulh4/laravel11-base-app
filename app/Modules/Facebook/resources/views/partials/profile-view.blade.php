<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Facebook-like</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/tailwind/tailwind.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-6.7.2/css/all.min.css') }}" />
</head>

<body class="bg-gray-100">

    <!-- Header Section -->
    <header class="bg-blue-600 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="text-xl font-bold">Facebook</div>
                <input class="px-4 py-2 rounded-lg" type="text" placeholder="Search" />
            </div>
            <div class="flex items-center space-x-6">
                <button class="text-white">Home</button>
                <button class="text-white">Messages</button>
                <button class="text-white">Notifications</button>
                <div class="relative">
                    <button id="profileDropdownBtn" class="text-white flex items-center space-x-2">
                        <img class="w-8 h-8 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="Profile-Img-Top-Bar" />
                        <span>{{ auth()->user()->name }}</span>
                    </button>
                    <div id="profileDropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                        <ul>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a></li>
                            <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Profile Main Content Section -->
    <div class="flex pt-4">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white p-4 shadow-md">
            <div class="mb-8">
                <img class="w-16 h-16 rounded-full mx-auto mb-4" src="{{ asset(auth()->user()->avatar) }}" alt="Profile-Img-Side-Bar" />
                <p class="text-center font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-center text-sm text-gray-600">Software Engineer</p>
            </div>
            <div>
                <ul>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Friends</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Groups</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Marketplace</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Events</a></li>
                    <li><a href="#" class="block py-2 text-gray-700 hover:bg-gray-100 px-4 rounded-md">Pages</a></li>
                </ul>
            </div>
        </div>

        <!-- Profile Main Feed -->
        <div class="flex-1 p-4">
            <!-- Profile Header Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <div class="flex items-center space-x-4">
                    <img class="w-24 h-24 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="User-Profile-Img" />
                    <div>
                        <h2 class="text-2xl font-semibold">{{ auth()->user()->name }}</h2>
                        <p class="text-sm text-gray-600">{{ auth()->user()->job_title }}</p>
                        <p class="text-sm text-gray-600">Joined on {{ auth()->user()->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Create Post Section -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <div class="flex items-center space-x-4 mb-4">
                    <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="User-Img-Post" />
                    <button id="openModalBtn" class="flex-1 p-2 rounded-md border border-gray-300 text-left">What's on your mind?</button>
                </div>
            </div>

            <!-- Posts Section -->
            <div class="space-y-6">
                <!-- Example Post 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4 mb-4">
                        <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="Profile" />
                        <div>
                            <p class="font-semibold">John Doe</p>
                            <p class="text-sm text-gray-600">2 hours ago</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">This is a sample post about the user's experience.</p>
                    <img class="w-full rounded-lg mb-4" src="{{ asset('assets/images/sample-image.jpg') }}" alt="Post Image">
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

                <!-- Example Post 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4 mb-4">
                        <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="Profile" />
                        <div>
                            <p class="font-semibold">Jane Smith</p>
                            <p class="text-sm text-gray-600">5 hours ago</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">Had an amazing time hiking today. Feeling great!</p>
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
    <script src="{{ asset('assets/plugins/fontawesome-6.7.2/js/all.min.js') }}"></script>
    <script>
        // Toggle dropdown menu
        document.getElementById('profileDropdownBtn').addEventListener('click', function() {
            const menu = document.getElementById('profileDropdownMenu');
            menu.classList.toggle('hidden');
        });

        // Modal for creating post
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const createPostModal = document.getElementById('createPostModal');

        openModalBtn.addEventListener('click', () => {
            createPostModal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            createPostModal.classList.add('hidden');
        });

        createPostModal.addEventListener('click', (e) => {
            if (e.target === createPostModal) {
                createPostModal.classList.add('hidden');
            }
        });
    </script>

</body>

</html>
