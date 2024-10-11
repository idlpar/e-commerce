@extends('layouts.app')

@section('content')
    <!-- Main Container -->
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <!-- Card for Confirm Password Form -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">

            <!-- Reuse Logo Component -->
            <x-logo />

            <!-- Confirm Password Header -->
            <x-card-header>{{ __('Confirm Password') }}</x-card-header>

            <div class="card-body">
                {{ __('Please confirm your password before continuing.') }}

                <!-- Reuse Form Component -->
                <x-form :action="route('password.confirm')">
                    @csrf

                    <!-- Password Field (replaced with Input Component) -->
                    <x-input type="password" name="password" label="Password" placeholder="Enter your password" autocomplete="current-password" />

                    <!-- Confirm Password Button (replaced with Button Component) -->
                    <x-button> {{ __('Confirm Password') }} </x-button>

                    <!-- Forgot Password Link -->
                    @if (Route::has('password.request'))
                        <div class="mt-4">
                            <a class="text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </x-form>
            </div>
        </div>
    </div>
@endsection
