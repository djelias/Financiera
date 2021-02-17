<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = ['idClase', 'nombreOrden'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreOrden)
	{
		return $query->where('nombreOrden', 'LIKE', "%$nombreOrden%");
	}

  public function Clase(){
    return $this->belongsTo('App\Clase', 'idClase');
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
