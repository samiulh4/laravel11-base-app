@extends('layouts.admin')

@section('content')
    <div class="container px-6 mx-auto grid">
        <!-- CTA -->
        <a class="my-6 flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
            href="https://github.com/estevanmaito/windmill-dashboard">
            <span>&LeftArrow; Back</span>
        </a>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Message Create
        </h4>

        {{ html()->form('POST', '/admin/document/upload-file/store')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{ html()->label('User')->for('user')->class('block mt-4 text-sm text-gray-700 dark:text-gray-400') }}
            {{ html()->select('user_id')->options($users)->class(
                    'block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray border-red-600',
                ) }}
            {{ html()->span('Your password is too short.')->class('text-xs text-red-600 dark:text-red-400') }}

            {{ html()->label('Message')->for('message')->class('block mt-4 text-sm text-gray-700 dark:text-gray-400') }}
            {{ html()->textarea('message')->class(
                    'block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray border-red-600',
                )->attribute('rows', 3)->placeholder('Enter some long form content.') }}
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
