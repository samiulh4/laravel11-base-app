 <!-- JQuery -->
 <script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
 <!-- Fontawesome -->
 <script src="{{ asset('assets/plugins/fontawesome-6.7.2/js/all.min.js') }}"></script>


 <script>
     // Toggle user profile dropdown menu
     document.getElementById('facebookProfileDropdownBtn').addEventListener('click', function() {
         const menu = document.getElementById('facebookProfileDropdownMenu');
         menu.classList.toggle('hidden');
     });

     document.querySelectorAll('.facebook_close_chat').forEach(button => {
         button.addEventListener('click', () => {
             const chatId = button.getAttribute('data-chat');
             const chatWindow = document.getElementById(`facebookChatWindow-${chatId}`);
             chatWindow.style.display = 'none';
         });
     });

     const showFacebookChatSidebar = document.getElementById('showFacebookChatSidebar');
     const hideFacebookChatSidebar = document.getElementById('hideFacebookChatSidebar');
     const facebookChatSidebar = document.getElementById('facebookChatSidebar');

     showFacebookChatSidebar.addEventListener('click', () => {
         facebookChatSidebar.classList.toggle('hidden');
         facebookChatSidebar.classList.toggle('active');
     });
     hideFacebookChatSidebar.addEventListener('click', () => {
         facebookChatSidebar.classList.toggle('hidden');
         facebookChatSidebar.classList.toggle('active');
     });
 </script>
