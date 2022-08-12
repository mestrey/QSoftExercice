@extends('layouts.app')

@section('title', 'Аккаунт')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Аккаунт</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

    </div>
</main>

@endsection