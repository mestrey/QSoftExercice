@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <section class="bg-white">
        <x-panels.banners :banners="$banners" />
    </section>
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <x-car.homelist :cars="$cars" />
    </section>
    <section class="news-block-inverse px-6 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="{{ route('articles.index') }}" class="inline-block pl-1 text-gray-200 hover:text-orange"><b>Все</b></a></span>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
            <x-panels.articles :articles="$articles" />
        </div>
    </section>
</main>

@endsection