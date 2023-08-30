<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre del Orden') !!}
      <div class="form-horizontal {{ $errors->has('nombreOrden') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreOrden',NULL, ['class'=>'form-control','id'=>'nombreOrden','placeholder'=>'Nombre del Orden']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreOrden', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idClase') ? 'has-error' : "" }}">
        {!! form::label('Seleccione la Clase:') !!}
      <select name="idClase" class="form-control">
                <option disabled selected>Seleccione Clase</option>
                @foreach($clases as $clase)
                      <option value="{{$clase->id}}">{{$clase->nombreClase}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idClase', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('orden.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
      
