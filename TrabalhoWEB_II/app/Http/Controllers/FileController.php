<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Arquivo;
use Storage; // <--------



class FileController extends Controller {

    public function index() {
        $arq = Arquivo::all();
        $imagem = null;

        return view('trabalhos.index')->with('arquivos', $arq);
    }    

    public function store(Request $request)
    {
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
    
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
    
            // Faz o upload:
            $arq = new Arquivo();
            $arq->titulo = $request->titulo;
            $arq->descricao = $request->descricao;
            $arq->autor = $request->autor;
            
            $file_tmp = $_FILES['file']['tmp_name'];            
            $arq->size = $_FILES['file']['size'];
            $arq->type = $_FILES['file']['type'];
            $arq->nome = $_FILES['file']['name'];
            
            $binario = file_get_contents($file_tmp);

            $arq->imagem = $binario;

            $arq->save();

            $upload = $request->file->storeAs('trabalhos', $request->file->getClientOriginalName());
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/trabalhos/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload ){
                $msg = "Parâmetro via URL Inválido!";

                return view('messagebox')->with('tipo', 'alert alert-warning')
                        ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                        ->with('msg', $msg)
                        ->with('acao', "/trabalhos");
            }
            else{
                return redirect()->route('trabalhos.index');
            }

        }
        $msg = "Parâmetro via URL Inválido!";

        return view('messagebox')->with('tipo', 'alert alert-warning')
                ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                ->with('msg', $msg)
                ->with('acao', "/trabalhos");
            
        
    }

    public function destroy($id)
    {
        if(is_numeric($id)) {

            $file = Arquivo::find($id);

            if(empty($file)) {

                    $msg = "Arquivo não encontrado para o ID=$id!";

                    return view('messagebox')->with('tipo', 'alert alert-warning')
                            ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                            ->with('msg', $msg)
                            ->with('acao', "/trabalhos");
            }

            return view('trabalhos.destroy')->with("arquivo", $file);
        }

        $msg = "Parâmetro via URL Inválido!";

        return view('messagebox')->with('tipo', 'alert alert-warning')
                ->with('titulo', 'OPERAÇÃO INVÁLIDA')
                ->with('msg', $msg)
                ->with('acao', "/trabalhos");
    }

    public function confirm($id){
        $objFile = Arquivo::find($id);

        if(empty($objFile)) {

            $msg = "Arquivo não encontrado para o ID=$id!";

            return view('messagebox')->with('tipo', 'alert alert-danger')
                    ->with('titulo', 'OPERAÇÃO NÃO-CONCLUIDA')
                    ->with('msg', $msg)
                    ->with('acao', "/trabalhos");
        }

        $objFile->delete();

        $file = Arquivo::all();
        return view('trabalhos.index')->with('arquivos', $file);
    }

    public function show($id)
    {
        $file = Arquivo::find($id);
        if($file){
            header("Content-type: ".$file->type."");
            echo $file->imagem;
        }else{
        } 
    }
}

