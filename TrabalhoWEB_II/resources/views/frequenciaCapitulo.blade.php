@extends('principal')

@section('cabecalho')
<div id="m_texto">
        <img src="{{ url('/img/conceito_ico.png') }}" >
        &nbsp;Registros de Frequência
</div>
@stop

@section('conteudo')

@if (old('cadastrar'))
    <div class="alert alert-success">
        <strong> Registrado com Sucesso! </strong>
    </div>
@endif

<div class='row'>
    <div class='col-sm-12' style="text-align: center">
        <a  href="{{ action('FrequenciaController@cadastrar') }}" type="button" class="btn btn-primary btn-block">
            <b>Realizar Novo Registro</b>
        </a>
    </div>
</div>
<div class="row">
    <div style="text-align: center">
            @foreach ($capitulo as $dados)
                @if($dados->id == $demolay->id_capitulo)
                   <h2>{{$dados->capitulo}} {{ $demolay->name }}</h2>
                @endif
            @endforeach
    </div>
</div>
<br>

<br>
<table class='table table-striped'>
    <thead>
        <tr>
            <th>MATRÍCULA</th>
            <th>DEMOLAY</th>
            <th>AULA DO PROFESSOR</th>
            <th>DATA</th>
            @if(Auth::user()->type==2 || Auth::user()->type==3)
                <th>AÇÃO</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($registros as $dados)
            @if($dados->id_ == $turmas->id)
                <tr>
                    @foreach($alunos as $data)
                        @if($data->id == $dados->id_aluno)
                            <td>{{ $data->matricula }}</td>
                            <td>{{ $data->nome }}</td>
                        @endif
                    @endforeach
                    @foreach($professor as $prof)
                        @if($dados->id_professor == $prof->id)
                            <td>{{ $prof->user->name }}</td>
                        @endif
                    @endforeach
                    <td>{{ \Carbon\Carbon::parse($dados->created_at)->format('d/m/Y H:i:s') }}</td>
                    @if(Auth::user()->type==2 || Auth::user()->type==3)
                        <td>
                            <a href="{{ action('FrequenciaController@remover', ['id' => $dados->id]) }}"><span class='glyphicon glyphicon-remove'></span></a>
                            &nbsp;
                        </td>
                    @endif
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

@stop