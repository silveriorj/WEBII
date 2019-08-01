@extends('principal')

@section('cabecalho')
<div>
        <img src=" {{ url('/img/logo_home.jpg') }}" >
        &nbsp;RELATÓRIOS
</div>
@stop

@section('conteudo')

@if(Auth::user()->type==3)
<div class='row'>
    <div class="col-md-3 col-md-offset-0" style="text-align: center">
        <a href="/relatorioE">
            <img src="{{ url('/img/calendar.jpg') }}">
        </a>
        <h3> Calendário </h3>
    </div>

    <div class='col-sm-3' style="text-align: center">
        <a target="blank" href="/relatorioP">
            <img src="{{ url('/img/conceito_ico.png') }}">
        </a>
        <h3> Registro de Presença</a> </h3>
    </div>

    <div class='col-md-3' style="text-align: center">
        <a target="blank" href="/relatorioF">
            <img src="{{ url('/img/tributos2.png') }}">
        </a>
        <h3> Fluxo de Caixa </h3>
    </div>

    <div class="col-md-3" style="text-align: center">
        <a >
            <img src="{{ url('/img/curso_ico.png') }}">
        </a>
        <h3> Trabalhos </h3>
    </div>
</div>
@endif

@if(Auth::user()->type==0)
<div class='row'>
    <div class="col-md-3 col-md-offset-0" style="text-align: center">
        <a href="/relatorioE">
            <img src="{{ url('/img/calendar.jpg') }}">
        </a>
        <h3> Calendário </h3>
    </div>

    <div class='col-sm-3' style="text-align: center">
        <a href="/relatorioP">
            <img src="{{ url('/img/conceito_ico.png') }}">
        </a>
        <h3> Registro de Presença</a> </h3>
    </div>

    <div class='col-md-3' style="text-align: center">
        <a href="/relatorioF">
            <img src="{{ url('/img/tributos2.png') }}">
        </a>
        <h3> Fluxo de Caixa </h3>
    </div>

    <div class="col-md-3" style="text-align: center">
        <a >
            <img src="{{ url('/img/curso_ico.png') }}">
        </a>
        <h3> Trabalhos </h3>
    </div>
</div>
@endif
<br>
@stop
