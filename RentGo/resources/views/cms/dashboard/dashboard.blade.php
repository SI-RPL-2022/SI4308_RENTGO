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
<div class="row bg-white p-3">
    <!-- <div class="row"> -->
    <div class="col-md-8 mb-4">
        <div class="card">
            {!! $chartArea->container() !!}
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card px-3" style="height: 100%;">
            <h4 class="font-weight-bold mb-5 mt-3">Post Paling Banyak <br /> Dikunjungi</h4>
            <div class="mb-5 d-flex">
                <img src="{{asset('img/dummy.jpg')}}" style="object-fit: cover; border-radius: 10px;" width="140px" height="150px" class="mr-3" alt="">
                <div class="flex-fill justify-content-center flex-column d-flex">
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                        </div>
                    </div>
                    <br />
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-5 d-flex">
                <img src="{{asset('img/dummy.jpg')}}" style="object-fit: cover; border-radius: 10px;" width="140px" height="150px" class="mr-3" alt="">
                <div class="flex-fill justify-content-center flex-column d-flex">
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                        </div>
                    </div>
                    <br />
                    <div>
                        <label> Progress Bar </label>
                        <br />
                        <div class="progress">
                            <div class="progress-bar <strong>progress-bar-striped</strong> bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <div class="col-md-4 mb-4">
        <div class="card">
            {!! $chartBar->container() !!}
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            {!! $chartDonut->container() !!}
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            {!! $chartExpense->container() !!}
        </div>
    </div>


        <div class="col-md-12">
        <div class="card">
            {!! $chartTransaction->container() !!}
        </div>
        </div>
</div>

<script src="{{ $chartArea->cdn() }}"></script>
{{ $chartArea->script() }}
<script src="{{ $chartDonut->cdn() }}"></script>
{{ $chartDonut->script() }}
<script src="{{ $chartBar->cdn() }}"></script>
{{ $chartBar->script() }}
<script src="{{ $chartExpense->cdn() }}"></script>
{{ $chartExpense->script() }}
<script src="{{ $chartTransaction->cdn() }}"></script>
{{ $chartTransaction->script() }}
@endsection