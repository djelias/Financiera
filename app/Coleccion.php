<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    protected $fillable = ['idColeccion','nombreColeccion'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreColeccion)
	{
		return $query->where('nombreColeccion', 'LIKE', "%$nombreColeccion%");
	}
}
