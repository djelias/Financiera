<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EspecieAmenazada extends Model
{
     protected $fillable = ['idRiesgo', 'nomEspamen','nomComEspamen'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreEspamen)
	{
		return $query->where('nomEspamen', 'LIKE', "%$nombreEspamen%");
	}
	public function Riesgo(){
    return $this->BelongsTo('App\Riesgo', 'idRiesgo');
}
}
