<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Catcuenta extends Model
{
    use LogsActivity;

    protected $fillable = ['cuenta', 'subcuenta', 'cuentaDetalle', 'rubroDesc', 'estatus', 'saldoInicial', 'debe', 'haber', 'saldo'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombre)
    {
        return $query->where('rubroDesc', 'LIKE', "%$nombre%");
    }
 }