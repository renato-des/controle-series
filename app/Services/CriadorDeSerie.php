<?php

namespace App\Services;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(
        $serie_rq = []
        // string $nomeSerie,
        // int $qtdTemporadas,
        // int $epPorTemporada
    ): Serie {
        // dd($serie->file);
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $serie_rq['nome'], 'capa' => $serie_rq['capa']]);
        $this->criaTemporadas($serie_rq['qtd_temporadas'], $serie_rq['ep_por_temporada'], $serie);
        DB::commit();

        return $serie;
    }

    /**
     * @param int $qtdTemporadas
     * @param int $epPorTemporada
     * @param $serie
     */
    private function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criaEpisodios($epPorTemporada, $temporada);
        }
    }

    /**
     * @param int $epPorTemporada
     * @param \Illuminate\Database\Eloquent\Model $temporada
     */
    private function criaEpisodios(int $epPorTemporada, \Illuminate\Database\Eloquent\Model $temporada): void
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
