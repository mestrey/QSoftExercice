@extends('layouts.inner')

@section('title', 'Салоны')

@section('information')

<div class="space-y-4 max-w-4xl">
    @if(is_null($salons))
    <p>Ошибка авторизации</p>
    @else
    @foreach ($salons as $salon)
    <x-salon.list :salon="$salon" right="{{ $loop->index % 2 == 1 }}" />
    @endforeach
    @endif
</div>

<div class="my-4 space-y-4 max-w-4xl">
    <hr>
    <p class="text-black text-2xl font-bold mb-4">Салоны на карте</p>
    <div class="bg-gray-200">
        Карта с салонами
    </div>
</div>

@endsection