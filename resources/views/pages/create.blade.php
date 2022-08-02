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
                    <x-input.group for="title_field" error="title" text="Название новости">
                        <x-input.text id="title_field" name="title" />
                    </x-input.group>
                    <x-input.group for="description_field" error="description" text="Краткое описание новости">
                        <x-input.text id="description_field" name="description" />
                    </x-input.group>
                    <x-input.group for="body_field" error="body" text="Детальное описание">
                        <x-input.textarea id="body_field" name="body" />
                    </x-input.group>
                    <x-input.checkbox name="published" text="Опубликован" />
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