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
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Reuse Form Component -->
                <x-form :action="route('password.email')">

                    @csrf

                    <!-- Email Address Field (replaced with Input Component) -->
                    <x-input type="email" name="email" label="Email Address" :value="old('email')" placeholder="Enter your email" />

                    <!-- Send Password Reset Link Button (replaced with Button Component) -->
                    <x-button> {{ __('Send Password Reset Link') }} </x-button>

                </x-form>
            </div>
        </div>
    </div>
@endsection
