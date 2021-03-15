<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre del género') !!}
      <div class="form-horizontal {{ $errors->has('nombreGenero') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreGenero',NULL, ['class'=>'form-control','id'=>'nombre','placeholder'=>'Nombre del género']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreGenero', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idFamilia') ? 'has-error' : "" }}">
        {!! form::label('Seleccione la familia:') !!}
      <select name="idFamilia" class="form-control">
                <option disabled selected>Seleccione Familia </option>
                @foreach($familias as $familia)
                      <option value="{{$familia->id}}">{{$familia->nombreFamilia}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idFamilia', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('genero.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
      
