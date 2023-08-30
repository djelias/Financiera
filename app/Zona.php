<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Zona extends Model
{

  use LogsActivity;
  

    protected $fillable = ['nombreZona','descripcionZona1','lugarZona','idDepto','idMunicipio','latitudZona','longitudZona','habitatZona',];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreZona)
	{
		return $query->where('nombreZona', 'LIKE', "%$nombreZona%");

	}

	public function Departamento(){
    return $this->belongsTo('App\Departamento', 'idDepto');
   }
	public function Municipio(){
    return $this->belongsTo('App\Municipio', 'idMunicipio');
   }
   
}


