@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создание новости</h1>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <x-article.form title="{{ old('title') }}" description="{{ old('description') }}" body="{{ old('body') }}">
                <x-button.orange message="Создать" />
            </x-article.form>
        </form>
    </div>
</main>

@endsection