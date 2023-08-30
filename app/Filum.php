<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Filum extends Model
{

  use LogsActivity;
  
    protected $fillable = ['idReino', 'nombreFilum'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreFilum)
	{
		return $query->where('nombreFilum', 'LIKE', "%$nombreFilum%");
	}

	public function Reino(){
    return $this->belongsTo('App\Reino', 'idReino');
   }

	public function Dominio(){
    return $this->belongsTo('App\Dominio', 'idDominio');
}
}
