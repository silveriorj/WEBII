@extends('principal')

@section('cabecalho')
<center>
<div id="m_texto">
        <img src=" {{ url('/img/scodrfb_ico.jpg') }}" >
        &nbsp;Menu Principal
        <img src=" {{ url('/img/emblema-demolay_ico.jpg') }}" >
        </center>
</div>
@stop

@section('conteudo')
<div class='container' align-itens='center'>
    <div class='row'>
        <div class='col-sm-6' style="text-align: center">
            <a href="/templario">
                <img src="{{ url('/img/logo_home.jpg') }}">
            </a>
            <h3> Templários do Atlântico nº901 </h3>
        </div>

        <div class='col-sm-5' style="text-align: center">
            <a href="/porto">
                <img src="{{ url('/img/logo_porto.jpg') }}">
            </a>
            <h3> Porto dos Templários nº977</h3>
        </div>
    </div>
</div>

@stop