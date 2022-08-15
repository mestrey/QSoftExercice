<?php

namespace App\Providers;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use App\Listeners\ArticleCreatedListener;
use App\Listeners\ArticleDeletedListener;
use App\Listeners\ArticleUpdatedListener;
use App\Listeners\SendArticleNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(ArticleCreated::class, [ArticleCreatedListener::class, 'handle']);
        Event::listen(ArticleUpdated::class, [ArticleUpdatedListener::class, 'handle']);
        Event::listen(ArticleDeleted::class, [ArticleDeletedListener::class, 'handle']);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
