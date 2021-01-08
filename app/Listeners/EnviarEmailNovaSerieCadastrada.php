<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\NovaSerieEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmailNovaSerieCadastrada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerieEvent  $event
     * @return void
     */
    public function handle(NovaSerieEvent $event)
    {
        $users = User::all();
        foreach ($users as $indice => $user) {
            $multiplicador = $indice + 1;
            $email = new \App\Mail\NovaSerie($event->serie);
            $email->subject = 'Nova Série Adicionada ' . $event->serie['nome'];
            $quando = now()->addSecond($multiplicador * 10);
            \Illuminate\Support\Facades\Mail::to($user)->later(
                $quando,
                $email
            );
        }
    }
}
