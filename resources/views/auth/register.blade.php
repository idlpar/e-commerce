@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex justify-center items-center bg-gray-100">
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">
            <!-- Reuse Logo Component -->
            <x-logo />
            <!-- Card Header -->
            <x-card-header>{{ __('Register Now!') }}</x-card-header>
            <!-- Reuse Form Component -->
            <x-form :action="route('register')">

                <!-- Name Field (Using Input Component with Label) -->
                <x-input type="text" name="name" label="Name" :value="old('name')" placeholder="Enter your name" />

                <!-- Email Address Field -->
                <x-input type="email" name="email" label="Email Address" :value="old('email')" placeholder="Enter your email" />

                <!-- Password Field -->
                <x-input type="password" name="password" label="Password" placeholder="Enter your password" />

                <!-- Confirm Password Field -->
                <x-input type="password" name="password_confirmation" label="Confirm Password" placeholder="Confirm your password" />

                <!-- Radio Button for Accepting Terms and Conditions -->
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="terms" id="terms" required class="form-radio h-4 w-4 text-indigo-600 focus:ring-indigo-500">
                    <label for="terms" class="block text-sm text-gray-900">
                        {{ __('I accept the') }} <a href="#" class="text-indigo-600 hover:underline">{{ __('Terms and Conditions') }}</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-4">
                    <x-button>{{ __('Register') }}</x-button>
                </div>

            </x-form>
            <!-- Sign Up Link -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">Already registered with us! <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Log In</a></p>
            </div>
        </div>
    </div>
@endsection
