@extends('layouts.auth')

@section('content')
<div class="">
    <div class="text-center mb-4">
        <h3 class="text-body-highlight">{{ __('Confirm Password') }}</h3>
        <p class="text-body-tertiary">{{__('Please confirm your password before continuing.')}}</p>
    </div>

    <form method="POST" method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <!-- Email Input -->
        <div class="mb-2">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <div class="form-icon-container">
                <input class="form-control form-icon-input @error('password') is-invalid @enderror" id="password"
                    type="text" name="password" value="{{ old('password') }}" autocomplete="current-password" />
                <span class="fas fa-key text-body fs-9 form-icon"></span>
            </div>
            @error('password')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>



        <!-- Sign In Button -->
        <button type="submit" class="btn btn-success w-100 mb-3">{{ __('Confirm Password') }}</button>

        <!-- Sign Up Link -->
        <div class="text-center">
            <a class="fs-9 fw-bold" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}</a>
        </div>
    </form>
</div>
@endsection