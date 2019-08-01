@extends('principal')
@section('menu')
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="{{ url('/gestao') }}"> Gestão </a>
        </li>
    </ul>
@stop
@section('cabecalho')
<div id="img">
        <img src="{{ url('/img/conceitop_ico.png') }}" >
        &nbsp;Registros de Frequências
</div>
@stop

@section('conteudo')

@if(Auth::user()->type==2 || Auth::user()->type==3)
    <form class="form" method="post" action="{{ route('frequencia.store') }}">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
            <button type="submit" class="btn btn-primary btn-block">
                <b>Confirmar Lançamento</b>
            </button>
            <br>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>DeMolay</th>
                        @foreach($tasks as $task)
                            <th> {{ date("d/m", strtotime($task->task_date))}}</th>
                        @endforeach
                        <th>FREQUÊNCIA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demolay as $dm)
                    <tr>
                    <?php 
                        $total = 0; 
                        $faltas = 0;
                        $result = 0;
                    ?>
                        <td><strong>{{ $dm->name }}</strong></td>
                        @foreach($tasks as $task)
                            @foreach($frequencia as $freq)
                                <?php if($freq->id_user == $dm->id && $freq->id_task == $task->id){  ?>
                                    <?php $total += 1; ?>
                                    <td>
                                        <select name="{{$dm->id}}_{{$task->id}}">
                                            <?php if($freq->frequencia == 1){ ?>
                                                <option value="P" selected>P</option>
                                                <option value="A">A</option>
                                            <?php }elseif($freq->frequencia == 0){?> 
                                                <option value="A" selected>A</option> 
                                                <option value="P">P</option>
                                                <?php $faltas += 1; ?>
                                            <?php } else {?>
                                                <option value="A">A</option> 
                                                <option value="P">P</option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                <?php } ?>
                            @endforeach
                        @endforeach
                        <td>
                            <?php 
                                $result = $total - $faltas;
                                try{
                                    $fr = $result / $total * 100;
				    $fr = number_format($fr, 2, '.', '');
                                }catch(Exception $e){
                                    $fr = 0;
                                }
                                
                            ?>
                            <?php if($fr >= 75){ ?>
                                <p class='text-success'><?php echo "$fr%" ?></p>
                            <?php }else{?>
                                <p class='text-danger'><?php echo "$fr%" ?></p>
                            <?php } ?>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
@endif


@if(Auth::user()->type==0)
    <form class="form" method="post" action="{{ route('frequencia.store') }}">
        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
            <button disabled class="btn btn-primary btn-block">
                <b>Confirmar Lançamento</b>
            </button>
            <br>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>DeMolay</th>
                        @foreach($tasks as $task)
                            <th> {{ $task->name}} <br> {{ date("d/m", strtotime($task->task_date))}}</th>
                        @endforeach
                        <th>FREQUÊNCIA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demolay as $dm)
                    <tr>
                    <?php 
                        $total = 0; 
                        $faltas = 0;
                        $result = 0;
                    ?>
                        <td><strong>{{ $dm->name }}</strong></td>
                        @foreach($tasks as $task)
                            
                            @foreach($frequencia as $freq)
                                <?php if($freq->id_user == $dm->id && $freq->id_task == $task->id){  ?>
                                    <?php $total += 1; ?>
                                        <td>
                                            <?php if($freq->frequencia == 1){ ?>
                                                <img src="/img/checked.png" alt="">
                                            <?php }elseif($freq->frequencia == 0){ $faltas += 1;?> 
                                                <img src="/img/unchecked.png" alt="">
                                            <?php } ?>
                                        </td>
                                <?php } ?>
                            @endforeach
                        @endforeach
                        <td>
                            <?php 
                                $result = $total - $faltas;
                                try{
                                    $fr = $result / $total * 100;
				    $fr = number_format($fr, 2, '.', '');
                                }catch(Exception $e){
                                    $fr = 0;
                                }
                                
                            ?>
                            <?php if($fr >= 75){ ?>
                                <p class='text-success'><?php echo "$fr%" ?></p>
                            <?php }else{?>
                                <p class='text-danger'><?php echo "$fr%" ?></p>
                            <?php } ?>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
@endif

@stop
