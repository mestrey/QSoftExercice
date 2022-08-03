@extends('layouts.app')

@section('title', 'Создание новости')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создание новости</h1>
        <form action="{{ route('articles.show', $article) }}" method="POST">
            @csrf
            @method('PUT')
            <x-article.form title="{{ old('title') ?? $article->title }}" description="{{ old('description') ?? $article->description }}" body="{{ old('body') ?? $article->body }}">
                <x-button.orange message="Сохранить" />
            </x-article.form>
        </form>
        <div class="pt-4">
            <form action="{{ route('articles.show', $article) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <x-button.red message="Удалить" />
            </form>
        </div>
    </div>
</main>

@endsection