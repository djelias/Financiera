<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable = ['idZona','nombreZona','descripcionZona1'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreZona)
	{
		return $query->where('nombreZona', 'LIKE', "%$nombreZona%");
	}
}
