@extends('layouts.auth')

@section('content')
<div class="">
    <div class="text-center mb-4">
        <h3 class="text-body-highlight">{{ __('Verify Your Email Address') }}</h3>
    </div>

    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
    @endif
    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request
            another') }}</button>.
    </form>
</div>
@endsection