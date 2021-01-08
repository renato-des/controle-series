<?php

namespace App\Http\Controllers;

use App\Events\NovaSerieEvent;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SeriesFormRequest;
use App\Models\{Episodio, Serie, Temporada};

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(
        SeriesFormRequest $request,
        CriadorDeSerie $criadorDeSerie
    ) {
        $requestSerie = [
            'nome' => $request->nome,
            'qtd_temporadas' => $request->qtd_temporadas,
            'ep_por_temporada' => $request->ep_por_temporada,
            'capa' => $request->capa
        ];

        // dd($request);
        $serie = $criadorDeSerie->criarSerie($requestSerie);

        $eventoNovaSerie = new NovaSerieEvent($requestSerie);

        event($eventoNovaSerie);

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} e suas temporadas e episódios criados com sucesso {$serie->nome}"
            );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $novoNome = $request->nome;
        $serie->nome = $novoNome;
        $serie->save();
    }
}
