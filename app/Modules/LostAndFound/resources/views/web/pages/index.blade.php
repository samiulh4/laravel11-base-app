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
        .page-hero {

            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection

<!-- Common hero -->
@section('hero')
    <section class="page-hero pt-16 pb-14"
        style="background-image: url('{{ asset('assets/img/covers/lost-and-found-02.jpg') }}');">
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
                        <input type="text" name="query" placeholder="Search..."
                            class="w-full max-w-xs px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" />
                        <button type="submit"
                            class="ml-2 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition">
                            Search
                        </button>
                    </form>

                    <!-- Create Post Button -->
                    <a href="{{ url('/lost-and-found/post/create') }}"
                        class="rounded-lg bg-primary px-6 py-3 text-white font-medium hover:bg-primary-dark transition">
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
            <div class="category-filter mb-10 mt-3 rounded-xl bg-[#EEEEEE] px-4">
                <ul class="filter-list">
                    <li>
                        <a class="filter-btn filter-btn-active btn btn-sm" href="#">All Categories</a>
                    </li>
                    @foreach ($categories as $decodedCatId => $catName)
                        <li>
                            <a class="filter-btn btn btn-sm" href="#">{{ $catName }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <h2 class="h4 mb-4">Featured Posts</h2>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="mb-8 md:col-6 lg:col-4">
                        <div class="card">
                            <img class="card-img" style="height: 210px;" src="{{ asset($post->lost_and_found_cover) }}"
                                alt="..." />
                            <div class="card-content">
                                <div class="card-tags">
                                    <a class="tag" href="#">{{ $post->lost_and_found_type }}</a>
                                </div>
                                <h3 class="h4 card-title">
                                    <a
                                        href="{{ url('/lost-and-found/post/detail/' . $post->lost_and_found_slug . '/' . \App\Libraries\EncryptionFunction::encodeId($post->id)) }}">
                                        {{ $post->lost_and_found_title }}
                                    </a>
                                </h3>
                                <p>
                                    {{ Str::limit($post->lost_and_found_description, 50, '...') }}
                                </p>
                                <div class="card-footer mt-6 flex space-x-4">
                                    <span class="inline-flex items-center text-xs text-[#666]">
                                        <svg class="mr-1.5" width="14" height="16" viewBox="0 0 14 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.5 2H11V0.375C11 0.16875 10.8313 0 10.625 0H9.375C9.16875 0 9 0.16875 9 0.375V2H5V0.375C5 0.16875 4.83125 0 4.625 0H3.375C3.16875 0 3 0.16875 3 0.375V2H1.5C0.671875 2 0 2.67188 0 3.5V14.5C0 15.3281 0.671875 16 1.5 16H12.5C13.3281 16 14 15.3281 14 14.5V3.5C14 2.67188 13.3281 2 12.5 2ZM12.3125 14.5H1.6875C1.58438 14.5 1.5 14.4156 1.5 14.3125V5H12.5V14.3125C12.5 14.4156 12.4156 14.5 12.3125 14.5Z"
                                                fill="#939393" />
                                        </svg>
                                        {{ date('Y-M-d', strtotime($post->lost_and_found_date)) }}
                                    </span>
                                    <span class="inline-flex items-center text-xs text-[#666]">
                                        <svg class="mr-1.5" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.65217 0C3.42496 0 0 3.58065 0 8C0 12.4194 3.42496 16 7.65217 16C11.8794 16 15.3043 12.4194 15.3043 8C15.3043 3.58065 11.8794 0 7.65217 0ZM7.65217 14.4516C4.24264 14.4516 1.48107 11.5645 1.48107 8C1.48107 4.43548 4.24264 1.54839 7.65217 1.54839C11.0617 1.54839 13.8233 4.43548 13.8233 8C13.8233 11.5645 11.0617 14.4516 7.65217 14.4516ZM9.55905 11.0839L6.93941 9.09355C6.84376 9.01935 6.78822 8.90323 6.78822 8.78065V3.48387C6.78822 3.27097 6.95484 3.09677 7.15849 3.09677H8.14586C8.34951 3.09677 8.51613 3.27097 8.51613 3.48387V8.05484L10.5773 9.62258C10.7439 9.74839 10.7778 9.99032 10.6575 10.1645L10.0774 11C9.95708 11.171 9.72567 11.2097 9.55905 11.0839Z"
                                                fill="#939393" />
                                        </svg>
                                        {{ $post->lost_and_found_location }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
