@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header" style="background-color: #4B527E; color: white; " align="center" ><h5><b>{{ __('Change Password') }}</div>
                <div class="card">
                        <div class="card-header" style="background-color: #7C81AD; color: white; " align="left" >
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password : ') }} <b style="color: red;">*</b></label>
                                <div class="col-md-6">
                                    <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password"  autocomplete="old_password">

                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password : ') }} <b style="color: red;">*</b></label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password : ') }} <b style="color: red;">*</b></label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="card-body" style="background-color: #7C81AD; color: white; " align="center" >
                                    <button type="submit" class="btn btn-dark" align="center">
                                        <b>{{ __('Reset Password') }}</b>
                                </button>
                                <br>
                                </div> 
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                            
                         </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
