@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <section class="bg-white">
        <div data-slick-carousel>
            <div class="relative banner">
                <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="{{ asset('pictures/test_banner_1.jpg') }}" alt="" title=""></div>
                <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                    <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Астон Мартин, получи секретное Задание</h1>
                    <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                </div>
            </div>
            <div class="relative banner">
                <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="{{ asset('pictures/test_banner_2.jpg') }}" alt="" title=""></div>
                <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                    <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Роллс Ройс, получи Отчество к&nbsp;своему имени</h1>
                    <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                </div>
            </div>
            <div class="relative banner">
                <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="{{ asset('pictures/test_banner_3.jpg') }}" alt="" title=""></div>
                <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                    <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Бентли, получи бейсболку</h1>
                    <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                </div>
            </div>
        </div>
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