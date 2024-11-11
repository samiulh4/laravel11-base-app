@extends('layouts.guest')

@section('heading')
    Admin Sign In
@endsection
@section('cover')
    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="{{ asset('assets/img/cover/sign-in.jpg') }}"
        alt="..." />
@endsection
@section('content')
    @include('partials.message')

    {{ html()->form('POST', '/sign-in/action')->open() }}



    <label for="email" class="block text-sm mt-4">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        {{ html()->email('email')->id('email')->class(
                'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
            )->placeholder('') }}
    </label>
    @error('email')
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror

    <label for="password" class="block mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">Password</span>
        {{ html()->password('password')->id('password')->class(
                'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input',
            )->placeholder('') }}
    </label>
    @error('password')
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror


    {{ html()->button('Sign In')->type('submit')->class(
            'block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple',
        ) }}

    {{ html()->form()->close() }}
@endsection

@section('page')
    <p class="mt-4">
        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./forgot-password.html">
            Forgot your password?
        </a>
    </p>
    <p class="mt-1">
        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="{{ url('/admin/sign-up') }}">
            Create account
        </a>
    </p>
@endsection
