@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">
            <!-- Display logo if required -->
            <x-logo />

            <x-card-header>{{ __('Request OTP for Password Reset') }}</x-card-header>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Request OTP Form -->
            <x-form :action="route('otp.password.request')">
                @csrf
                <x-input type="email" name="email" label="Email Address" placeholder="Enter your email" required />
                <x-button> {{ __('Send OTP') }} </x-button>
            </x-form>
        </div>
    </div>
@endsection
