<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegistredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeNewCustomerListener implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegistredEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegistredEvent $event)
    {

        dump('Email sent to ' . $event->customer->email);
    }
}
