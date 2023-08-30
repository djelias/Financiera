<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Prestamo extends Model
{

  use LogsActivity;
  
    protected $fillable = ['idprest', 'codigoPrestamo', 'periodicidad', 'tasa', 'tiempo', 'cantidad', 'descrip', 'pago', 'fechadePago', 'pendpago', 'fechapago', 'intereses'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $codigoPrestamo)
	{
		return $query->where('codigoPrestamo', 'LIKE', "%$codigoPrestamo%");
	}
}