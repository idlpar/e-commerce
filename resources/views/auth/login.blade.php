@extends('layouts.app')

@section('content')
    <!-- Main Container -->
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <!-- Card for Login Form -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">

            <!-- Reuse Logo Component -->
            <x-logo />

            <!-- Sign In Header -->
            <x-card-header>{{ __('Sign in to your account') }}</x-card-header>

            <!-- Reuse Form Component -->
            <x-form :action="route('login')">

            <!-- Email Address Field (using Input Component) -->
                <x-input type="email" name="email" label="Email address" :value="old('email')" placeholder="Enter your email" />

                <!-- Password Field (using Input Component) -->
                <x-input type="password" name="password" label="Password" placeholder="Enter your password" />

                <!-- Remember Me and Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 focus:ring-offset-1">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">{{ __('Remember me') }}</label>
                    </div>

                    <div>
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">{{ __('Forgot password?') }}</a>
                    </div>
                </div>

                <!-- Sign In Button (using Button Component) -->
                <x-button> {{ __('Sign in') }} </x-button>

                <!-- Or Continue With Section -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="bg-white px-2 text-gray-500">Or continue with</span>
                    </div>
                </div>

                <!-- Social Login Buttons -->
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('social.redirect', 'google') }}" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-100 transition duration-300 ease-in-out hover:shadow-lg text-decoration-none">
                        <img src="{{ asset('logos/google.svg') }}" alt="Google" class="w-5 h-5 mr-2"> Google
                    </a>
                    <a href="{{ route('social.redirect', 'github') }}" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-100 transition duration-300 ease-in-out hover:shadow-lg text-decoration-none">
                        <img src="{{ asset('logos/github.svg') }}" alt="GitHub" class="w-5 h-5 mr-2"> Github
                    </a>
                </div>
            </x-form>

            <!-- Sign Up Link -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">Not a member? <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Register Now!</a></p>
            </div>
        </div>
    </div>
@endsection
