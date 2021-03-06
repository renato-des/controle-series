@extends('layout')

@section('cabecalho')
Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
<div class="row mb-5">
    <div class="col-md-12 text-center">
        <img src="{{$serie->capa_url}}" class="img rounded" height="350px" width="350px" alt="" srcset="">
    </div>
</div>
<ul class="list-group">
    @foreach($temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/temporadas/{{ $temporada->id }}/episodios">
            Temporada {{ $temporada->numero }}
        </a>
        <span class="badge badge-secondary">
            {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
        </span>
    </li>
    @endforeach
</ul>
@endsection
