@extends('layouts.app')

@section('title', 'Проверьте свой эл. адрес')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Проверьте свой эл. адрес</h1>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <p>На ваш адрес электронной почты была отправлена новая ссылка для проверки.</p>
                    </div>
                    @endif

                    <p>Прежде чем приступить к работе, проверьте свою электронную почту на наличие проверочной ссылки.</p>
                    <p>Если вы не получили электронное письмо</p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <x-button.orange message="Нажмите здесь, чтобы отправить ещё" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection