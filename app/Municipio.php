<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Municipio extends Model
{

  use LogsActivity;
  
    
    protected $fillable = ['idDepto', 'nombreMunicipio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreMunicipio)
	{
		return $query->where('nombreMunicipio', 'LIKE', "%$nombreMunicipio%");
	}
	public function Departamento(){
    return $this->belongsTo('App\Departamento', 'idDepto');
}
}
