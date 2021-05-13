<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['nombreDepto'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreDepto)
	{
		return $query->where('nombreDepto', 'LIKE', "%$nombreDepto%");
	}
}
