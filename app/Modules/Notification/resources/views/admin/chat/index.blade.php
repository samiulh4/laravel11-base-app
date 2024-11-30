@extends('layouts.admin')

@push('css')
    @vite(['resources/js/app.js'])
@endpush
@section('styles')
@endsection
@section('content')
    <div class="container px-6 mx-auto grid">
        <!-- Centering the Chat Panel -->
        <div class="flex justify-center items-center min-h-screen">
            <!-- Chat Panel -->
            <div class="w-full max-w-lg bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- Chat Header -->
                <div class="flex items-center justify-between bg-purple-600 text-white p-4">
                    <h2 class="text-lg font-semibold">Chat Panel</h2>
                    <button class="bg-purple-700 text-white p-2 rounded-lg hover:bg-purple-800">Close</button>
                </div>

                <!-- Message List -->
                <div id="messages" class="flex flex-col space-y-4 p-4 h-96 overflow-y-auto bg-gray-50">
                    <!-- Example Message -->
                    @foreach ($chats as $chat)
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gray-300 rounded-full overflow-hidden">
                                <img src="https://cdn.vectorstock.com/i/1000v/38/10/solid-purple-gradient-user-icon-web-vector-23623810.jpg"
                                    alt="Avatar" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-gray-800">{{ $chat->email }}</p>
                                <p class="text-sm text-gray-700 bg-gray-200 p-3 rounded-lg">{{ $chat->description }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ date('Y, M, d h:i A', strtotime($chat->created_at)) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Message Input -->
                <div class="p-4 bg-gray-200">
                    <div class="flex items-center space-x-3">
                        <textarea id="messageInput"
                            class="w-full h-24 p-3 rounded-lg border bg-white focus:outline-none focus:ring-2 focus:ring-purple-600"
                            placeholder="Type a message..."></textarea>
                        <button id="sendButton"
                            class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 focus:outline-none">Send</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/dayjs/dayjs.min.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const messageInput = document.getElementById('messageInput');
            const sendButton = document.getElementById('sendButton');
            const messagesContainer = document.getElementById('messages');

            // Listening for broadcasted messages
            window.Echo.channel('event-public-chat')
                .listen('EventPublicChat', (e) => {
                    // Append the received message to the chat box
                    const messageItem = document.createElement('div');
                    messageItem.classList.add('flex', 'items-start', 'space-x-3');
                    messageItem.innerHTML = `
                <div class="w-8 h-8 bg-gray-300 rounded-full overflow-hidden">
                    <img src="https://cdn.vectorstock.com/i/1000v/38/10/solid-purple-gradient-user-icon-web-vector-23623810.jpg" alt="Avatar" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">${e.email}</p>
                    <p class="text-sm text-gray-700 bg-gray-200 p-3 rounded-lg">${e.description}</p>
                    <p class="text-xs text-gray-500 mt-1">${dayjs(e.created_at).format('DD, MMM, YYYY hh:mm A')}</p>
                </div>
            `;
                    messagesContainer.appendChild(messageItem);
                    messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll to the bottom
                });

            // Sending messages via AJAX
            sendButton.addEventListener('click', function() {
                const message = messageInput.value.trim();

                if (message !== '') {
                    fetch('{{ url('/admin/chat/store') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                            body: JSON.stringify({
                                description: message
                            }) // Updated to match the backend field
                        })
                        .then(response => response.json())
                        .then(data => {
                            //console.log('Message sent:', data);
                            messageInput.value = ''; // Clear the input field
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>
@endsection