<div>
    <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
    <span class="inline-block pl-1"> / <a href="{{ route('salons') }}" class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
</div>

<div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
    @if(is_null($salons))
    <p>Ошибка авторизации</p>
    @else
    @foreach ($salons as $salon)
    <div class="w-full flex">
        <x-salon.footer :salon="$salon" />
    </div>
    @endforeach
    @endif
</div>