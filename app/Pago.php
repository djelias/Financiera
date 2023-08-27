<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Pago extends Model
{

  use LogsActivity;
  
    protected $fillable = ['idprest', 'idprest2', 'fechadepago', 'cantidad', 'intereses', 'capitalpagado', 'diasintereses', 'comentario'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $fechadepago)
	{
		return $query->where('fechadepago', 'LIKE', "%$fechadepago%");
	}
}
