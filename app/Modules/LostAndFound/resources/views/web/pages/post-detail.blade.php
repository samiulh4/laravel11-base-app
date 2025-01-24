@extends('layouts.web')


@include('LostAndFound::web.partials.lost-and-found-common-sections')


@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/leaflet/leaflet.css') }}" />
    <style>

    </style>
@endsection

<!-- Common hero -->
@section('hero')
    <section class="page-hero py-16">
        <div class="container">
            <div class="text-center">
                <ul
                    class="breadcrumb inline-flex h-8 items-center justify-center space-x-2 rounded-3xl bg-theme-light px-4 py-2">
                    <li class="leading-none text-dark">
                        <a class="inline-flex items-center text-primary" href="#">
                            <i class="fa-solid fa-location-dot"></i>
                            <span class="text-sm leading-none">Home</span>
                        </a>
                    </li>
                    <li class="leading-none text-dark">
                        <span class="text-sm leading-none">/ Career</span>
                    </li>
                </ul>
            </div>
            <div class="page-hero-content mx-auto max-w-[768px] text-center">
                <h1 class="mb-5 mt-8">{{ $post->lost_and_found_title }}</h1>
            </div>
        </div>
    </section>
@endsection
<!-- end Common hero -->

@section('content')
    <section class="section career-single pt-0">
        <div class="container">
            <div class="row lg:gx-4">
                <div class="lg:col-8">
                    <div class="career-single-content rounded-xl bg-white p-7 shadow-lg lg:px-[20px] lg:py-[20px]">
                        <img class="w-full" style="height: 275px" src="{{ asset($post->lost_and_found_cover) }}"
                            alt="{{ $post->lost_and_found_cover }}'s Cover" />
                    </div>
                    <div class="mt-4 career-single-content rounded-xl bg-white p-7 shadow-lg lg:px-12 lg:py-[60px]">
                        <h5 class="h5">Date/Time</h5>
                        <p>
                            {{ date('Y-M-d', strtotime($post->lost_and_found_date)) }},
                            {{ date('h:i a', strtotime($post->lost_and_found_time)) }}
                        </p>
                        <h5 class="h5">Location</h5>
                        <p>
                            {{ $post->country_name . ',' . $post->lost_and_found_location }}
                        </p>
                        <h5 class="h5">Description</h5>
                        <p class="text-dark">
                            {!! nl2br(e($post->lost_and_found_description)) !!}
                        </p>
                    </div>
                </div>
                <div class="lg:col-4 lg:mt-0 career-single-sidebar mt-8">

                    <div class="mb-8 rounded-xl bg-white py-10 px-7 shadow-lg border border-gray-200">
                        <div class="flex flex-col items-center mb-6">
                            <img class="rounded-full object-cover" style="height: 120px; width: 120px;"
                                src="{{ asset($post->user_avatar) }}" alt="{{ $post->user_name }}'s Avatar" />
                            <h5 class="text-lg font-semibold mt-4">{{ $post->user_name }}</h5>
                        </div>
                        <hr class="my-6 border-gray-300" />
                        <ul class="mt-6 flex justify-between text-dark">
                            <li class="my-1 inline-flex items-center">
                                <a class="inline-flex items-center font-semibold text-blue-500 hover:text-blue-700"
                                    href="#">
                                    <i class="fa-regular fa-comment-dots"></i>&nbsp;Send Message
                                </a>
                            </li>
                            <li class="my-1 inline-flex items-center">
                                <a class="inline-flex items-center font-semibold text-blue-500 hover:text-blue-700"
                                    href="{{ url('/lost-and-found/post/edit/'.$encodeId) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mb-8 rounded-xl bg-white py-10 px-7 shadow-lg border border-gray-200">
                        <div id ="map" class="w-full" style="height: 275px"></div>
                    </div>


                    <div class="mb-8 rounded-xl bg-white py-10 px-7 shadow-lg border border-gray-200">
                        <h5 class="h5">Apply today</h5>
                        <p class="mt-4">
                            Management, investments. You’ll be on arguably the most important
                            position at the company the front lines helping
                        </p>
                        <a class="btn btn-primary mt-6 block w-full" href="#">Apply Now</a>
                    </div>

                    <div class="mb-8 rounded-xl bg-white py-10 px-7 shadow-lg">
                        <h5 class="h5">Lead Brand Designer</h5>
                        <p class="mt-6">
                            Lorem ipsum dolor sit amet consectetur adipiscing elit aliquam lorem
                            amet eget in netus laoreet
                        </p>
                        <ul class="mt-6 flex flex-wrap items-center text-dark">
                            <li class="my-1 mr-8 inline-flex items-center">
                                <i class="fa-regular fa-clock"></i>&nbsp;Full Time
                            </li>
                            <li class="my-1 mr-8 inline-flex items-center">
                                <i class="fa-regular fa-clock"></i>&nbsp;San Francisco
                            </li>
                            <li class="my-1 mr-8">
                                <a class="inline-flex items-center font-semibold text-primary" href="#">Read More
                                    <img class="ml-1.5" src="{{ asset('assets/web/images/icons/arrow-right.svg') }}"
                                        alt="..." />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/plugins/leaflet/leaflet.js') }}"></script>
    <script type="text/javascript">
        // Creating map options with a higher zoom level
        var mapOptions = {
            center: [17.385044, 78.486671], // Latitude and Longitude for Hyderabad, India
            zoom: 15 // Increase zoom level
        };

        // Creating a map object
        var map = new L.map('map', mapOptions);

        // Creating a Layer object (OpenStreetMap tiles)
        var layer = new L.TileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png");

        // Adding layer to the map
        map.addLayer(layer);

        // Adding a marker to the map
        var marker = L.marker([17.385044, 78.486671]).addTo(map);

        // Optionally, adding a popup to the marker
        marker.bindPopup("<b>Hyderabad</b><br>Marker Example").openPopup();
        $(document).ready(function() {

        });
    </script>
@endsection
