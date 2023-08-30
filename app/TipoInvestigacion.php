<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TipoInvestigacion extends Model
{
  public $table = "tipoInvestigacions";

  use LogsActivity;
  
    //
  
    protected $fillable = ['nombreTipo','descripcionTipo'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreTipo)
	{
		return $query->where('nombreTipo', 'LIKE', "%$nombreTipo%");
	}


}
