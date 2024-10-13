@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">
            <!-- Display logo if required -->
            <x-logo />

            <x-card-header>{{ __('Verify OTP & Reset Password') }}</x-card-header>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- OTP Verification Form -->
            <x-form :action="route('otp.password.verify')">
                @csrf
                <!-- Hidden email input -->
                <input type="hidden" name="email" value="{{ $email }}" />

                <!-- Display OTP and password fields -->
                <x-input type="text" name="otp" label="OTP" placeholder="Enter OTP" required />
                <x-input type="password" name="password" label="New Password" placeholder="Enter new password" required />
                <x-input type="password" name="password_confirmation" label="Confirm New Password" placeholder="Confirm your password" required />
                <x-button> {{ __('Verify OTP & Reset Password') }} </x-button>
            </x-form>
        </div>
    </div>
@endsection
