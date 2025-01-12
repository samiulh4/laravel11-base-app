@extends('layouts.web')

@include('LostAndFound::web.partials.lost-and-found-common-sections')


@section('styles')
@endsection

@section('content')
    <section class="section pt-0">
        <div class="container">
            {{ html()->form('POST', '/sign-in/action')->open() }}

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
                        <label class="form-label" for="reason">reason/purpose</label>
                        <select name="reason" id="reason" class="form-select" required>
                            <option value="">Select reason/purpose</option>
                            <option value="investment plane">Investment Plan</option>
                            <option value="investment plane-2">Investment Plan 2</option>
                            <option value="investment plane-3">Investment Plan 3</option>
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label class="form-label" for="message">Message Here</label>
                        <textarea class="form-control h-[150px]" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <input class="btn btn-primary block w-full" type="submit" value="Send Message" />

                </div>
            </div>
            <!--./row-->

            {{ html()->form()->close() }}

        </div>
        <!--./container-->
    </section>
@endsection
