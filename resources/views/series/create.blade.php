@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
    @include('erros', ['errors' => $errors])

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>

            <div class="col col-2">
                <label for="qtd_temporadas">Nº temporadas</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
            </div>

            <div class="col col-2">
                <label for="ep_por_temporada">Ep. por temporada</label>
                <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-12">
                <div class="">
                    <input name="capa" type="file" class="" id="" placeholder="Selecione uma capa">
                </div>
            </div>
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
    <script>
        $("input[type=file]").change(function() {
            // var fieldVal = $(this).val();

            // // alert(fieldVal);
            // // // Change the node's value by removing the fake path (Chrome)
            // // fieldVal = fieldVal.replace("C:\\fakepath\\", "");

            // if (fieldVal != undefined || fieldVal != "") {
            //     $(this).next(".custom-file-label").attr('data-content', fieldVal);
            //     $(this).next(".custom-file-label").text(fieldVal);
            // }
        });

    </script>
@endsection
