<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegistredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminViaSlack
{
    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegistredEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegistredEvent $event)
    {
        dump('slack message here');
    }
}
