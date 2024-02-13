<?php

namespace App\Providers;

use App\Events\NewSignUpUser;
use App\Events\UserCreated;
use App\Events\UserDeleted;
use App\Jobs\UserCreated\NotifyAdminJob;
use App\Listeners\UserCreated\NotifyAdmin;
use App\Listeners\UserCreated\SendWelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        UserCreated::class => [
            NotifyAdmin::class,
            SendWelcomeEmail::class,
        ],

        UserDeleted::class => [
            \App\Listeners\UserDeleted\NotifyAdmin::class,
//            \App\Listeners\UserDeleted\NotifyAdmin::class,
        ]
    ];
    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
