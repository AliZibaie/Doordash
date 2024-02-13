<?php

namespace App\Listeners\UserCreated;

use App\Events\UserCreated;
use App\Jobs\UserCreated\SendWelcomeEmailJob;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        SendWelcomeEmailJob::dispatch($event->getUser());;
    }
}
