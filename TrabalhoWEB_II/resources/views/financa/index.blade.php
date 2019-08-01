@extends('principal')
@section('menu')
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="{{ url('/gestao') }}"> Gestão </a>
        </li>
    </ul>
@stop

@section('cabecalho')
    <div id="m_texto">
        <img src=" {{ url('/img/tributos.png') }}" >
        &nbsp;Fluxo de Caixa
    </div>
@stop

@section('conteudo')


@if (old('cadastrar'))
    <div class="alert alert-success">
        <strong> {{ old('name') }} </strong>: Cadastrado com Sucesso!
    </div>
@endif

@if (old('editar'))
    <div class="alert alert-success">
        <strong> {{ old('name') }} </strong>: Alterado com Sucesso!
    </div>
@endif

@if (old('destroy'))
    <div class="alert alert-success">
        <strong> {{ old('descricao') }} </strong>: Removido com Sucesso!
    </div>
@endif

@if(Auth::user()->type==2 || Auth::user()->type==3)
    <form class="form" method="post" action="{{ route('financa.store') }}">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">

        <div class="row">
            <div class="col-sm-5">
                <input type="text" name="descricao" class="form-control"  placeholder="Descrição">
            </div>

            <div class="col-sm-2">
                <input type="number" min="0.000" max="10000.00" step="0.01" name="valor" class="form-control"  placeholder="R$">
            </div>

            <div class="col-sm-2">
                <input type="date" name="data" class="form-control"  placeholder="">
            </div>

            <div class="col-sm-2">
                <select name="id_lancamento" class="form-control">
                    <option disabled="true" selected="true"> </option>
                    @foreach ($lancamento as $dados)
                        <option> {{ $dados->id }} - {{ $dados->descricao }} </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <b>Lançar</b>
            </button>
        </div>
        <br>
    </form>
@endif

    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor R$</th>
                <th>Lançamento</th>
                <th>Data</th>
                <th>Status</th>
                @if(Auth::user()->type==2 || Auth::user()->type==3)
                    <th>AÇÃO</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($financas as $dados)
            @foreach($lancamento as $lan)
                @if($lan->id == $dados->id_lancamento)
                    @if($dados->id_lancamento == 1)
                        <tr>
                            <td><p class='text-success'>{{ $dados->descricao }}</p></td>
                            <td><p class='text-success'>R$ {{ $dados->valor }}</td>
                            <td><p class='text-success'>{{ $lan->descricao }}</td>
                            <td><p class='text-success'>{{ date("d/m/Y", strtotime($dados->data)) }}</td>
                            @if($dados->pendente==1)
                                <td><p class='text-warning'>PENDENTE</td>
                            @endif
                            @if($dados->pendente==0)
                                <td><p class='text-success'>RECEBIDO</td>
                            @endif
                            @if(Auth::user()->type==2 || Auth::user()->type==3)
                                <td>
                                    @if($dados->pendente==0)
                                        <a href="{{ action('FinancaController@update', ['id' => $dados->id]) }}"><img src="/img/checked.png" height="16" width="16"></a>
                                        &nbsp;
                                    @endif
                                    @if($dados->pendente==1)
                                        <a href="{{ action('FinancaController@update', ['id' => $dados->id]) }}"><img src="/img/unchecked.png" height="16" width="16"></a>
                                        &nbsp;
                                    @endif
                                    <a href="{{  action('FinancaController@destroy', ['id' => $dados->id]) }}"><img src="/img/delete_ico.png" height="16" width="16"></a>
                                </td>
                            @endif
                        </tr>
                    @endif
                    @if($dados->id_lancamento==2)
                        <tr>
                            <td><p class='text-danger'>{{ $dados->descricao }}</p></td>
                            <td><p class='text-danger'>R$ {{ $dados->valor }}</td>
                            <td><p class='text-danger'>{{ $lan->descricao }}</td>
                            <td><p class='text-danger'>{{ date("d/m/Y", strtotime($dados->data)) }}</td>
                            @if($dados->pendente==1)
                                <td><p class='text-warning'>PENDENTE</td>
                            @endif
                            @if($dados->pendente==0)
                                <td><p class='text-danger'>PAGO</td>
                            @endif
                            
                            @if(Auth::user()->type==2 || Auth::user()->type==3)
                                <td>
                                    @if($dados->pendente==0)
                                        <a href="{{ action('FinancaController@update', ['id' => $dados->id]) }}"><img src="/img/checked.png" height="16" width="16"></a>
                                        &nbsp;
                                    @endif
                                    @if($dados->pendente==1)
                                        <a href="{{ action('FinancaController@update', ['id' => $dados->id]) }}"><img src="/img/unchecked.png" height="16" width="16"></a>
                                        &nbsp;
                                    @endif
                                    <a href="{{  action('FinancaController@destroy', ['id' => $dados->id]) }}"><img src="/img/delete_ico.png" height="16" width="16"></a>
                                </td>
                            @endif
                        </tr>
                        @endif
                    @endif
                @endforeach
        @endforeach
        @if(Auth::user()->type==2 || Auth::user()->type==3)
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td><strong>TOTAL DE DESPESAS:</strong></td><td><strong>R$ {{ $totalD }}</strong></td><td></td><td></td>
                <td><strong>TOTAL EM CAIXA:</strong></td>
                <td><strong><p>R$ {{ $total }}</p></strong></td>
            </tr>
            <tr>
                <td><strong>TOTAL DE ENTRADAS:</strong></td><td><strong>R$ {{ $totalE }}</strong></td><td></td><td></td>
                <td><strong>CAIXA FINAL:</strong></td>
                <td><strong><p>R$ {{ $totalF }}</p></strong></td>
            </tr>
        @endif
        @if(Auth::user()->type==0)
            <tr>
                <td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td><strong>TOTAL DE DESPESAS:</strong></td><td><strong>R$ {{ $totalD }}</strong></td><td></td>
                <td><strong>TOTAL EM CAIXA:</strong></td>
                <td><strong><p>R$ {{ $total }}</p></strong></td>
            </tr>
            <tr>
                <td><strong>TOTAL DE ENTRADAS:</strong></td><td><strong>R$ {{ $totalE }}</strong></td><td></td>
                <td><strong>CAIXA FINAL:</strong></td>
                <td><strong><p>R$ {{ $totalF }}</p></strong></td>
            </tr>
        @endif
        </tbody>
    </table>
@stop
