<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = ['idFamilia', 'nombreGenero'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreGenero)
	{
		return $query->where('nombreGenero', 'LIKE', "%$nombreGenero%");
	}

  public function Familia(){
    return $this->belongsTo('App\Familia', 'idFamilia');
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
