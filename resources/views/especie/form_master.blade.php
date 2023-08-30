<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre de la especie') !!}
      <div class="form-horizontal {{ $errors->has('nombreEspecie') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreEspecie',NULL, ['class'=>'form-control','id'=>'nombre','placeholder'=>'Nombre de la Especie']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreEspecie', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idGenero') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el género:') !!}
   
      <select name="idGenero" class="form-control" onchange="reino()">
                <option disabled selected>Seleccione género </option>
                   @foreach($generos as $genero)  
                      <option value="{{$genero->id}}">{{$genero->nombreGenero}}</option>
                @endforeach
            </select>
      
          <div class="help-block" > 
          {{ $errors->first('idGenero', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>

        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('especie.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
 
