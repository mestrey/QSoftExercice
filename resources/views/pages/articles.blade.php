@extends('layouts.inner')

@section('title', 'Все новости')

@section('information')

<div class="space-y-4">
    <a href="{{ route('articles.create') }}" class="inline-flex items-center text-orange hover:opacity-75">
        Создать новые новости
    </a>
    @foreach ($articles as $article)
    <x-article.single :article="$article" />
    @endforeach
</div>
{!! $articles->links() !!}

@endsection