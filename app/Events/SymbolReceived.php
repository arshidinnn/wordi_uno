<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SymbolReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }
}
