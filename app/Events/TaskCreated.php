<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel; // Not necessary, when using PrivateChannel
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TaskCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $task;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($task)
    {
        $this->task = $task;
        // dd('o amar moner manusher o sone', $task);
        $this->dontBroadcastToCurrentUser(); /* For this,
            the task will not be broadcast to the current user. */

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new Channel('tasks.'.$this->task->project_id);
        return new PrivateChannel('tasks.'.$this->task->project_id);
    }
}
