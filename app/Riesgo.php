<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Riesgo extends Model
{

  use LogsActivity;
  
    protected $fillable = ['catRiesgo'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreRiesgo)
	{
		return $query->where('catRiesgo', 'LIKE', "%$nombreRiesgo%");
	}

	 
}
