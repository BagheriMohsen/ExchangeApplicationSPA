<?php

namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use App\Forex;
class ForexNotifEvent extends Event 
{
    use SerializesModels;
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
       return $this->Forex;
    }
}
