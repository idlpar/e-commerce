@props(['type' => 'text', 'name', 'label', 'value' => '', 'placeholder' => ''])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
           placeholder="{{ $placeholder }}"
           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:ring-1 sm:text-sm @error($name) border-red-500 @enderror"
           required autocomplete="{{ $name }}" autofocus>
    @error($name)
    <span class="text-red-500 text-sm" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
