<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Contribuyentes extends Model
{
    use LogsActivity;

    protected $fillable = ['tipo', 'tipo2', 'nombreContrib', 'noIdentif', 'noRegistro', 'giro', 'direccion', 'categoria', 'estatus', 'estatus2'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombre)
    {
        return $query->where('nombreContrib', 'LIKE', "%$nombre%");
    }
}