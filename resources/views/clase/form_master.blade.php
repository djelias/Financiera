<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre de la clase') !!}
      <div class="form-horizontal {{ $errors->has('nombreClase') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreClase',NULL, ['class'=>'form-control','id'=>'nombreClase','placeholder'=>'Nombre de la clase']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreClase', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idFilum') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el Filum:') !!}
      <select name="idFilum" class="form-control">
                <option disabled selected>Seleccione filum</option>
                @foreach($filums as $filum)
                      <option value="{{$filum->id}}">{{$filum->nombreFilum}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idFilum', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('clase.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
      
