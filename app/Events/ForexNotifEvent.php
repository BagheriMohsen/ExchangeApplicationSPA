<?php

namespace App\Events;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class ForexNotifEvent extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $Forex;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($Forex)
    {
        $this->Forex = $Forex;
    }

    public function broadcastOn()
    {
        return ['ForexNotif'];
    }
}
