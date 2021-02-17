<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = ['idFilum', 'nombreClase'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreClase)
	{
		return $query->where('nombreClase', 'LIKE', "%$nombreClase%");
	}

    public function Filum(){
    return $this->belongsTo('App\Filum', 'idFilum');
   }

	public function Reino(){
    return $this->belongsTo('App\Reino', 'idReino');
   }

	public function Dominio(){
    return $this->belongsTo('App\Dominio', 'idDominio');
}
}
