<?php

namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
class ForexNotifEvent extends Event implements ShouldBroadcast
{
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
        return new PrivateChannel('ForexNotif');
    }
}
