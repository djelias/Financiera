<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomia extends Model
{
    protected $fillable = ['idColeccion', 'idEspecimen', 'nombreComun','numVoucher'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreComun)
	{
		return $query->where('nombreComun', 'LIKE', "%$nombreComun%");
	}
   
   public function Especimen(){
    return $this->belongsTo('App\Especimen', 'idEspecimen');
   }
  public function Especie(){
    return $this->belongsTo('App\Especie', 'idEspecie');
   }

   public function Genero(){
    return $this->belongsTo('App\Genero', 'idGenero');
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
