@extends('layout')

@section('cabecalho')
    Temporadas de {{ $temporadaId }}
@endsection

@section('conteudo')
    <form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="POST">
        @csrf
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center bg-primary text-white p-0">
                <div class="col border-right border-white text-left p-2 pl-4">
                    Episódios
                </div>
                {{-- <div class="modal-dialog ">
                </div> --}}
                <div class="col border-left border-white text-right p-2 pr-4">
                    Assistido
                </div>
            </li>

            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#">
                        Episódio {{ $episodio->numero }}
                    </a>
                    <span class="badge badge-success">
                        <input type="checkbox" name="episodios[]" value="{{ $episodio->id }}"
                            {{ $episodio->assistido ? 'checked' : '' }}>
                    </span>
                </li>
            @endforeach
        </ul>
        <div class="m-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>


    </form>
@endsection
