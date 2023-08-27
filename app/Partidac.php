<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Partidac extends Model
{

  use LogsActivity;
  
    protected $fillable = ['idcatalogo','tipo', 'tipo2', 'correlativo', 'fecha', 'descripcion', 'estatus', 'saldoInicial', 'debe', 'haber', 'saldo', 'estatus', 'estatus2'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $tipo)
	{
		return $query->where('tipo', 'LIKE', "%$tipo%");
	}
}
