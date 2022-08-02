@extends('layouts.app')

@section('content')

<nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
    <a class="hover:text-orange" href="/">Главная</a>
    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
    </svg>
    <span>@yield('title')</span>
</nav>

<main class="flex-1 container mx-auto bg-white flex">
    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
        <aside class="hidden sm:block col-span-1 border-r p-4">
            <nav>
                <ul class="text-sm">
                    <li>
                        <p class="text-xl text-black font-bold mb-4">Информация</p>
                        <ul class="space-y-2">
                            <li><a class="@if (request()->is('about')) text-orange cursor-default @else hover:text-orange @endif" href="/about">О компании</a></li>
                            <li><a class="@if (request()->is('contact')) text-orange cursor-default @else hover:text-orange @endif" href="/contact">Контактная информация</a></li>
                            <li><a class="@if (request()->is('condition')) text-orange cursor-default @else hover:text-orange @endif" href="/condition">Условия продаж</a></li>
                            <li><a class="@if (request()->is('finance')) text-orange cursor-default @else hover:text-orange @endif" href="/finance">Финансовый отдел</a></li>
                            <li><a class="@if (request()->is('client')) text-orange cursor-default @else hover:text-orange @endif" href="/client">Для клиентов</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
            <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
            @if (session('success'))
            <div class="my-4">
                <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
            @endif
            @yield('information')
        </div>
    </div>
</main>

@endsection