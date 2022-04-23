@extends('layouts.auth')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block" style="background-image: url('{{asset("img/bg_3.jpg")}}'); background-position: center left;"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center mb-4">
                                    <p class="text-title-login">login to <a class="navbar-brand text-dark" href="{{ route('home') }}">Rent<span class="text-success">Go</span></a></p>
                                </div>

                                @if ($errors->any())
                                <div class="alert alert-success border-left-success" role="alert">
                                    <ul class="pl-4 my-2">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('Username') }}" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                                    </div>

                                    <div class="form-group mb-4">
                                        @if (Route::has('password.request'))
                                        <div class="text-center">
                                            <a class="text-success" href="{{ route('register') }}">
                                                {{ __('Create account') }}
                                            </a>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success btn-user">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center mt-5">
                                    <a class="text-success" href="{{ route('home') }}">{{ __('back to landing page') }}</a>
                                    <p>v1.1.0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
