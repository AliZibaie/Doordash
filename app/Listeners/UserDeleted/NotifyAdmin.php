<?php

namespace App\Listeners\UserDeleted;

use App\Events\UserDeleted;
use App\Jobs\UserDeleted\NotifyAdminJob;
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
    public function handle(UserDeleted $event): void
    {
        NotifyAdminJob::dispatch($event->getUser());
    }
}
