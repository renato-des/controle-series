<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaSerie extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $qtdTemporadas;
    public $qtdEpisodios;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($req_serie = [])
    {
        $this->nome = $req_serie['nome'];
        $this->qtdTemporadas = $req_serie['qtd_temporadas'];
        $this->qtdEpisodios = $req_serie['ep_por_temporada'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.serie.nova-serie');
    }
}
