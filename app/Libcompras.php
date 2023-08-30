<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Libcompras extends Model
{
	use LogsActivity;
	
    protected $fillable = ['tipoDoc', 'tipo2', 'ccf', 'fechaccf', 'mes', 'año', 'idContribuyente', 'estatus', 'estatus2', 'montoGravado', 'iva', 'riva', 'renta'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombre)
    {
        return $query->where('tipoDoc', 'LIKE', "%$nombre%");
    }
}