@extends('layouts.auth')

@section('content')
<div class="">
    <div class="text-center mb-4">
        <h3 class="text-body-highlight">{{ __('Reset Password') }}</h3>
    </div>

    <form method="POST" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token ?? '' }}">
        <div class="mb-2">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <div class="form-icon-container">
                <input class="form-control form-icon-input @error('email') is-invalid @enderror" id="email" type="text"
                    name="email" value="{{ $email ?? old('email') }}" placeholder="name@example.com" />
                <span class="fas fa-envelope text-body fs-9 form-icon"></span>
            </div>
            @error('email')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <!-- Email Input -->
        <div class="mb-2">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <div class="form-icon-container">
                <input class="form-control form-icon-input @error('password') is-invalid @enderror" id="password"
                    type="text" name="password" autocomplete="new-password" />
                <span class="fas fa-key text-body fs-9 form-icon"></span>
            </div>
            @error('password')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="mb-2">
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
            <div class="form-icon-container">
                <input class="form-control form-icon-input @error('password_confirmation') is-invalid @enderror"
                    id="password-confirm" type="text" name="password_confirmation" autocomplete="new-password" />
                <span class="fas fa-key text-body fs-9 form-icon"></span>
            </div>
        </div>

        <!-- Sign In Button -->
        <button type="submit" class="btn btn-success w-100 mb-3">{{ __('Reset Password') }}</button>
    </form>
</div>
@endsection