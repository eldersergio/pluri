<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

Class Cursos extends Model
{

	protected $fillable = ['titulo', 'descricao'];
	protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'cursos';
}