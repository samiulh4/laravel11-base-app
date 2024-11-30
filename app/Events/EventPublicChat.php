<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Modules\Notification\Models\Chat;
use App\Modules\User\Models\AppUser;

class EventPublicChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;
    public $email;
    public function __construct(Chat $chat, $email)
    {
        $this->chat = $chat;
        $this->email = $email;
    }


    public function broadcastWith(): array
    {
        return [
            'id' => $this->chat->id,
            'description' => $this->chat->description,
            'email' => $this->email,
            'created_at' => $this->chat->created_at->toDateTimeString(),
        ];
    }


    public function broadcastOn(): Channel
    {
        return new Channel('event-public-chat');
    }
}
