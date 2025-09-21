@extends('layouts.auth')

@section('content')
<div class="">
    <div class="text-center mb-4">
        <h3 class="text-body-highlight">{{ __('Reset Password') }}</h3>
        <p class="text-body-tertiary">{{__('Enter email used during account creation')}}</p>
    </div>

    <form method="POST" method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email Input -->
        <div class="mb-2">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <div class="form-icon-container">
                <input class="form-control form-icon-input @error('email') is-invalid @enderror" id="email" type="text"
                    name="email" value="{{ old('email') }}" placeholder="name@example.com" />
                <span class="fas fa-envelope text-body fs-9 form-icon"></span>
            </div>
            @error('email')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>



        <!-- Sign In Button -->
        <button type="submit" class="btn btn-success w-100 mb-3">{{ __('Send Password Reset Link') }}</button>

        <!-- Sign Up Link -->
        <div class="text-center">
            <a class="fs-9 fw-bold" href="{{ route('login') }}">Login</a>
        </div>
    </form>
</div>
@endsection