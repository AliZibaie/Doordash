<?php

namespace App\Listeners\UserDeleted;

use App\Events\UserDeleted;
use App\Jobs\UserDeleted\WishUserLuckJog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WishUserLuck
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
        WishUserLuckJog::dispatch($event->getUser());;
    }
}
