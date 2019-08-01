<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Capitulo;
use App\Gestao;
use App\Frequencia;

class GestaoController extends Controller {

    public function listar() {
        $gestoes = Gestao::orderBy('id_capitulo')->orderBy('gestao', 'desc')->get(); 
        $capitulo = Capitulo::all();
        return view('gestao')->with('gestao', $gestoes)->with('capitulo', $capitulo);
    }

    public function listarDemolays($id) {

        if(is_numeric($id)) {

            $gestoes = Gestao::find($id);
            if(empty($gestoes)) {
                return view("erro");
            }

            $demolay = User::orderBy('name')->get();
            $capitulo = Capitulo::all();

            return view('gestaoDemolay')->with('demolay', $demolay)->with('gestao', $gestoes)->with('capitulo', $capitulo);
        }
        else {
            return view("erro");
        }
    }

    public function cadastrar() {
        $cap = Capitulo::all();
        $hoje = getdate();
        return view('gestaoCadastrar')->with('capitulo', $cap)->with('data_ano', $hoje['year']);
    }

    public function salvar($id) {

        $ano = Request::input('ano');
        $desc = Request::input('descricao');
        $cap = Request::input('capitulo');

        $ide = Gestao::where('gestao', '=', $ano)->where('id_capitulo', '=', $cap)->value('id');
        if(!empty($ide)){
            $rules = [
                'gestao' => 'required',
            ];

            $customMessages = [
                'required' => 'A :attribute já existe!'
            ];

            $this->validate(request(), $rules, $customMessages);
        }

        if($id == 0) {
            $objGestaoModel = new Gestao();
            $objGestaoModel->gestao = $ano;
            $objGestaoModel->descricao = $desc;
            // Obtém Id Curso
            $objGestaoModel->id_capitulo = $cap;
            // Fim

            $objGestaoModel->save();
        }
        // UPDATE
        else {
            $objGestaoModel = Gestao::find($id);
            $objGestaoModel->gestao = Request::input('gestao');
            $objGestaoModel->descricao = $desc;
            // Obtém Id Curso
            $objGestaoModel->id_capitulo = Request::input('capitulo');
            // Fim

            $objGestaoModel->save();
        }

        return redirect()->action('GestaoController@listar')->withInput();
        

    }

    public function editar($id) {

        // Filtra parâmetro para garantir que é um número
        if(is_numeric($id)) {

            $gestao = Gestao::find($id);

            // Verifica se existe um curso com o 'id' recebido por parâmetro
            if(empty($gestao)) {
                return view("erro");
            }

            $capitulo = Capitulo::orderBy('id')->get();
            return view('gestaoEditar')->with('gestao', $gestao)->with('capitulo', $capitulo);
        }
        else {
            return view("erro");
        }

    }

    public function remover($id) {

        if(is_numeric($id)) {

            $gestao = Gestao::find($id);

            if(empty($gestao)) {
                return view("erro");
            }

            return view('gestaoRemover')->with("gestao", $gestao);
        }

        return view("erro");
    }

    public function confirmar($id) {

        $objGestaoModel = Gestao::find($id);
        //$alunos = AlunoModel::select('id', 'id_turma')->get();

        if(empty($objGestaoModel)) {
                return "<h2>[ERRO]: Turma não encontrada para o ID=".$id."!</h2>";
        }

        $freq = Frequencia::all();
        $demolay = User::all();
        $gestao = Gestao::all();
        //por conta do soft delete não poder utilizar o cascade, decidi utilizar um foreach pra fazer essas buscas de deletes

        foreach($freq as $dados){
            if($dados->id_gestao==$objGestaoModel->id){
                $dados->delete();
            }
        }

        foreach($demolay as $dados){
            if($dados->id_gestao==$objGestaoModel->id){
                $dados->delete();
            }
        }

        $objGestaoModel->delete();

        return redirect()->action('GestaoController@listar');
    }
}