<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable = ['idMunicipio','nombreZona','lugarZona','latitudZona','longitudZona','habitatZona','descripcionZona1'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreZona)
	{
		return $query->where('nombreZona', 'LIKE', "%$nombreZona%");

	}
	public function Municipio(){
    return $this->belongsTo('App\Municipio', 'idMunicipio');
}
}


