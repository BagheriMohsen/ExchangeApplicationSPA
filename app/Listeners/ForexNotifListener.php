<?php

namespace App\Listeners;

use App\Events\ForexNotifEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ForexNotifListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ForexNotifEvent  $event
     * @return void
     */
    public function handle(ForexNotifEvent $event)
    {
        return $event->Forex;
    }
}
