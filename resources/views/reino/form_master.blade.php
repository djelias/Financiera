<div class="row">
  <br>
     <div class="col-sm-5">
       {!! form::label('Ingrese nombre del Reino:') !!}
      <div class="form-horizontal {{ $errors->has('nombreReino') ? 'has-error' : "" }}">
            <i> {{ Form::text('nombreReino',NULL, ['class'=>'form-control','id'=>'nombreReino','placeholder'=>'Nombre del reino']) }}  </i> 
            <div class="help-block" > 
          {{ $errors->first('nombreReino', 'Ingrese los datos correctamente') }}
      </div>
      </div>
      </div>
      
     <div class="col-sm-5">
      <div class="form-horizontal {{ $errors->has('idDominio') ? 'has-error' : "" }}">
        {!! form::label('Seleccione el Dominio:') !!}
      <select name="idDominio" class="form-control">
                <option disabled selected>Seleccione dominio</option>
                @foreach($dominios as $dominio)
                      <option value="{{$dominio->id}}">{{$dominio->nombreDominio}}</option>
                 @endforeach
            </select>
            <div class="help-block" > 
          {{ $errors->first('idDominio', 'Debe seleccionar una opción') }}
      </div>          
 </div>
</div>
        <div>
        <br>
        {{ Form::button(isset($model)? 'Update' : 'Guardar' , ['class'=>'btn btn-success btn-sm','type'=>'submit']) }}
        <a class="btn btn-danger btn-sm" href="{{ route('reino.index') }}">Cancelar</a>
      </div>
      
    </div>
     
      <br>
      