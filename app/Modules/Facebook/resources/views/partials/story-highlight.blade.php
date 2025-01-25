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