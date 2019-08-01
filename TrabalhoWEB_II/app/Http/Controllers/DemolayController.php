<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Request;
use App\User;
use App\Grau;
use App\Cargo;
use App\Capitulo;

class DemolayController extends Controller {

    public function __construct(){
        $this->middleware('auth');
    }

    public function list(){   
        
        $user = Auth::user();
        return view('edit')->with('user', $user);
    }

    public function listar() {
        $cargo = Cargo::all();
        $demolay = User::orderBy("id_cargo", "asc")->get();

        return view('demolay')->with('cargos', $cargo)->with('demolay', $demolay);
    }

    public function cadastrar() {
        $grau = Grau::all();
        $cap = Capitulo::all();
        $cargo = Cargo::all();

        return view('demolayCadastrar')->with('capitulo', $cap)->with('grau', $grau)->with('cargo', $cargo);
    }

    public function salvar($id) {
        // INSERT
        if($id == 0) {
            $objDMModel = new User();
            $objDMModel->name = mb_strtoupper(Request::input('name'), 'UTF-8');
            $objDMModel->email = Request::input('email');
            $objDMModel->password = bcrypt(Request::input('password'));
            $arr = explode(" ", Request::input('id_grau'));
            $id_g = $arr[0];
            $objDMModel->id_grau = $id_g;
            $arr2 = explode(" ", Request::input('id_cargo'));
            $id_c = $arr2[0];
            $objDMModel->id_cargo = $id_c;
            $objDMModel->save();
        }
        // UPDATE
        else {
            $objDMModel = User::find($id);
            $objDMModel->name = mb_strtoupper(Request::input('name'), 'UTF-8');
            $objDMModel->email = Request::input('email');
            $arr = explode(" ", Request::input('id_grau'));
            $id_g = $arr[0];
            $objDMModel->id_grau = $id_g;
            $arr2 = explode(" ", Request::input('id_cargo'));
            $id_c = $arr2[0];
            $objDMModel->id_cargo = $id_c;            

            $objDMModel->save();
        }

        return redirect()->action('DemolayController@listar')->withInput();
    }

    public function editar($id) {
        $grau = Grau::all();
        $cargo = Cargo::all();

        // Filtra parâmetro para garantir que é um número
        if(is_numeric($id)) {

            $demolay = User::find($id);

            // Verifica se existe um DeMolay com o 'id' recebido por parâmetro
            if(empty($demolay)) {
                return "<h2>[ERRO]: DeMolay não encontrada para o ID=".$id."!</h2>";
            }
            return view('demolayEditar')->with('demolay', $demolay)->with('capitulo', $cap)->with('grau', $grau)->with('cargo', $cargo);
        }
        else {
            return "<h2>[ERRO]: Parâmetro Inválido!</h2>";
        }
    }


    public function update(User $user){ 

        $this->validate(request(), [
            'name' => 'required'
        ]);

        $nome = request('name');
        $user->name = request('name');

        if(Auth::user()->email!=request('email')){
            $this->validate(request(), [
                'email' => 'required|email|unique:users'
            ]);
            $user->email = request('email');
        }

        if ( ! Request::input('password') == ''){
            $this->validate(request(), [
                'password' => 'required|min:6|confirmed'
            ]);
            $user->password = bcrypt(Request::input('password'));
        } 

        $user->save();    

        return redirect()->action('DemolayController@listar')->withInput();
    }

    public function remover($id) {
        if(is_numeric($id)) {

            $demolay = User::find($id);

            if(empty($demolay)) {

                    $msg = "DeMolay não encontrado para o ID=$id!";

                    return view('messagebox')->with('tipo', 'alert alert-warning')
                            ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                            ->with('msg', $msg)
                            ->with('acao', "/demolay");
            }

            return view('demolayRemover')->with("demolay", $demolay);
        }

        $msg = "Parâmetro via URL Inválido!";

        return view('messagebox')->with('tipo', 'alert alert-warning')
                ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                ->with('msg', $msg)
                ->with('acao', "/demolay");
    }

    public function confirmar($id){
        $objDMModel = User::find($id);

        if(empty($objDMModel)) {

            $msg = "DeMolay não encontrado para o ID=$id!";

            return view('messagebox')->with('tipo', 'alert alert-danger')
                    ->with('titulo', 'OPERAÇÃO NÃO-CONCLUIDA')
                    ->with('msg', $msg)
                    ->with('acao', "/demolay");
        }

        $objDMModel->delete();

        return redirect()->action('DemolayController@listar');
    }
}

