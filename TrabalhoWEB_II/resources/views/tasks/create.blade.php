@extends('principal')
@section('menu')
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="{{ url('/tasks') }}"> Eventos </a>
        </li>
    </ul>
@stop
@section('cabecalho')
<div>
        <img src=" {{ url('/img/user_demolay_ico.png') }}" >
        &nbsp;Registro de Eventos
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
        <script>
            $('.date').datepicker({
                autoclose: true,
                dateFormat: "yy-mm-dd"
            });
</script>
</div>
@stop

@section('conteudo')

<form action="{{ route('tasks.store') }}" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

    <div class="row">
        <div class="col-sm-7">
            <label>Nome do Evento: </label>
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <label>Descricao </label>
            <input type="textarea" name="description" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Data: </label>
            <input type="date" name="task_date" class="form-control"/>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success btn-block">Salvar</button>
</form>
@stop