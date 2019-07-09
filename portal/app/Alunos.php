<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $fillable = ['nome', 'email', 'sexo', 'data_nascimento'];
}
