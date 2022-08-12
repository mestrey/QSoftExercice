@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Авторизация</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mt-8 max-w-md">
                            <div class="grid grid-cols-1 gap-6">
                                <x-input.group for="email_field" error="email" text="Эл. адрес">
                                    <x-input.text id="email_field" value="{{ old('email') }}" name="email" autocomplete="email" />
                                </x-input.group>
                                <x-input.group for="password_field" error="password" text="Пароль">
                                    <x-input.password id="password_field" value="{{ old('password') }}" name="password" autocomplete="current-password" />
                                </x-input.group>
                                <x-input.checkbox name="remember" text="Запомнить меня" />
                                <x-button.orange message="Войти" />
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">Забыли пароль?</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection