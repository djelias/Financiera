<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class EspecieAmenazada extends Model
{
	 public $table = "especieAmenazadas";

  use LogsActivity;
  
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
