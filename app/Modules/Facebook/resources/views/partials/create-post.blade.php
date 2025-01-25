  <!-- Button to Open Modal -->
  <div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <div class="flex items-center space-x-4 mb-4">
        <img class="w-12 h-12 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="User-Img-Post">
        <button id="openFacebookPostModalBtn" class="flex-1 p-2 rounded-md border border-gray-300 text-left">What's on
            your mind?</button>
    </div>
</div>

<!-- Create Post Modal -->
<div id="facebookPostModal"
    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center px-4 py-2 border-b">
            <h2 class="text-lg font-semibold">Create Post</h2>
            <button id="closeFacebookPostModalBtn" class="text-gray-600 hover:text-gray-800">
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