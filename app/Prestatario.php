<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Prestatario extends Model
{

  use LogsActivity;
  
    protected $fillable = ['pnombre', 'snombre', 'papellido', 'sapellido', 'capellido', 'dui', 'email', 'tel', 'direccion', 'direccion2', 'ciudad' ,'municipio', 'zip', 'pais', 'comentario', 'cuenta', 'balance', 'imagen', 'estatus', 'estatus2'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombre)
	{
		return $query->where('nombre', 'LIKE', "%$pnombre%");
	}
}
