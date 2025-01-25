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

     // Elements
     const openFacebookPostModalBtn = document.getElementById('openFacebookPostModalBtn');
     const closeFacebookPostModalBtn = document.getElementById('closeFacebookPostModalBtn');
     const facebookPostModal = document.getElementById('facebookPostModal');

     // Open Modal
     openFacebookPostModalBtn.addEventListener('click', () => {
         facebookPostModal.classList.remove('hidden');
     });

     // Close Modal
     closeFacebookPostModalBtn.addEventListener('click', () => {
         facebookPostModal.classList.add('hidden');
     });

     // Close Modal on Outside Click
     facebookPostModal.addEventListener('click', (e) => {
         if (e.target === facebookPostModal) {
             facebookPostModal.classList.add('hidden');
         }
     });

     // Toggle Chat Windows
     document.querySelectorAll('.facebook_chat_sidebar li').forEach(item => {
         item.addEventListener('click', () => {
             const chatId = item.getAttribute('data-chat');
             const chatWindow = document.getElementById(`facebookChatWindow-${chatId}`);
             chatWindow.style.display = 'flex';
         });
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
