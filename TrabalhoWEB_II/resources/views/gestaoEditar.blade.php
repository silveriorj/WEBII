@extends('principal')

@section('cabecalho')
<div>
        <a href="/gestao">
            <img src=" {{ url('/img/turmap_ico.png') }}" >
        </a>
        &nbsp;Editar Gestão
</div>
@stop

@section('conteudo')

<form action="{{ action('GestaoController@salvar', ['id' => $gestao->id]) }}" method="POST">
    <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type ="hidden" name="editar" value="E">

    <div class="row">
        <div class="col-sm-4">
            <label>Descrição: </label>
            <input type="text" name="descricao" class="form-control">
        </div>
        
        <div class="col-sm-4">
            <label>Curso: </label>
            <select name="curso" class="form-control" required>
                <option disabled="true" selected="true"> </option>
	  			@foreach ($capitulo as $dados)
                    @if($dados->id == $gestao->id_capitulo)
                        <option value = '{{ $dados->id }}' selected="true"> {{ $dados->capitulo }}</option>
                    @else
                        <option value = '{{ $dados->id }}'> {{ $dados->capitulo }} </option>
                    @endif
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
				<input type="text" class="form-control text-center" name="gestao" id="it_ano" readonly="true" value="{{ $gestao->gestao }}">
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

<script type="text/javascript">
    // Eventos da Página
    $(document).ready(function() {

        // Botão Mais Tempo do Curso
        $("#bt_mais").click(function() {

            var val = parseInt($("#it_ano").val());
            val = val + 1;

            $("#it_ano").attr('value', val);
        });

        // Botão Menos Tempo do Curso
        $("#bt_menos").click(function() {

            var val = parseInt($("#it_ano").val());
            if(val > 2008) { val = val - 1; }

            $("#it_ano").attr('value', val);
        });
    });
</script>


@stop