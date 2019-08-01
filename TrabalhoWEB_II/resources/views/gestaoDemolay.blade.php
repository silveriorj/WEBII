@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src="{{ url('/img/alunop_ico.png') }}" >
        &nbsp;DeMolays Cadastrados
</div>
@stop

@section('conteudo')

@if (old('cadastrar'))
    <div class="alert alert-success">
        <strong> {{ old('name') }} </strong>: Cadastrado com Sucesso!
    </div>
@endif
@if(Auth::user()->type==3)
    <div class='row'>
        <div class='col-sm-12' style="text-align: center">
            <a  href="{{ action('DemolayController@cadastrar')}}" type="button" class="btn btn-primary btn-block">
                <b>Cadastrar Novo DeMolay</b>
            </a>
        </div>
    </div>
@endif
<div class="row">
    <div style="text-align: center">
            @foreach ($capitulo as $dados)
                @if($dados->id == $gestao->id_capitulo)
                   <h2>{{$dados->capitulo}} {{ $gestao->gestao }}</h2>
                @endif
            @endforeach
    </div>
</div>
<br>
<table class='table table-striped'>
    <thead>
        <tr>
            <th>ID</th>
            <th>DEMOLAY</th>
            <th>AÇÃO</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($demolay as $dados)
                <tr>
                    <td>{{ $dados->id }}</td>
                    <td>{{ $dados->name }}</td>
                    <td>
                        &nbsp;
                        @if(Auth::user()->type==3)
                            <a href="{{ action('DemolayController@editar', ['id' => $dados->id]) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                            &nbsp;
                            <a href="{{ action('DemolayController@remover', ['id' => $dados->id, 'ide' => $gestao->id]) }}"><span class='glyphicon glyphicon-remove'></span></a>
                        @endif
                    </td>
                </tr>     
    @endforeach
    </tbody>
</table>

@stop