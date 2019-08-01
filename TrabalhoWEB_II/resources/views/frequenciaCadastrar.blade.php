@extends('principal')

@section('script')
<script>
    $(document).ready(function() {
        $('.form-control').select2();
    });
</script>
@stop
 
@section('cabecalho')
<div id="m_texto">
        <img src="{{ url('/img/conceitop_ico.png') }}" >
        &nbsp;Registrar Frequência
</div> 
@stop

@section('conteudo')

<form action="{{ action('FrequenciaController@salvar', 0) }}" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type ="hidden" name="cadastrar" value="C">

    <div class="row">
       <label class="col-md-2">Aluno: </label>
        <div class="col-sm-10">
            <select name="user" class="form-control" required>
                <option disabled="true" selected="true"> </option>
                @foreach($capitulo as $cap)
                    @foreach($gestao as $ges)
                        @if($cap->id == $ges->id_capitulo)
                            <optgroup label="{{ $cap->capitulo }} {{ $ges->ano }}"> 
                                @foreach ($demolay as $dm)   
                                    @if($cap->id == $dm->id_capitulo )                                      
                                        <option value='{{ $dm->id }} {{ $ges->id }} {{ $cap->id }}'> {{ $dm->id }} - {{ $dm->name }}  ( {{ $cap->capitulo }} {{ $ges->ano }} ) </option>                                        
                                    @endif
                                @endforeach
                            </optgroup>
                        @endif
                    @endforeach 
                @endforeach
            </select>  
        </div>
    </div>
    <br>
    @if(Auth::user()->type!=3)
        <div class="row">
            <label class="col-md-2">MC da Gestão: </label>
            <div class="col-sm-10">
                <select name="professor" class="form-control" required>
                    <option disabled="true" selected="true"> </option>
                    @foreach ($demolay as $dados)    
                        <option value='{{ $dados->id }}'> {{ $dados->user->name }} - {{ $dados->user->email }} </option>              
                    @endforeach
                </select>  
            </div>
        </div>     
        <br><br>
    @endif
    <button type="submit" class="btn btn-success btn-block">Salvar</button>
</form>

@stop