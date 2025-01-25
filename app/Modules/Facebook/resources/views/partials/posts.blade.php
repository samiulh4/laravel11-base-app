<div class="space-y-6">
    <!-- Post 1 -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex items-center space-x-4 mb-4">
            <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="Profile" />
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
