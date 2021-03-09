<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    protected $fillable = ['idOrden', 'nombreFamilia'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreFamilia)
	{
		return $query->where('nombreFamilia', 'LIKE', "%$nombreFamilia%");
	}

   public function Orden(){
    return $this->belongsTo('App\Orden', 'idOrden');
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
