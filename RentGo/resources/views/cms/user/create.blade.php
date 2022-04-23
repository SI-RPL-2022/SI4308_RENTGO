@extends('layouts.admin')
@section('title', 'Create User')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Create User') }}</h1>

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

<form method="POST" action="{{ route('user.create.process') }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-body">

                    <div class="pl-lg-4">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">{{ __('Name') }}<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="last_name">{{ __('Last Name') }}<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="email">{{ __('E-mail') }}<span class="small text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="no_hp">{{ __('Phone Number') }}<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="no_hp" placeholder="{{ __('Phone Number') }}" value="{{ old('no_hp') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="umur">{{ __('Age') }}<span class="small text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-user" name="umur" placeholder="{{ __('Age') }}" value="{{ old('umur') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">{{ __('Password') }}<span class="small text-danger">*</span></label>
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">{{ __('Confirmation Password') }}<span class="small text-danger">*</span></label>
                                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <a href="{{ url()->previous() }}" class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

@endsection