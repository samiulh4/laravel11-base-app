<!-- Friends Table in Main Content -->
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Friends List</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Profile Picture</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Friend 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">
                        <img class="w-10 h-10 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="Friend 1">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">John Doe</td>
                    <td class="border border-gray-300 px-4 py-2 text-green-600">Online</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600">Message</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600">Unfriend</button>
                    </td>
                </tr>
                <!-- Example Friend 2 -->
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">
                        <img class="w-10 h-10 rounded-full" src="{{ asset(auth()->user()->avatar) }}" alt="Friend 2">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">Jane Smith</td>
                    <td class="border border-gray-300 px-4 py-2 text-gray-600">Offline</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-600">Message</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600">Unfriend</button>
                    </td>
                </tr>
                <!-- Add more friends as needed -->
            </tbody>
        </table>
    </div>
</div>
