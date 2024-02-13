<?php

namespace App\Listeners\UserCreated;

use App\Events\UserCreated;
use App\Jobs\UserCreated\NotifyAdminJob;

class NotifyAdmin
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
        NotifyAdminJob::dispatch($event->getUser());
    }
}
