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
@extends('layouts.admin')
@section('title', 'Profile')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

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


<form method="POST" action="{{ route('profile.update.process') }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-lg-4 order-lg-2">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">User Photo</h6>
                    <div class="form-group">
                        <label class="" for="btn-img-upload">{{ __('Existing User Photo') }}</label>
                        <img src="{{asset('storage/' . $data->photo)}}" class="w-100">
                    </div>
                    <div class="form-group">
                        <label class="" for="btn-img-upload">{{ __('Upload New User Photo') }}</label>
                        <input type="file" name="foto" class="form-control-file @error('foto') is-invalid @enderror" id="btn-img-upload" onchange="loadFile(event)">
                        @error('foto')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group d-none" id="container-img-banner">
                        <img src="" class="w-100" id="img-banner">
                        <a class="btn btn-secondary mt-3" onclick="reset(event)" id="btn-reset">Reset</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-body">

                    <h6 class="heading-small text-muted mb-4">Update User</h6>

                    <div class="pl-lg-4">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">{{ __('Name') }}<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Name') }}" value="{{ $data->name }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="last_name">{{ __('Last Name') }}<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ $data->last_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="email">{{ __('E-mail') }}<span class="small text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ $data->email }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-primary">{{ __('Update User') }}</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

<form method="POST" action="{{ route('profile.update.password.process') }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-body">

                    <div class="pl-lg-4">

                        <h6 class="heading-small text-muted mb-4">Change Password</h6>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="current_password">{{ __('Old Password') }}<span class="small text-danger">*</span></label>
                                    <input type="password" class="form-control form-control-user" name="current_password" placeholder="{{ __('Current Password') }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="new_password">{{ __('New Password') }}<span class="small text-danger">*</span></label>
                                    <input type="password" class="form-control form-control-user" name="new_password" placeholder="{{ __('New Password') }}" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="new_confirm_password">{{ __('Confirmation Password') }}<span class="small text-danger">*</span></label>
                                    <input type="password" class="form-control form-control-user" name="new_confirm_password" placeholder="{{ __('New Confirm Password') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-primary">{{ __('Change Password') }}</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

@endsection