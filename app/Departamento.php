<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Departamento extends Model
{

  use LogsActivity;
  
    protected $fillable = ['nombreDepto'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreDepto)
	{
		return $query->where('nombreDepto', 'LIKE', "%$nombreDepto%");
	}
}
