@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('img/bg_3.jpg') }}');"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                    <div class="col-md-9 ftco-animate pb-5">
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                        class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i
                                    class="ion-ios-arrow-forward"></i></span></p>
                        <h1 class="mb-3 bread">Choose Your Car</h1>
                    </div>
                </div>
            </div>
        </section>


        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                    @foreach ($data as $dt)
                        <div class="col-md-4">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end"
                                    style="background-image: url('{{ asset('storage/' . $dt->photo) }}');"></div>
                                <div class="text">
                                    <h2 class="mb-0" style="color: #000"><a
                                            href="{{ route('detailCar', $dt->id) }}">{{ $dt->title }}</a></h2>
                                    <div class="d-flex mb-3">
                                        <p class="price ml-auto">{{ "Rp " . number_format($dt->price,2,',','.') }} <span>/day</span></p>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ route('detailCar', $dt->id) }}" class="btn btn-primary py-2 mr-1">Book now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
