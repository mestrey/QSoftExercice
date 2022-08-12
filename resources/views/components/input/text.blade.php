@props(['id', 'value', 'name', 'autocomplete'])
<input autocomplete="{{ $autocomplete ?? '' }}" value="{{ $value }}" id="{{ $id }}" name="{{ $name }}" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">