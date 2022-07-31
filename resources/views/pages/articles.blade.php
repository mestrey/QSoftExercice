@extends('layouts.inner')

@section('title', 'Все новости')

@section('information')

<div class="space-y-4">
    @foreach ($articles as $article)
    <x-article :article="$article" />
    @endforeach
</div>

@endsection