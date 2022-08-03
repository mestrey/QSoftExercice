@props(['cars'])
<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
    @foreach ($cars as $car)
    <x-car.single :car="$car" />
    @endforeach
</div>