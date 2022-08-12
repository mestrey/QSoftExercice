@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Регистрация</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mt-8 max-w-md">
                            <div class="grid grid-cols-1 gap-6">
                                <x-input.group for="name_field" error="name" text="Имя">
                                    <x-input.text id="name_field" value="{{ old('name') }}" name="name" autocomplete="name" />
                                </x-input.group>
                                <x-input.group for="email_field" error="email" text="Эл. адрес">
                                    <x-input.text id="email_field" value="{{ old('email') }}" name="email" autocomplete="email" />
                                </x-input.group>
                                <x-input.group for="password_field" error="password" text="Пароль">
                                    <x-input.password id="password_field" value="{{ old('password') }}" name="password" autocomplete="new-password" />
                                </x-input.group>
                                <x-input.group for="password_confirmation_field" error="password_confirmation" text="Повтор пароля">
                                    <x-input.password id="password_confirmation_field" value="" name="password_confirmation" autocomplete="new-password" />
                                </x-input.group>
                                <x-button.orange message="Регистрация" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection