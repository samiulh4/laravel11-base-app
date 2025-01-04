@extends('layouts.web')


@section('favicon')
{{ asset('assets/img/lost-and-found/logo-03.png') }}
@endsection
@section('logo')
{{ asset('assets/img/lost-and-found/logo-01.jpg') }}
@endsection

@section('title')
Laravel Base App | Lost & Found
@endsection
@section('styles')
<style>
.page-hero{
   
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
@endsection

<!-- Common hero -->
@section('hero')
<section class="page-hero pt-16 pb-14" style="background-image: url('{{ asset('assets/img/covers/lost-and-found-02.jpg') }}');">
    <div class="container">
        <div class="text-center">
            <ul
                class="breadcrumb inline-flex h-8 items-center justify-center space-x-2 rounded-3xl bg-theme-light px-4 py-2">
                <li class="leading-none text-dark">
                    <a class="inline-flex items-center text-primary" href="{{ url('/') }}">
                        <svg class="mr-1.5" width="15" height="15" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.1769 15.0588H10.3533V9.41178H5.64744V15.0588H2.82391V6.58825H1.88274V16H14.118V6.58825H13.1769V15.0588ZM6.58862 15.0588V10.353H9.41215V15.0588H6.58862ZM15.8084 6.09225L15.2512 6.85178L8.00038 1.52472L0.749559 6.8499L0.192383 6.09131L8.00038 0.357666L15.8084 6.09225Z"
                                fill="black" />
                        </svg>
                        <span class="text-sm leading-none">Home</span>
                    </a>
                </li>
                <li class="leading-none text-dark">
                    <span class="text-sm leading-none">/ Lost & Found</span>
                </li>
            </ul>
        </div>
        <div class="page-hero-content mx-auto max-w-[768px] text-center">
            <h1 class="mb-5 mt-8">
                Report what you Found or Lost
            </h1>
            <div class="mt-6 flex justify-center items-center space-x-4">
                <!-- Search Input -->
                <form action="{{ url('/search') }}" method="GET" class="flex items-center">
                    <input
                        type="text"
                        name="query"
                        placeholder="Search..."
                        class="w-full max-w-xs px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                    />
                    <button
                        type="submit"
                        class="ml-2 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition"
                    >
                        Search
                    </button>
                </form>

                <!-- Create Post Button -->
                <a href="{{ url('/lost-and-found/post/create') }}" class="rounded-lg bg-primary px-6 py-3 text-white font-medium hover:bg-primary-dark transition">
                    Create Post
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
<!-- end Common hero -->

@section('content')
    <section class="section pt-0">
        <div class="container">
            @include('partials.web.featured-posts-2')
        </div>
    </section>
@endsection
