<?php

namespace App\Events;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class BinaryNotif extends Event implements ShouldBroadcast
{
    use  InteractsWithSockets, SerializesModels;
    public $Binary;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($Binary)
    {
        $this->Binary = $Binary;
    }

    public function broadcastOn()
    {
        return ['BinaryNotif'];
    }
}
