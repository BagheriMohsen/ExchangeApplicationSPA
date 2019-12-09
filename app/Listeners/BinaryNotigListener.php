<?php

namespace App\Listeners;

use App\Events\BinaryNotif;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BinaryNotigListener
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
     * @param  BinaryNotif  $event
     * @return void
     */
    public function handle(BinaryNotif $event)
    {
        return $event->Binary;
    }
}
