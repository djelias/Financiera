<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Coleccion extends Model
{

  use LogsActivity;
  
    protected $fillable = ['nombreColeccion'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreColeccion)
	{
		return $query->where('nombreColeccion', 'LIKE', "%$nombreColeccion%");
	}
}
