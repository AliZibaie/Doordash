<?php

namespace App\Listeners\UserUpdated;

use App\Events\UserUpdated;
use App\Jobs\UserUpdated\NotifyAdminJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
    public function handle(UserUpdated $event): void
    {
        NotifyAdminJob::dispatch($event->getUser());
    }
}
