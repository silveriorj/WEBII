<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Financa;
use App\Lancamento;
use App\Frequencia;
use App\Task;


class RelatorioController extends Controller {

    public function listar() {
        return view('relatorio');
    }

    public function listarF() {
        $financa = Financa::all();
        $lancamento = Lancamento::all();
        return \PDF::loadView('relatorioF', compact('financa'), compact('lancamento'))
                ->setPaper('a4', 'landscape')
                ->stream('relatorio.pdf');
    }

    public function listarP() {
        $total = 0;
        $faltas = 0;
        $result = 0;

        $demolay = User::all();
        $frequencia = Frequencia::all();

        return \PDF::loadView('relatorioP', compact('demolay'), compact('frequencia'),
         compact('total'), compact('faltas'), compact('result'))
                ->setPaper('a4', 'landscape')
                ->stream('relatorio.pdf');
    }
}
