@extends('principal')

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@stop

@section('conteudo')

<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body">
            <h3> Deseja mesmo remover o registro do <b> 
            @foreach($demolay as $data)
                @if($data->id == $registro->id)
                    {{ $data->name }}
                @endif
            @endforeach</b>? <br><br></h3>
        </div>
        <div class="modal-footer">
            <a href="{{ action('FrequenciaController@confirmar', $registro->id) }}" type="button" class="btn btn-success">Sim</a>
            <a href="{{ action('FrequenciaController@listar') }}" type="button" class="btn btn-danger">Não</a>
        </div>
    </div>
</div>
@stop
