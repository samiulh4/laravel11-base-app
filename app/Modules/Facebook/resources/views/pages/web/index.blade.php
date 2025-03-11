@extends('Facebook::layouts.master')

@section('content')

<!-- Create Post -->
@include('Facebook::partials.create-post')
<p></p>

@endsection

@section('scripts')
<script>
    // Elements
    const openFacebookPostModalBtn = document.getElementById('openFacebookPostModalBtn');
    const closeFacebookPostModalBtn = document.getElementById('closeFacebookPostModalBtn');
    const facebookPostModal = document.getElementById('facebookPostModal');

    // Open Modal
    openFacebookPostModalBtn.addEventListener('click', () => {
        facebookPostModal.classList.remove('hidden');
    });

    // Close Modal
    closeFacebookPostModalBtn.addEventListener('click', () => {
        facebookPostModal.classList.add('hidden');
    });

    // Close Modal on Outside Click
    facebookPostModal.addEventListener('click', (e) => {
        if (e.target === facebookPostModal) {
            facebookPostModal.classList.add('hidden');
        }
    });
</script>
@endsection