@extends('layouts.admin')

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
    <script type="text/javascript">
        const ws = new WebSocket('ws://localhost:9991/server.php');
        ws.onopen = () => {
            console.log('WebSocket connection established.');
        };
        ws.onerror = (error) => {
            console.error('WebSocket error:', error);
            //console.error('Could not connect to the WebSocket server. Please check the server or try again later.',error);
            //alert('Could not connect to the WebSocket server. Please check the server or try again later.');
        };
        ws.onclose = (event) => {
            console.log('WebSocket connection closed:', event);
        };
         // On receiving a message
         ws.onmessage = (event) => {
            const newMessage = document.createElement('p');
            newMessage.textContent = event.data;
            messagesDiv.appendChild(newMessage);
        };
        
        const messagesDiv = document.getElementById('messages');
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');

       

        // On send button click
        sendButton.addEventListener('click', () => {
            const message = messageInput.value;
            ws.send(message);
            messageInput.value = '';
        });
    </script>
@endsection
