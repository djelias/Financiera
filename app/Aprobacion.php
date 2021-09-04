<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Aprobacion extends Model
{

  use LogsActivity;

    protected $fillable = ['idInvestigacion', 'descripcion', 'observacion', 'fecha', 'estado', 'estado2'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $descripcion)
	{
		return $query->where('descripcion', 'LIKE', "%$descripcion%");
	}

    public function Investigacion(){
    return $this->belongsTo('App\Investigacion', 'idInvestigacion');
   }
}
