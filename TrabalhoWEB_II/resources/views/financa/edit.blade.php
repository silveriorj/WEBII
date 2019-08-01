@extends('principal')
@section('menu')
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="{{ url('/financa') }}"> Caixa </a>
        </li>
    </ul>
@stop

@section('cabecalho')
<div>
        <a href="/demolay">
            <img src=" {{ url('/img/cursop_ico.png') }}" >
        </a>
        &nbsp;Editar Lançamento Financeiro
</div>
@stop

@section('conteudo')

<form class="form" method="post" action="{{ action('FinancaController@update', ['id' => $financa->id]) }}">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

        <div class="row">
            <div class="col-sm-4">
                <input type="text" name="descricao" class="form-control"  value="{{ $financa->descricao }}" placeholder="Descrição">
            </div>

            <div class="col-sm-2">
                <input type="number" min="0.000" max="10000.00" step="0.01" name="valor" value="{{ $financa->valor }}" class="form-control"  placeholder="R$">
            </div>

            <div class="col-sm-2">
                <input type="date" name="data" class="form-control"  value="{{ $lancamento->data }}" placeholder="">
            </div>

            <div class="col-sm-3">
                <select name="pendente" class="form-control">
                    <option disabled="true" selected="true"> </option>
                        <option value="1">PENDENTE</option>
                        <option value="0">FINALIZADO</option>
                </select>
            </div>
            
            
        </div>
        <br>
        <button type="submit" class="btn-block btn-primary">
                <b>Lançar</b>
            </button>
    </form>
@stop