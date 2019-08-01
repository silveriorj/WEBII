<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financa extends Model
{
    protected $fillable = ['descricao', 'valor', 'data', 'pendente' , 'id_lancamento'];
    public $timestamps = false;
}
