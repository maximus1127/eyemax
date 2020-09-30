<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChartSignal implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public $size;
     public $numbers;
     public $numbers2;
     public $numbers3;
     public $numbers4;
     public $numbers5;
     public $numbers6;
     public $location;
    public function __construct($size, $location)
    {

        $this->size = $size;
        $this->numbers = str_shuffle(implode('', array_rand(range(0, 9), 5)));
        $this->numbers2 = str_shuffle(implode('', array_rand(range(0, 9), 5)));
        $this->numbers3 = str_shuffle(implode('', array_rand(range(0, 9), 5)));
        $this->numbers4 = str_shuffle(implode('', array_rand(range(0, 9), 5)));
        $this->numbers5 = str_shuffle(implode('', array_rand(range(0, 9), 5)));
        $this->numbers6 = str_shuffle(implode('', array_rand(range(0, 9), 5)));
        $this->location = $location;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel(strval($this->location));
    }
}
