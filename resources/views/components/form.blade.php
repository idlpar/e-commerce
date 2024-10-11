@props(['action'])

<form method="POST" action="{{ $action }}" class="bg-white p-4 rounded-lg shadow-lg w-full max-w-md space-y-4">
    @csrf
    {{ $slot }}
</form>
