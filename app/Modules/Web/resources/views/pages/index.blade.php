@extends('layouts.web')

@section('hero')
    @include('partials.web.hero')
@endsection

@section('content')
    <section class="section pt-0">
        <div class="container">
            @include('partials.web.featured-posts-1')
            @include('partials.web.featured-posts-2')
        </div>
    </section>
@endsection
