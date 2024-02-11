<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\CongratulateAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        Mail::to('alizibaie1380@gmail.com')->send(new CongratulateAdmin($event->getUser()->email));
    }
}
