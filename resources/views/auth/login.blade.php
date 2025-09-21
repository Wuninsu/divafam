@extends('layouts.auth')

@section('content')
    <div class="">
        <div class="text-center mb-4">
            <h3 class="text-body-highlight">Sign In</h3>
            <p class="text-body-tertiary">Get access to your account</p>
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

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Input -->
            <div class="mb-2">
                <label for="login" class="form-label">{{ __('Email, Username or Phone') }}</label>
                <div class="form-icon-container">
                    <input class="form-control form-icon-input @error('login') is-invalid @enderror" id="login"
                        type="text" name="login" value="{{ old('login') }}" placeholder="name@example.com" />
                    <span class="fas fa-envelope text-body fs-9 form-icon"></span>
                </div>
                @error('login')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <div class="form-icon-container position-relative">
                    <input class="form-control form-icon-input pe-6 @error('password') is-invalid @enderror" id="password"
                        type="password" name="password" placeholder="Password" />
                    <span class="fas fa-key text-body fs-9 form-icon"></span>
                    <button class="btn position-absolute top-0 end-0 py-0 px-2 fs-7 text-body-tertiary" type="button"
                        data-password-toggle="data-password-toggle">
                        <span class="uil uil-eye show"></span>
                        <span class="uil uil-eye-slash hide"></span>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="row flex-between-center mb-5">
                <div class="col-auto">
                    <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label mb-o" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="col-auto">
                    @if (Route::has('password.request'))
                        <a class="fs-9 fw-semibold" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Sign In Button -->
            <button type="submit" class="btn btn-success w-100 mb-3">Sign In</button>

            <!-- Sign Up Link -->
            <div class="text-center">
                <a class="fs-9 fw-bold" href="{{ route('register') }}">Create an account</a>
            </div>
        </form>
    </div>
@endsection
