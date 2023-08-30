<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Reino extends Model
{

  use LogsActivity;
  
    protected $fillable = ['idDominio', 'nombreReino'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreReino)
	{
		return $query->where('nombreReino', 'LIKE', "%$nombreReino%");
	}
	public function Dominio(){
    return $this->belongsTo('App\Dominio', 'idDominio');
}
}
