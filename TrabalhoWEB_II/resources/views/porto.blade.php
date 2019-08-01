@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src=" {{ url('/img/logo_porto.jpg') }}" >
        &nbsp;Menu Principal
</div>
@stop

@section('conteudo')

@if(Auth::user()->type==3)
    <div class='row'>

        <div class='col-sm-3' style="text-align: center">
            <a href="/curso">
                <img src="{{ url('/img/curso_ico.png') }}">
            </a>
            <h3> Trabalhos </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <a href="/turma">
                <img src="{{ url('/img/logo_porto_ico.jpg') }}">
            </a>
            <h3> Gestão </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <a href="/demolay">
                <img src="{{ url('/img/user_demolay.jpg') }}">
            </a>
            <h3> DeMolay </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <a href="/disciplina">
                <img src="{{ url('/img/disciplina_ico.png') }}">
            </a>
            <h3> Financeiro </h3>
        </div>
    </div>
    <br>
    <div class='row'>
        <div class='col-sm-3' style="text-align: center">
            <a href="/conceito">
                <img src="{{ url('/img/conceito_ico.png') }}">
            </a>
            <h3> Registro de Presença</a> </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
            <a href="/relatorio">
                <img src="{{ url('/img/relatorio_ico.png') }}">
            </a>
            <h3> Relatório </h3>
        </div>

        <div class='col-sm-3' style="text-align: center">
        <a href="/importar">
            <img src="{{ url('/img/importar_ico.png') }}">
        </a>
        <h3> Importar </h3>
    </div>

    <div class='col-sm-3' style="text-align: center">
        <a href="/exportar">
            <img src="{{ url('/img/exportar_ico.png') }}">
        </a>
        <h3> Exportar </h3>
    </div>

    </div>
@endif

@if(Auth::user()->type==1||Auth::user()->type==2)
    <div class='row'>

        <div class='col-sm-6' style="text-align: center">
            <a href="/registro">
                <img src="{{ url('/img/conceito_ico.png') }}">
            </a>
            <h3> Registro </h3>
        </div>

        <div class='col-sm-6' style="text-align: center">
            <a href="/turma">
                <img src="{{ url('/img/turma_ico.png') }}">
            </a>
            <h3> Turma </h3>
        </div>

    </div>
@endif

@if(Auth::user()->type==0)
    <div class='row'>

        <div class='col-sm-6' style="text-align: center">
            <a href="/atrasos">
                <img src="{{ url('/img/conceito_ico.png') }}">
            </a>
            <h3> Registro </h3>
        </div>

        <div class='col-sm-6' style="text-align: center">
            <a href="/alunos">
                <img src="{{ url('/img/aluno_ico.png') }}">
            </a>
            <h3> Aluno </h3>
        </div>

    </div>
@endif

@stop