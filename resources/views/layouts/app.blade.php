<x-head/>
<x-nav-link/>
{{--<!-- Notification for Unverified Users -->--}}
{{--@if (Auth::check() && !Auth::user()->hasVerifiedEmail())--}}
{{--    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">--}}
{{--        <p class="font-bold">{{ __('Email Verification Required') }}</p>--}}
{{--        <p>{{ __('Please verify your email address. A verification link has been sent to your email.') }}</p>--}}
{{--        <!-- Reuse Form Component for Resend Verification -->--}}
{{--        <form method="POST" action="{{ route('verification.resend') }}">--}}
{{--            @csrf--}}
{{--            <button type="submit" class="text-indigo-600 hover:text-indigo-500">--}}
{{--                {{ __('Click here to resend the verification email') }}--}}
{{--            </button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endif--}}


<main class="py-auto">
    @yield('content')
</main>

<x-footer/>
