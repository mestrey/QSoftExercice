<?php

namespace App\Listeners;

use App\Notifications\ArticleEmailNotification;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Notification;

class ArticleDeletedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $article = $event->article;
        $admin = (new UserRepository)->getAdmin();
        Notification::send($admin, new ArticleEmailNotification([
            'title' => 'Удаление',
            'body' => $article->title . ' удален(a)',
            'name' => $article->title,
            'url' => route('articles.show', $article->slug),
        ]));
    }
}
