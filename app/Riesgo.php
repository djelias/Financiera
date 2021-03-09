<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riesgo extends Model
{
    protected $fillable = ['catRiesgo'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreRiesgo)
	{
		return $query->where('catRiesgo', 'LIKE', "%$nombreRiesgo%");
	}

	 
}
