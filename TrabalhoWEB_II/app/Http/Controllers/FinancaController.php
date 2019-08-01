<?php

namespace App\Http\Controllers;

use Request;
use App\Financa;
use App\Lancamento;

class FinancaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        $totalFuturo = 0;
        $totalDespesas = 0;
        $totalEntrada = 0;
        $fin = Financa::orderBy('data', 'asc')->get();
        $lan = Lancamento::all();

        foreach($fin as $f){
            if($f->id_lancamento==1 && $f->pendente==0){
                $totalEntrada += $f->valor;
                $total += $f->valor;
                $totalFuturo += $f->valor;
            }
            if($f->id_lancamento==1 && $f->pendente==1){
                $totalEntrada += $f->valor;
                $totalFuturo += $f->valor;
            }
            if($f->id_lancamento==2 && $f->pendente==0){
                $total -= $f->valor;
                $totalFuturo -= $f->valor;
                $totalDespesas += $f->valor;
            }
            if($f->id_lancamento==2 && $f->pendente==1){
                $totalFuturo -= $f->valor;
                $totalDespesas += $f->valor;
            }
        }

        return view('financa.index')->with('lancamento', $lan)->with('financas', $fin)->with('totalF', $totalFuturo)->with('total', $total)
        ->with('totalD', $totalDespesas)->with('totalE', $totalEntrada);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $objFinanca = new Financa();
        $objFinanca->descricao = Request::input('descricao');
        $objFinanca->valor = Request::input('valor');
        $objFinanca->data = Request::input('data');
        $arr = explode(" ", Request::input('id_lancamento'));
        $id_g = $arr[0];
        $objFinanca->id_lancamento = $id_g;

        $objFinanca->save();

        //Financa::create($request->all());
        return redirect()->route('financa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

         // Filtra parâmetro para garantir que é um número
         if(is_numeric($id)) {

            $f = Financa::find($id);
            $lan = Lancamento::find($f->id_lancamento);


            // Verifica se existe um DeMolay com o 'id' recebido por parâmetro
            if(empty($f)) {
                return "<h2>[ERRO]: Lancamento não encontrada para o ID=".$id."!</h2>";
            }
            return view('financa.edit')->with('financa', $f)->with('lancamento',$lan);
        }
        else {
            return "<h2>[ERRO]: Parâmetro Inválido!</h2>";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objFin = Financa::find($id);
        if($objFin->pendente==0){
            $objFin->pendente = 1; 
        }else{
            $objFin->pendente = 0; 
        }

        $objFin->save();

        return redirect()->action('FinancaController@index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_numeric($id)) {

            $fin = Financa::find($id);

            if(empty($fin)) {

                    $msg = "Lançamento não encontrado para o ID=$id!";

                    return view('messagebox')->with('tipo', 'alert alert-warning')
                            ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                            ->with('msg', $msg)
                            ->with('acao', "/financa");
            }

            return view('financa.destroy')->with("financa", $fin);
        }

        $msg = "Parâmetro via URL Inválido!";

        return view('messagebox')->with('tipo', 'alert alert-warning')
                ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                ->with('msg', $msg)
                ->with('acao', "/financa");
    }

    public function confirm($id){
        $objFinanca = Financa::find($id);

        if(empty($objFinanca)) {

            $msg = "Lançamento não encontrado para o ID=$id!";

            return view('messagebox')->with('tipo', 'alert alert-danger')
                    ->with('titulo', 'OPERAÇÃO NÃO-CONCLUIDA')
                    ->with('msg', $msg)
                    ->with('acao', "/financa");
        }

        $objFinanca->delete();

        $fin = Financa::all();
        $lan = Lancamento::all();
        return view('financa.index')->with('lancamento', $lan)->with('financas', $fin);
    }
}
