<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Nome de teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serieCriada->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);

        $destroySerie = new RemovedorDeSerie();

        $this->assertEquals($serieCriada->nome, $destroySerie->removerSerie($serieCriada->id));
    }
}
