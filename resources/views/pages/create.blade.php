@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создание новости</h1>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <div class="block">
                        <label for="title" class="text-gray-700 font-bold">Название новости</label>
                        <input value="{{ old('title') }}" id="title" name="title" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                        @error('title')
                        <span class="text-xs italic text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="block">
                        <label for="description" class="text-gray-700 font-bold">Краткое описание новости</label>
                        <input value="{{ old('description') }}" id="description" name="description" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="">
                        @error('description')
                        <span class="text-xs italic text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="block">
                        <label for="body" class="text-gray-700">Детальное описание</label>
                        <textarea id="body" name="body" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3"></textarea>
                    </div>
                    <div class="block">
                        <div class="mt-2">
                            <label class="inline-flex items-center cursor-pointer">
                                <input name="published" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" checked="yes">
                                <span class="ml-2">Опубликован</span>
                            </label>
                        </div>
                    </div>
                    <div class="block">
                        <button class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Создать
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

@endsection