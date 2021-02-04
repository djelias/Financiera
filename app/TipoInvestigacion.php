<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInvestigacion extends Model
{
    //
     protected $fillable = ['nombreTipo'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreTipo)
	{
		return $query->where('nombreTipo', 'LIKE', "%$nombreTipo%");
	}


}
