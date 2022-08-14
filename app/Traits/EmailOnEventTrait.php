<?php

namespace App\Traits;

use App\Models\User;
use App\Notifications\ArticleEmailNotification;
use Illuminate\Support\Facades\Notification;

trait EmailOnEventTrait
{
    public static function bootEmailOnEventTrait()
    {
        $admin = User::where('email', env('ADMIN_EMAIL', 'admin@example.com'))
            ->firstOrFail();

        static::updated(function ($item) use ($admin) {
            $name = $item->title ?? $item->name ?? '';
            $slug = $item->slug ?? '';
            Notification::send($admin, new ArticleEmailNotification([
                'title' => 'Редактирование',
                'body' => $name . ' изменен(a)',
                'name' => $name,
                'url' => $slug,
            ]));
        });

        static::deleted(function ($item) use ($admin) {
            $name = $item->title ?? $item->name ?? '';
            $slug = $item->slug ?? '';
            Notification::send($admin, new ArticleEmailNotification([
                'title' => 'Удаление',
                'body' => $name . ' удален(a)',
                'name' => $name,
                'url' => $slug,
            ]));
        });

        static::created(function ($item) use ($admin) {
            $name = $item->title ?? $item->name ?? '';
            $slug = $item->slug ?? '';
            Notification::send($admin, new ArticleEmailNotification([
                'title' => 'Создание',
                'body' => $name . ' создан(a)',
                'name' => $name,
                'url' => $slug,
            ]));
        });
    }
}
