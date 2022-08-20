@props(['salon', 'right'])
<div class="w-full flex p-4 @if ($right) justify-end bg-gray-100 @endif">
    @if (!$right)
    <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
        <img src="{{ $salon->imageHref }}" class="w-full h-full object-cover" alt="">
    </div>
    @endif
    <div class="px-4 flex flex-col justify-between leading-normal @if ($right) text-right @endif">
        <div class="mb-8">
            <div class="text-black font-bold text-xl mb-2">{{ $salon->name }}</div>
            <div class="text-base space-y-2">
                <p class="text-gray-400">{{ $salon->address }}</p>
                <p class="text-black">{{ $salon->phone }}</p>
                <p class="text-sm">Часы работы:<br> c {{ $salon->startTime }} до {{ $salon->endTime }}</p>
            </div>
        </div>
    </div>
    @if ($right)
    <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
        <img src="{{ $salon->imageHref }}" class="w-full h-full object-cover" alt="">
    </div>
    @endif
</div>