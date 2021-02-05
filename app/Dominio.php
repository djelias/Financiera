<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    protected $fillable = ['idReino', 'nombreDominio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreDominio)
	{
		return $query->where('nombreDominio', 'LIKE', "%$nombreDominio%");
	}
}
