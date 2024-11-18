@extends('layouts.admin')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Forms
        </h2>
        {{ html()->form('POST', '/admin/document/upload-file/store')->attribute('enctype', 'multipart/form-data')->open() }}
        <label for="upload_file" class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Upload File</span>
            {{ html()->file('upload_file')->class(
                    'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
                ) }}
        </label>
        {{ html()->button('Upload')->type('submit')->class(
                'block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple',
            ) }}
        {{ html()->form()->close() }}
    </div>
@endsection
