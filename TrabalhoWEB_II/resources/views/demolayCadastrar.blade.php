@extends('principal')

<a href="{{ url('/home') }}">Home</a>
@section('cabecalho')
<a href="/demolay">
    <img src=" {{ url('/img/cursop_ico.png') }}" >
</a>
&nbsp;Cadastrar Novo DeMolay
</div>
@stop

@section('conteudo')

<form action="{{ action('DemolayController@salvar', 0) }}" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

    <div class="row">
        <div class="col-sm-7">
            <label>Nome: </label>
            <input type="text" name="name" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <label>Email: </label>
            <input type="text" name="email" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label>Senha: </label>
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
        <label>Grau: </label>
        <select name="id_grau" class="form-control">
            <option disabled="true" selected="true"> </option>
            @foreach ($grau as $dados)
                <option> {{ $dados->id }} - {{ $dados->descricao }} ( {{ $dados->sigla }} ) </option>
            @endforeach
        </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
        <label>Cargo: </label>
        <select name="id_cargo" class="form-control">
            <option disabled="true" selected="true"> </option>
            @foreach ($cargo as $dados)
                <option> {{ $dados->id }} - {{ $dados->descricao }} ( {{ $dados->sigla }} ) </option>
            @endforeach
        </select>
        </div>
        <br>
    </div>
    <br>

    <button type="submit" class="btn btn-success btn-block">Salvar</button>
</form>
@stop
