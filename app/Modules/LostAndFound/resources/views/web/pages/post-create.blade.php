@extends('layouts.web')

@include('LostAndFound::web.partials.lost-and-found-common-sections')


@section('styles')
    <!-- Jquery UI CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css') }}" />
    <!-- Jquery Timepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-timepicker/jquery.timepicker.min.css') }}" />
@endsection

@section('content')
    <section class="section pt-0">
        <div class="container">

            {{ html()->form('POST', '/lost-and-found/post/store')->attribute('enctype', 'multipart/form-data')->open() }}

            <div class="row">
                <div class="md:col-6 md:order-1">
                    <div class="form-group mb-5">
                        {{ html()->label('Type')->for('lost_and_found_type')->class('form-label') }}
                        {{ html()->select('lost_and_found_type', $lostAndFoundTypes, null)->class('form-select')->id('lost_and_found_type')->placeholder('Select Lost/Found')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Category')->for('lost_and_found_category_id')->class('form-label') }}
                        {{ html()->select('lost_and_found_category_id', $lostAndFoundCategory, null)->class('form-select')->id('lost_and_found_category_id')->placeholder('Select Category')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Country')->for('lost_and_found_country_id')->class('form-label') }}
                        {{ html()->select('lost_and_found_country_id', $countryList, null)->class('form-select')->id('lost_and_found_country_id')->placeholder('Select Country')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Contact Email')->for('lost_and_found_contact_email')->class('form-label') }}
                        {{ html()->text('lost_and_found_contact_email')->value($authUser->email)->class('form-control')->id('lost_and_found_contact_email')->placeholder('Enter Contact Email')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Contact Mobile No.')->for('lost_and_found_contact_mobile')->class('form-label') }}
                        {{ html()->text('lost_and_found_contact_mobile')->class('form-control')->id('lost_and_found_contact_mobile')->placeholder('Enter Contact Mobile No.')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Contact Telephone No.')->for('lost_and_found_contact_telephone')->class('form-label') }}
                        {{ html()->text('lost_and_found_contact_telephone')->class('form-control')->id('lost_and_found_contact_telephone')->placeholder('Enter Contact Telephone No.') }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Contact Address')->for('lost_and_found_contact_address')->class('form-label') }}
                        {{ html()->text('lost_and_found_contact_address')->class('form-control')->id('lost_and_found_contact_address')->placeholder('Enter Contact Address') }}
                    </div>
                </div>
                <div class="md:col-6 md:order-2">
                    <div class="form-group mb-5">
                        {{ html()->label('Title')->for('lost_and_found_title')->class('form-label') }}
                        {{ html()->text('lost_and_found_title')->class('form-control')->id('lost_and_found_title')->placeholder('Enter Title')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Description')->for('lost_and_found_description')->class('form-label') }}
                        {{ html()->textarea('lost_and_found_description')->class('form-control')->id('lost_and_found_description')->placeholder('Enter Description')->required()->attributes(['rows' => 10, 'cols' => 30]) }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Location')->for('lost_and_found_location')->class('form-label') }}
                        {{ html()->text('lost_and_found_location')->class('form-control')->id('lost_and_found_location')->placeholder('Eg: District/Division, City/Village, Post Code')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Date')->for('lost_and_found_date')->class('form-label') }}
                        {{ html()->text('lost_and_found_date')->class('form-control datepicker')->id('lost_and_found_date')->placeholder('yy-mm-dd')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Time')->for('lost_and_found_time')->class('form-label') }}
                        {{ html()->text('lost_and_found_time')->class('form-control timepicker')->id('lost_and_found_time')->placeholder('HH:mm:ss')->required() }}
                    </div>
                    <div class="form-group mb-5">
                        {{ html()->label('Cover')->for('lost_and_found_cover')->class('form-label') }}

                        {{ html()->file('lost_and_found_cover')->class('form-control')->id('lost_and_found_cover')->attribute('onchange', 'previewImage(event, "lost_and_found_cover_preview")') }}
                        <div class="bg-sky-300">
                            <img id="lost_and_found_cover_preview" class="object-cover"
                                src="{{ asset('assets/img/default/default-image.png') }}" alt="Preview"
                                style="width: 100px;height:100px;"
                                onerror="this.src=`{{ asset('assets/img/default/no-image-available.png') }}`" />
                        </div>
                    </div>
                </div>

            </div>
            <!--./row-->
            <div class="row">
                <div class="md:col-6 md:order-1">
                    <button class="btn btn-primary block w-full" type="submit">Submit</button>
                </div>
            </div>

            {{ html()->form()->close() }}

        </div>
        <!--./container-->
    </section>
@endsection

@section('scripts')
    <!-- Jquery UI JS -->
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Jquery Timepicker JS -->
    <script src="{{ asset('assets/plugins/jquery-timepicker/jquery.timepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: 0,
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true
            });
            $('.timepicker').timepicker({
                timeFormat: 'HH:mm:ss',
                interval: 30
            });
        });
        // Preview image function
        function previewImage(event, preview_id) {
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
                const preview = document.getElementById(preview_id);
                preview.src = reader.result;
                //preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } // end -:- previewImage()
    </script>
@endsection
