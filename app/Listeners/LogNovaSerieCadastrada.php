<?php

namespace App\Listeners;

use App\Events\NovaSerieEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogNovaSerieCadastrada implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(NovaSerieEvent $event)
    {
        $nomeSerie = $event->serie['nome'];
        Log::info('Nova série cadastrada: ' . $nomeSerie);
    }
}
