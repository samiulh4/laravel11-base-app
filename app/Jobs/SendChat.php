<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Modules\Notification\Models\Chat;
use App\Events\ChatSent;

class SendChat implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Chat $chat)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ChatSent::dispatch([
            'id' => $this->chat->id,
            'description' => $this->chat->description,
            'created_by' => $this->chat->created_by,
            'created_at' => $this->chat->created_at,
        ]);
    }
}
