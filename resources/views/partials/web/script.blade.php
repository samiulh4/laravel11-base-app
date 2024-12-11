 <!-- jQuery -->
 <script src="{{ asset('assets/plugins/jquery/jquery-3.7.1.min.js') }}"></script>
 <!-- Swiper JS -->
 <script src="{{ asset('assets/web/plugins/swiper/swiper-bundle.js') }}"></script>
 <script src="{{ asset('assets/web/plugins/shufflejs/shuffle.js') }}"></script>

 <!-- Main Script -->
 <script src="{{ asset('assets/web/scripts/main.js') }}"></script>
 <script type="text/javascript">
     document.addEventListener('DOMContentLoaded', () => {
         const profileDropdownToggleWeb = document.getElementById('profile-dropdown-toggle-web');
         const profileDropdownMenuWeb = document.getElementById('profile-dropdown-menu-web');

         profileDropdownToggleWeb.addEventListener('click', (event) => {
             event.stopPropagation(); // Prevent click from bubbling up
             profileDropdownMenuWeb.classList.toggle('hidden');
         });

         // Close dropdown when clicking outside
         document.addEventListener('click', (event) => {
             if (!profileDropdownMenuWeb.contains(event.target) && !profileDropdownToggleWeb.contains(
                     event.target)) {
                 profileDropdownMenuWeb.classList.add('hidden');
             }
         });
     });
 </script>
