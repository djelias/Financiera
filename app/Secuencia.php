<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secuencia extends Model
{
   
    protected $fillable = ['secuenciaObtenida'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreSecuencia)
	{
		return $query->where('secuenciaObtenida', 'LIKE', "%$nombreSecuencia%");
	}
}
