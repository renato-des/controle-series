<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;

class RemovedorDeSerieTest extends TestCase
{
    /** @var Serie */
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie(
            'Nome da série',
            1,
            1
        );

        echo 'Serie:' . $this->serie;
    }

    // public function testRemoverUmaSerie()
    // {
    //     $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
    //     $removedorDeSerie = new RemovedorDeSerie();
    //     $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);
    //     $this->assertIsString($nomeSerie);
    //     $this->assertEquals('Nome da série', $this->serie->nome);
    //     $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    // }
}
