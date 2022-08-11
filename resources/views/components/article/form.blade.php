@props(['title', 'description', 'body', 'tags'])
<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <x-input.group for="title_field" error="title" text="Название новости">
            <x-input.text id="title_field" value="{{ $title ?? '' }}" name="title" />
        </x-input.group>
        <x-input.group for="description_field" error="description" text="Краткое описание новости">
            <x-input.text id="description_field" value="{{ $description ?? '' }}" name="description" />
        </x-input.group>
        <x-input.group for="body_field" error="body" text="Детальное описание">
            <x-input.textarea id="body_field" value="{{ $body ?? '' }}" name="body" />
        </x-input.group>
        <x-input.group for="tags_field" error="tags" text="Теги (через запятую)">
            <x-input.text id="tags_field" value="{{ $tags ?? '' }}" name="tags" />
        </x-input.group>
        <x-input.group for="image_field" error="image" text="Изображение">
            <x-input.file id="image_field" name="image" />
        </x-input.group>
        <x-input.checkbox name="published" text="Опубликован" />
        {{ $slot }}
    </div>
</div>