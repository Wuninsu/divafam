@extends('layouts.auth')

@section('content')

<div class="">
    <div class="text-center mb-4">
        <h3 class="text-body-highlight">Sign Up</h3>
        <p class="text-body-tertiary">Create your account today</p>
    </div>

    <!-- Social Sign In Buttons -->
    <div class="d-flex justify-content-center gap-3 mb-4">
        <button class="btn btn-phoenix-secondary d-flex align-items-center">
            <span class="fab fa-google text-danger me-2 fs-9"></span>Google
        </button>
        <button class="btn btn-phoenix-secondary d-flex align-items-center">
            <span class="fab fa-facebook text-primary me-2 fs-9"></span>Facebook
        </button>
    </div>

    <!-- Divider with "or use email" -->
    <div class="position-relative mb-4">
        <hr class="bg-body-secondary mt-5 mb-3" />
        <div class="divider-content-center">or use email</div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name Input -->
        <div class="mb-2">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name"
                value="{{ old('name') }}" placeholder="eg. Damba Issah" />
            @error('name')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Email Input -->
        <div class="mb-2">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email"
                value="{{ old('email') }}" placeholder="name@example.com" />
            @error('email')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Username and Phone Input -->
        <div class="mb-2">
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                        type="text" value="{{ old('username') }}" placeholder="Username" />
                    @error('username')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" type="text"
                        value="{{ old('phone') }}" placeholder="Phone Number" />
                    @error('phone')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Password Input -->
        <div class="mb-2">
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label for="password" class="form-label">{{ __('Password')}}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="new-password">
                    @error('password')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        autocomplete="new-password">
                </div>
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="form-check mb-3">
            <input class="form-check-input @error('termsService') is-invalid @enderror" id="termsService"
                type="checkbox" name="termsService" {{ old('termsService') ? 'checked' : '' }} />
            <label class="form-label fs-9 text-transform-none" for="termsService">
                I accept the <a href="{{ route('terms') }}">terms </a>and
                <a href="{{ route('privacy') }}">privacy policy</a>
            </label>
            @error('termsService')
            <div class="invalid-feedback d-block">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Sign Up button -->
        <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>

        <!-- Sign Up Link -->
        <div class="text-center">
            <a class="fs-9 fw-bold" href="{{ route('login') }}">Sign in to an existing account</a>
        </div>
    </form>
</div>
@endsection