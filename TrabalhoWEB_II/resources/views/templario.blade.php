@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src=" {{ url('/img/logo_home.jpg') }}" >
        &nbsp;Menu Principal
</div>
@stop

@section('conteudo')

@if(Auth::user()->type==3)
    <div class='row'>
        <div class="col-md-3 col-md-offset-1" style="text-align: center">
            <a href="/gestao">
                <img src="{{ url('/img/logo_home.jpg') }}">
            </a>
            <h3> Gestão </h3>
        </div>

        <div class='col-md-3' style="text-align: center">
            <a href="/demolay">
                <img src="{{ url('/img/user_demolay.jpg') }}">
            </a>
            <h3> DeMolay </h3>
        </div>

        <div class='col-md-3' style="text-align: center">
            <a href="/relatorio">
                <img src="{{ url('/img/relatorio_ico.png') }}">
            </a>
            <h3> Relatório </h3>
        </div>
    </div>
@endif

@if(Auth::user()->type==0)
    <div class='row'>

        <div class="col-md-3 col-md-offset-3" style="text-align: center">
            <a href="/gestao">
                <img src="{{ url('/img/logo_home.jpg') }}">
            </a>
            <h3> Gestão </h3>
        </div>

        <div class='col-md-3' style="text-align: center">
            <a href="/demolay">
                <img src="{{ url('/img/user_demolay.jpg') }}">
            </a>
            <h3> DeMolay </h3>
        </div>
    </div>
@endif

@stop
