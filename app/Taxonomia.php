<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxonomia extends Model
{
    protected $fillable = ['idEspece', 'idColeccion','idEspecimen', 'NumVoucher','nomComun'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $NumVoucher)
	{
		return $query->where('NumVoucher', 'LIKE', "%$NumVoucher%");
	}
	public function Especie(){
    return $this->BelongsTo('App\Especie', 'idRiesgo');

    public function Especimen(){
    return $this->BelongsTo('App\Coleccion', 'idRiesgo');

    public function Coleccion(){
    return $this->BelongsTo('App\Especimen', 'idRiesgo');
}
}
