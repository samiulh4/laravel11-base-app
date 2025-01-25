 <!-- Chat Sidebar Toggle Button -->
 <button id="showFacebookChatSidebar"
     class="fixed bottom-4 right-4 bg-blue-600 text-white p-2 rounded-full shadow-md z-50">
     <i class="fas fa-comments"></i>
 </button>
 <!-- Chat Sidebar -->
 <div id="facebookChatSidebar" class="facebook_chat_sidebar hidden">
     <div class="flex justify-between">
         <h3>Contacts</h3>
         <button class="bg-blue-600" id="hideFacebookChatSidebar"><i class="fa-solid fa-minus"></i></button>
     </div>

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
 <div id="facebookChatWindow-1" class="facebook_chat_window">
     <div class="facebook_chat_window_header">
         <span>Friend 1</span>
         <button class="facebook_close_chat" data-chat="1">
             <i class="fas fa-times"></i>
         </button>
     </div>
     <div class="facebook_chat_window_body">
         <p>Chat history with Friend 1...</p>
     </div>
     <div class="facebook_chat_window_footer">
         <input type="text" class="facebook_chat_input" placeholder="Type a message...">
     </div>
 </div>

 <div id="facebookChatWindow-2" class="facebook_chat_window">
     <div class="facebook_chat_window_header">
         <span>Friend 2</span>
         <button class="facebook_close_chat" data-chat="2">
             <i class="fas fa-times"></i>
         </button>
     </div>
     <div class="facebook_chat_window_body">
         <p>Chat history with Friend 2...</p>
     </div>
     <div class="facebook_chat_window_footer">
         <input type="text" class="facebook_chat_input" placeholder="Type a message...">
     </div>
 </div>
