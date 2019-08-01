@extends('principal')
<a href="{{ url('/home') }}">Home</a>

@section('cabecalho')
<div>
        <a href="/demolay">
            <img src=" {{ url('/img/cursop_ico.png') }}" >
        </a>
        &nbsp;Editar Cadastro DeMolay
</div>
@stop

@section('conteudo')

<form action="{{ action('DemolayController@salvar', ['id' => $demolay->id]) }}" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type ="hidden" name="editar" value="E">

    <div class="row">
        <div class="col-sm-5">
            <label>Nome: </label>
            <input type="text" name="name" value="{{ $demolay->name }}" class="form-control">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-5">
            <label>Email: </label>
            <input type="text" name="email" value="{{ $demolay->email}}" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
        <label>Grau: </label>
        <select class="form-control" name="id_grau">
            <?php foreach($grau as $dados){ ?>
                <?php if($dados->id == $demolay->id_grau){  ?>
                    <option selected> {{ $dados->id }} - {{ $dados->descricao }} ( {{ $dados->sigla }} ) </option>
                <?php }else {?> 
                    <option> {{ $dados->id }} - {{ $dados->descricao }} ( {{ $dados->sigla }} ) </option>
                <?php } ?>
            <?php } ?>
        </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
        <label>Cargo: </label>
        <select class="form-control" name="id_grau">
            <?php foreach($cargo as $dados){ ?>
                <?php if($dados->id == $demolay->id_cargo){  ?>
                    <option selected> {{ $dados->id }} - {{ $dados->descricao }} ( {{ $dados->sigla }} ) </option>
                <?php }else {?> 
                    <option> {{ $dados->id }} - {{ $dados->descricao }} ( {{ $dados->sigla }} ) </option>
                <?php } ?>
            <?php } ?>
        </select>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-warning btn-block"><b>Alterar</b></button>
</form>
@stop