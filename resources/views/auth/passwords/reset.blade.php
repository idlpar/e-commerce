@extends('layouts.app')

@section('content')
    <!-- Main Container -->
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <!-- Card for Reset Password Form -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">

            <!-- Reuse Logo Component -->
            <x-logo />

            <!-- Reset Password Header -->
            <x-card-header>{{ __('Reset Password') }}</x-card-header>

            <div class="card-body">
                <!-- Reuse Form Component -->
                <x-form :action="route('password.update')">

                    @csrf

                    <!-- Hidden Token Input -->
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Email Address Field (replaced with Input Component) -->
                    <x-input type="email" name="email" label="Email Address" :value="$email ?? old('email')" placeholder="Enter your email" />

                    <!-- Password Field (replaced with Input Component) -->
                    <x-input type="password" name="password" label="Password" placeholder="Enter your password" />

                    <!-- Confirm Password Field (replaced with Input Component) -->
                    <x-input type="password" name="password_confirmation" label="Confirm Password" placeholder="Confirm your password" />

                    <!-- Reset Password Button (replaced with Button Component) -->
                    <x-button> {{ __('Reset Password') }} </x-button>

                </x-form>
            </div>
        </div>
    </div>
@endsection
