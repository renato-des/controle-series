<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NovaSerieEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    // public $nome;
    // public $qtdTemporadas;
    // public $qtdEpisodios;

    public $serie = [];
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($req_serie = [])
    {
        $this->serie = $req_serie;
        // $this->nome = $req_serie['nome'];
        // $this->qtdTemporadas = $req_serie['qtd_temporadas'];
        // $this->qtdEpisodios = $req_serie['ep_por_temporada'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
