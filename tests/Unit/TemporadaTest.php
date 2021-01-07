<?php

namespace Tests\Unit;

use App\Models\Episodio;
use App\Models\Temporada;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemporadaTest extends TestCase
{
    use HasFactory;

    /** @var Temporada */
    private $temporada;

    public function setUp(): void
    {
        parent::setUp();
        $temporada = new Temporada();
        $episodio1 = new Episodio();
        $episodio1->assistido = true;
        $episodio2 = new Episodio();
        $episodio2->assistido = false;
        $episodio3 = new Episodio();
        $episodio3->assistido = true;
        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        $this->temporada = $temporada;
    }

    public function testEpisodiosAssistidos()
    {

        $episodiosAssistidos =  $this->temporada->getEpisodiosAssistidos();

        $this->assertCount(2, $episodiosAssistidos);
        foreach ($episodiosAssistidos as $episodio) {
            $this->assertTrue($episodio->assistido);
        }
    }

    public function testBuscaTodosOsEpisodios()
    {
        $episodios = $this->temporada->episodios;
        $this->assertCount(3, $episodios);
    }
}
