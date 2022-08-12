@extends('layouts.app')

@section('title', 'Сброс пароля')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Сброс пароля</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session('status'))
                    <div class="my-4">
                        <div class="px-4 py-3 leading-normal text-orange-700 bg-orange-100 rounded-lg" role="alert">
                            <p>{{ session('status') }}</p>
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mt-8 max-w-md">
                            <div class="grid grid-cols-1 gap-6">
                                <x-input.group for="email_field" error="email" text="Эл. адрес">
                                    <x-input.text id="email_field" value="{{ old('email') }}" name="email" autocomplete="email" />
                                </x-input.group>
                                <x-button.orange message="Отправить ссылку для сброса пароля" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection