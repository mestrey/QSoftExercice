@props(['for', 'error', 'text'])
<div class="block">
    <label for="{{ $for }}" class="text-gray-700 font-bold">{{ $text }}</label>
    {{ $slot }}
    @error($error)
    <span class="text-xs italic text-red-600">{{ $message }}</span>
    @enderror
</div>