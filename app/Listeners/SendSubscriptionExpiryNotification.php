<?php

namespace App\Listeners;

use App\Events\SubscriptionExpiringEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionExpiryNotification
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
    public function handle(SubscriptionExpiringEvent $event): void
    {
        $user = $event->user;
        Mail::to($user->email)->send(new \App\Mail\SubscriptionExpiryNotification($user));
    }
}