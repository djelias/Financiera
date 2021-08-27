<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Dominio extends Model
{

  use LogsActivity;
  
    protected $fillable = ['idReino', 'nombreDominio'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreDominio)
	{
		return $query->where('nombreDominio', 'LIKE', "%$nombreDominio%");
	}
}
