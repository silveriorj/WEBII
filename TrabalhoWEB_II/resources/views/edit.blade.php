@extends('layouts.app')

@section('cabecalho')
<div id="m_texto">
        <img src=" {{ url('/img/registrop_ico.png') }}" >
        &nbsp;Atualização de Dados do Usuário
</div>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ action('DemolayController@update', $user) }}">
                        <input type ="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <input type ="hidden" name="editar" value="E">
                        {{ csrf_field() }}

                        @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong>[Entrada Inválida] O nome do usuário não pode conter mais que 255 caracteres!</strong>
                            </div>
                        @endif

                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <strong>[Entrada Inválida] Já existe um usuário cadastro para o E-MAIL informado!</strong>
                            </div>
                        @endif

                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>[Entrada Inválida] A SENHA deve possuir ao menos de 6 caracteres e ser igual a digitada na confirmação!</strong>
                            </div>
                        @endif

                        @if (! $errors->has('password') && ! $errors->has('email') && ! $errors->has('name') && old('editar'))
                            <div class="alert alert-success">
                                Editado com Sucesso!
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Nova Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Nova Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <b> {{ __('Atualizar Registro') }} </b>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection