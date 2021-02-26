<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    
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
