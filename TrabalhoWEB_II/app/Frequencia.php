<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    protected $fillable = ['id_user', 'id_task', 'frequencia'];
    public $timestamps = false;
}