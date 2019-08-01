@extends('principal')

@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        $("#bt_mais").click(function() {

            var val = parseInt($("#it_ano").val());
            val = val + 1;

            $("#it_ano").attr('value', val);
        });

        $("#bt_menos").click(function() {

            var val = parseInt($("#it_ano").val());
            if(val > 2008) { val = val - 1; }

            $("#it_ano").attr('value', val);
        });
    });
</script>
@stop

@section('cabecalho')
<div>
        <a href="/gestao">
            <img src=" {{ url('/img/turmap_ico.png') }}" >
        </a>
        &nbsp;Gestões Cadastradas
</div>
@stop

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ action('GestaoController@salvar', ['id' => 0]) }}" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type ="hidden" name="cadastrar" value="C">

    <div class="row">
        <div class="col-sm-4">
            <label>Descrição: </label>
            <input type="text" name="descricao" class="form-control">
        </div>


        <div class="col-sm-4">
            <label>Capitulo: </label>
            <select name="capitulo" class="form-control" required>
                <option disabled="true" selected="true"> </option>
	  			@foreach ($capitulo as $dados)
                    <option value='{{ $dados->id }}'> {{ $dados->capitulo }}</option>
                @endforeach
	  		</select>
        </div>

        <div class="col-sm-2">
            <label>Ano: </label>
            <div class="input-group number-spinner">
				<span class="input-group-btn">
					<button type="button" class="btn btn-default" data-dir="up" id="bt_menos">
						<span class="glyphicon glyphicon-minus"></span>
					</button>
				</span>
				<input type="text" class="form-control text-center" name="ano" id="it_ano" readonly="true" value="{{ $data_ano }}">
				<span class="input-group-btn">
					<button type="button" class="btn btn-default" data-dir="up" id="bt_mais">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</span>
			</div>
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success btn-block">Salvar</button>
</form>

@stop