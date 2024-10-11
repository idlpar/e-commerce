@extends('layouts.app')

@section('content')
    <!-- Main Container -->
    <div class="min-h-screen flex flex-col justify-center items-center bg-gray-100">
        <!-- Card for Email Verification -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg w-full max-w-md space-y-4">

            <!-- Reuse Logo Component -->
            <x-logo />

            <!-- Verify Email Header -->
            <x-card-header>{{ __('Verify Your Email Address') }}</x-card-header>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p>{{ __('If you did not receive the email') }},</p>

                <!-- Reuse Form Component for Resend Verification -->
                <x-form :action="route('verification.resend')" class="inline">
                    @csrf
                    <x-button type="submit" class="btn-link p-0 m-0 align-baseline">
                        {{ __('Click here to request another') }}
                    </x-button>
                </x-form>
            </div>
        </div>
    </div>
@endsection
