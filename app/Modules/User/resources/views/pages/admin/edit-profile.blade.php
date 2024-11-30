@extends('layouts.admin')

@section('styles')
    <style>
        #avatar-preview {
            height: 100px;
            width: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="container px-6 mx-auto grid">
        <!-- CTA -->
        <a class="my-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
            href="https://github.com/estevanmaito/windmill-dashboard">
            <span>&LeftArrow; Back</span>
        </a>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit My Profile ({{ $user->email }})
        </h4>

        {{ html()->form('POST', '/admin/user/save-my-profile')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <!-- Name -->
            {{ html()->label('Name')->for('name')->class('block mt-4 text-sm text-gray-700 dark:text-gray-400') }}
            {{ html()->text('name')->value($user->name)->class(
                    'block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray border-red-600',
                )->required() }}
            {{ html()->span('Your password is too short.')->class('text-xs text-red-600 dark:text-red-400') }}

            <!-- Gender -->
            {{ html()->label('Gender')->for('gender_code')->class('block mt-4 text-sm text-gray-700 dark:text-gray-400') }}
            {{ html()->select('gender_code', $genders, $user->gender_code)->class(
                    'block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray',
                )->id('gender_code')->placeholder('Select Gender')->required() }}
            {{ html()->span('Your password is too short.')->class('text-xs text-red-600 dark:text-red-400') }}

            <!-- Avatar -->
            {{ html()->label('Avatar')->for('avatar')->class('block mt-4 text-sm text-gray-700 dark:text-gray-400') }}
            <div class="flex items-center space-x-4">
                <input type="file" id="avatar" name="avatar"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-input focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    onchange="previewImage(event)">
                <!-- Fixed image size for preview -->
                <div class="bg-sky-300">
                    <img id="avatar-preview" class="object-cover" src="{{ asset(auth()->user()->avatar) }}"
                        alt="Avatar Preview">
                </div>
            </div>
            {{ html()->span('Your password is too short.')->class('text-xs text-red-600 dark:text-red-400') }}



            <div class="flex justify-end px-4 py-3">
                {{ html()->button('Send Message')->type('submit')->class(
                        'px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple',
                    ) }}
            </div>
        </div>
        {{ html()->form()->close() }}
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // Preview image function
        function previewImage(event) {
            var file = event.target.files[0];

            // Validate file type
            var allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            if (!allowedTypes.includes(file.type)) {
                alert('Please upload an image file (PNG, JPG, or JPEG).');
                event.target.value = ''; // Clear the input
                return;
            }

            // Validate file size (3 MB = 3 * 1024 * 1024 bytes)
            var maxSize = 3 * 1024 * 1024; // 3 MB
            if (file.size > maxSize) {
                alert('File size exceeds 3 MB. Please upload a smaller file.');
                event.target.value = ''; // Clear the input
                return;
            }

            // If validation passes, display the image preview
            var reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('avatar-preview');
                preview.src = reader.result;
                //preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } // end -:- previewImage()
    </script>
@endsection
