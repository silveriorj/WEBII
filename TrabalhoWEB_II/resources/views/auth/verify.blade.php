@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um link de verificação foi enviado por email.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor cheque a caixa de entrada do seu email.') }}
                    {{ __('Se você não recebeu o email') }}, <a href="{{ route('verification.resend') }}">{{ __(' clique aqui para solicitar um novo.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
