@extends('layouts.guest')

@section('heading')
    Admin Sign Up
@endsection
@section('cover')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('assets/img/cover/sign-up.jpg') }}"
        alt="..." />
@endsection
@section('content')
    {{ html()->form('POST', '/update-url')->open() }}

    <label for="name" class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        {{ html()->text('name')->id('name')->class(
                'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
            )->placeholder('Jane Doe') }}
    </label>

    <label for="email" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        {{ html()->email('email')->id('email')->class(
                'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
            )->placeholder('example@gmail.com') }}
    </label>
    <label for="password" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Password</span>
        {{ html()->password('password')->id('password')->class(
                'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
            )->placeholder('***************') }}
    </label>
    <label for="confirm_password" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Confirm password</span>
        {{ html()->password('confirm_password')->id('confirm_password')->class(
                'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
            )->placeholder('***************') }}
    </label>
    <div class="flex mt-6 text-sm">
        <label for="agree" class="flex items-center dark:text-gray-400">
            {{ html()->checkbox('agree')->id('agree')->class(
                    'text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray',
                ) }}
            <span class="ml-2">
                I agree to the <span class="underline">privacy policy</span>
            </span>
        </label>
    </div>
    {{ html()->button('Sign Up')->type('submit')->class(
            'block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple',
        ) }}

    {{ html()->form()->close() }}
@endsection

@section('page')
    <p class="mt-4">
        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./login.html">
            Already have an account? Sign In
        </a>
    </p>
@endsection
