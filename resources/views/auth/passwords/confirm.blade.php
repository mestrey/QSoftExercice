@extends('layouts.app')

@section('title', 'Подтверждение пароля')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Подтверждение пароля</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p>Пожалуйста, подтвердите свой пароль, прежде чем продолжить.</p>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="mt-8 max-w-md">
                            <div class="grid grid-cols-1 gap-6">

                                <x-input.group for="password_field" error="password" text="Пароль">
                                    <x-input.password id="password_field" value="" name="password" autocomplete="current-password" />
                                </x-input.group>
                                <x-button.orange message="Подтверждение пароля" />
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Забыли пароль?
                                </a>
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