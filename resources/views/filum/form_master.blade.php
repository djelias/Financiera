<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre del Filum:') !!}
      <div class="form-horizontal {{ $errors->has('nombreFilum') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreFilum',NULL, ['class'=>'form-control','id'=>'nombreFilum','placeholder'=>'Nombre del filum']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreFilum', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idReino') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el Reino:') !!}
      <select name="idReino" class="form-control">
                <option disabled selected>Seleccione reino</option>
                @foreach($reinos as $reino)
                      <option value="{{$reino->id}}">{{$reino->nombreReino}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idReino', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('filum.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
      
