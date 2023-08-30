<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Publicacion extends Model
{

  use LogsActivity;
  
    protected $fillable = ['nombrePublicacion','descripcionPub','url','fechaInicio','fechaFin','estado'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombrePublicacion)
	{
		return $query->where('nombrePublicacion', 'LIKE', "%$nombrePublicacion%");
	}
}
