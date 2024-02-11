<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\CongratulateAdmin;
use App\Mail\CongratulateUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        Mail::to($event->getUser()->email)->send(new CongratulateUser($event->getUser()->name));
    }
}
