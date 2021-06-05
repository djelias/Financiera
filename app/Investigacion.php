<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
        
    protected $fillable = ['idZona','idMunicipio','idTipo','idUsuario','nombreInv','fechaIngreso','lugarInv','responsableInv','objetivo','contacto','unidadEncargada','otrasInstit','documentacion','descripcionInvestigacion','correoElectronico'];
    protected $dates = ['created_at','updated_at'];

    public function scopeNombre($query, $nombreInv)
	{
		return $query->where('nombreInv', 'LIKE', "%$nombreInv%");
	}
	public function Zona(){
    return $this->belongsTo('App\Zona', 'idZona');
}
public function Municipio(){
    return $this->belongsTo('App\Municipio', 'idMunicipio');
}
public function TipoInvestigacion(){
    return $this->belongsTo('App\TipoInvestigacion', 'idTipo');
}
public function User(){
    return $this->belongsTo('App\User', 'idUsuario');
}
}
