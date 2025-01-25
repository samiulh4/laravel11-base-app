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