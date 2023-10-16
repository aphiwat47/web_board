@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card">
                <div class="card-header" align="center" style="background-color: #7C81AD; width: 100%; color: white;""><h5><b>{{ __('Login') }}</h5></b></div>

                <div class="card-body" style="width: 100%;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if ($message = Session::get('success'))  
                            <div class="alert alert-success alert-block">  
                                <strong>{{ $message }}</strong>  
                            </div>  
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row mb-3" >
                            <label for="email" class="col-md-4 col-form-label text-md-end" ><b>{{ __('Email Address :') }}</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end" ><b>{{ __('Password :') }}</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <b>
                                        {{ __('Remember Me') }}
                                        </b>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0" >
                            <div align="center" >
                                <button type="submit" class="btn btn-dark">
                                    <b>
                                    {{ __('Login') }}
                                    </b>
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
