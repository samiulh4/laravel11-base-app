<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook-like Homepage</title>
    <link rel="stylesheet" href="{{ asset('assets/plugins/tailwind/tailwind.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-6.7.2/css/all.min.css') }}" />
    <style>
        /* Chat Sidebar */
        .chat-sidebar {
            position: fixed;
            right: 0;
            top: 0;
            bottom: 0;
            width: 280px;
            background: #f9fafb;
            border-left: 1px solid #e5e7eb;
            z-index: 50;
            overflow-y: auto;
        }

        .chat-sidebar h3 {
            padding: 1rem;
            font-size: 1.25rem;
            font-weight: bold;
            background: #f3f4f6;
            border-bottom: 1px solid #e5e7eb;
        }

        .chat-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .chat-sidebar ul li {
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background 0.2s;
        }

        .chat-sidebar ul li:hover {
            background: #e5e7eb;
        }

        .chat-sidebar ul li img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 0.75rem;
        }

        /* Chat Window */
        .chat-window {
            position: fixed;
            bottom: 0;
            right: 320px;
            width: 300px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px 8px 0 0;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            display: none;
            flex-direction: column;
            z-index: 60;
        }

        .chat-window-header {
            background: #4f46e5;
            color: white;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-window-body {
            flex-grow: 1;
            overflow-y: auto;
            padding: 10px;
            background: #f9fafb;
        }

        .chat-window-footer {
            padding: 10px;
            border-top: 1px solid #e5e7eb;
        }

        .chat-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
        }

        .chat-sidebar {
            transition: transform 0.3s ease;
            transform: translateX(100%);
        }

        .chat-sidebar.active {
            transform: translateX(0);
        }

        #toggleChatSidebar {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 48px;
            height: 48px;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Header Section -->
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
                    <button id="profileDropdownBtn" class="text-white flex items-center space-x-2">
                        <img class="w-8 h-8 rounded-full" src="{{ asset(auth()->user()->avatar) }}"
                            alt="Profile-Img-Top-Bar" />
                        <span>{{ auth()->user()->name }}</span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="profileDropdownMenu"
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

    <!-- Main Content Section -->
    <div class="flex pt-4 pr-[280px]">

        <!-- Sidebar -->
        <div class="w-full sm:w-1/4 bg-white p-4 shadow-md">
            <div class="mb-8">
                <img class="w-16 h-16 rounded-full mx-auto mb-4" src="{{ asset(auth()->user()->avatar) }}"
                    alt="Profile-Img-Side-Bar" />
                <p class="text-center font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-center text-sm text-gray-600">Software Engineer</p>
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

        <!-- Main Feed -->
        <div class="w-full sm:flex-1 p-4">
            <!-- Story Highlights -->
            <div class="bg-white p-4 rounded-lg shadow-md mb-8">
                <div class="flex space-x-4">
                    <div class="relative">
                        <img class="w-20 h-20 rounded-full border-4 border-blue-500"
                            src="{{ asset(auth()->user()->avatar) }}" alt="Story 1">
                        <div class="absolute bottom-0 left-0 right-0 text-center text-white bg-blue-600 py-1">John</div>
                    </div>
                    <div class="relative">
                        <img class="w-20 h-20 rounded-full border-4 border-blue-500"
                            src="{{ asset(auth()->user()->avatar) }}" alt="Story 2">
                        <div class="absolute bottom-0 left-0 right-0 text-center text-white bg-blue-600 py-1">Jane</div>
                    </div>
                    <div class="relative">
                        <img class="w-20 h-20 rounded-full border-4 border-blue-500"
                            src="{{ asset(auth()->user()->avatar) }}" alt="Story 3">
                        <div class="absolute bottom-0 left-0 right-0 text-center text-white bg-blue-600 py-1">Alex</div>
                    </div>
                </div>
            </div>

            <!-- Button to Open Modal -->
            <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                <div class="flex items-center space-x-4 mb-4">
                    <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="User-Img-Post">
                    <button id="openModalBtn" class="flex-1 p-2 rounded-md border border-gray-300 text-left">What's on
                        your mind?</button>
                </div>
            </div>

            <!-- Create Post Modal -->
            <div id="createPostModal"
                class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white rounded-lg shadow-lg w-1/2">
                    <div class="flex justify-between items-center px-4 py-2 border-b">
                        <h2 class="text-lg font-semibold">Create Post</h2>
                        <button id="closeModalBtn" class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center space-x-4 mb-4">
                            <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}"
                                alt="User-Img-Post">
                            <p class="font-semibold">{{ auth()->user()->name }}</p>
                        </div>
                        <textarea class="w-full p-2 border border-gray-300 rounded-md mb-4" rows="4" placeholder="What's on your mind?"></textarea>
                        <div class="mb-4">
                            <label class="block text-sm text-gray-600 mb-2" for="file-upload">Upload Photo</label>
                            <input type="file" id="file-upload" name="file-upload"
                                class="border border-gray-300 p-2 rounded-md w-full" accept="image/*">
                        </div>
                        <div class="flex justify-end">
                            <button id="postBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md">Post</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts Section -->
            <div class="space-y-6">
                <!-- Post 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center space-x-4 mb-4">
                        <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}"
                            alt="Profile" />
                        <div>
                            <p class="font-semibold">Jane Smith</p>
                            <p class="text-sm text-gray-600">3 hours ago</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">Just visited the beach today, it was amazing! #beachday</p>
                    <img class="w-full rounded-lg mb-4" src="{{ asset(auth()->user()->avatar) }}" alt="Profile">
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

    <!-- Chat Sidebar Toggle Button -->
    <button id="toggleChatSidebar"
        class="fixed bottom-4 right-4 bg-blue-600 text-white p-2 rounded-full shadow-md z-50">
        <i class="fas fa-comments"></i>
    </button>
    <!-- Chat Sidebar -->
    <div id="chatSidebar" class="chat-sidebar hidden">
        <h3>Contacts</h3>
        <ul>
            <li data-chat="1" class="hover:bg-gray-200 cursor-pointer">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="Friend 1">
                <span>Friend 1</span>
            </li>
            <li data-chat="2" class="hover:bg-gray-200 cursor-pointer">
                <img src="{{ asset(auth()->user()->avatar) }}" alt="Friend 2">
                <span>Friend 2</span>
            </li>
        </ul>
    </div>

    <!-- Chat Windows -->
    <div id="chatWindow1" class="chat-window">
        <div class="chat-window-header">
            <span>Friend 1</span>
            <button class="close-chat" data-chat="1">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="chat-window-body">
            <p>Chat history with Friend 1...</p>
        </div>
        <div class="chat-window-footer">
            <input type="text" class="chat-input" placeholder="Type a message...">
        </div>
    </div>

    <div id="chatWindow2" class="chat-window">
        <div class="chat-window-header">
            <span>Friend 2</span>
            <button class="close-chat" data-chat="2">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="chat-window-body">
            <p>Chat history with Friend 2...</p>
        </div>
        <div class="chat-window-footer">
            <input type="text" class="chat-input" placeholder="Type a message...">
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
    <!-- Fontawesome -->
    <script src="{{ asset('assets/plugins/fontawesome-6.7.2/js/all.min.js') }}"></script>
    <script>
        // Toggle dropdown menu
        document.getElementById('profileDropdownBtn').addEventListener('click', function() {
            const menu = document.getElementById('profileDropdownMenu');
            menu.classList.toggle('hidden');
        });

        // Elements
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const createPostModal = document.getElementById('createPostModal');

        // Open Modal
        openModalBtn.addEventListener('click', () => {
            createPostModal.classList.remove('hidden');
        });

        // Close Modal
        closeModalBtn.addEventListener('click', () => {
            createPostModal.classList.add('hidden');
        });

        // Close Modal on Outside Click
        createPostModal.addEventListener('click', (e) => {
            if (e.target === createPostModal) {
                createPostModal.classList.add('hidden');
            }
        });
    </script>
    <script>
        // Toggle Chat Windows
        document.querySelectorAll('.chat-sidebar li').forEach(item => {
            item.addEventListener('click', () => {
                const chatId = item.getAttribute('data-chat');
                const chatWindow = document.getElementById(`chatWindow${chatId}`);
                chatWindow.style.display = 'flex';
            });
        });

        document.querySelectorAll('.close-chat').forEach(button => {
            button.addEventListener('click', () => {
                const chatId = button.getAttribute('data-chat');
                const chatWindow = document.getElementById(`chatWindow${chatId}`);
                chatWindow.style.display = 'none';
            });
        });
    </script>
    <script>
        const toggleChatSidebarBtn = document.getElementById('toggleChatSidebar');
        const chatSidebar = document.getElementById('chatSidebar');

        toggleChatSidebarBtn.addEventListener('click', () => {
            chatSidebar.classList.toggle('hidden');
            chatSidebar.classList.toggle('active');
        });
    </script>

</body>

</html>
