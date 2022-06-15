@push('script')
    <script>
        let urlPath;
        let loadFile = function(event) {
            let output = document.getElementById('img-banner');
            let container = document.getElementById('container-img-banner');
            urlPath = URL.createObjectURL(event.target.files[0]);
            output.src = urlPath;
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
            container.classList.remove('d-none');
            container.classList.add('d-block');
        };

        let reset = function(event) {
            const output = document.getElementById('img-banner');
            const container = document.getElementById('container-img-banner');
            output.src = '';
            container.classList.remove('d-block');
            container.classList.add('d-none');
            document.getElementById('btn-img-upload').value = "";
        }
    </script>
@endpush

@extends('layouts.admin')
@section('title', 'Update Order')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Update Order') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('order.update.process', $data->id) }}" autocomplete="off"
        enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-lg-6 order-lg-2">

                <div class="card shadow mb-4">

                    <div class="card-body">
                        <h1>User Detail</h1>
                        <hr>
                        <p><span><b> First Name : </b></span>{{ $user->name }}</p>
                        <p><span><b> Last Name : </b></span>{{ $user->last_name }}</p>
                        <p><span><b> Email : </b></span>{{ $user->email }}</p>
                        <p><span><b> Handphone : </b></span>{{ $user->no_hp }}</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-6 order-lg-1">

                <div class="card shadow mb-4">

                    <div class="card-body">

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>Order Detail</h1>
                                    <hr>
                                    <p><span><b> Product Name : </b></span>{{ $product->title }}</p>
                                    <p><span><b> Start Date : </b></span>{{ $data->start }}</p>
                                    <p><span><b> Duration : </b></span>{{ $data->duration }}</p>
                                    <p><span><b> Status : </b></span>{{ $data->status }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                                    <button type="submit" class="btn btn-primary">{{ __('Sudah Bayar') }}</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

@endsection
