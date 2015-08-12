<?php
namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSend extends Event
{
    use SerializesModels;
    public $record = [];
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data, $to, $type, $context)
    {
        $this->record['data'] = $data;
        $this->record['to'] = $to;
        $this->record['type'] = $type;
        $this->context['context'] = $context;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
