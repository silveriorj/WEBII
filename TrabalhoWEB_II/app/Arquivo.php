<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    protected $fillable = ['titulo', 'descricao', 'autor', 'path' , 'imagem', 'size', 'type', 'nome'];
    public $timestamps = false;
}
