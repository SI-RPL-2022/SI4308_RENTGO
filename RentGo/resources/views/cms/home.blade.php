@push('script')
<!-- splide -->
<script src="{{ asset('vendor/splide-3.2.1/dist/js/splide.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('.splide').mount();
    });
</script>
@endpush
@push('css')
<!-- splide css -->
<link rel="stylesheet" href="vendor/splide-3.2.1/dist/css/splide.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css" />
@endpush
@extends('layouts.admin')

@section('title', 'Home')

@section('main-content')
@if (\Session::has('error'))
<div class="alert alert-danger">
    <ul>
        <li>{!! \Session::get('error') !!}</li>
    </ul>
</div>
@endif
<div class="row mb-4">
    <div class="col-lg-12 splide" style="height: 530px;z-index: 0;">
        <div class="splide__track h-100 w-100" style="border-radius: 7px;">
            <ul class="splide__list h-100 w-100">
                <li class="splide__slide w-100">
                    <img src="{{asset('img/coming-soon.jpg')}}" alt="">
                </li>
                <li class="splide__slide">
                    <img src="{{asset('img/coming-soon.jpg')}}" alt="">
                </li>
                <li class="splide__slide">
                    <img src="{{asset('img/coming-soon.jpg')}}" alt="">
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    new Splide('#image-slider').mount();
</script>

@endsection