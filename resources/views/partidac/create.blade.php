@extends('layouts.app2')

@section('content')


      
      {{ Form::open(['route'=>'partidac.store', 'method'=>'POST']) }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        
        <h3>Nueva partida
        </h3>
        <a href="{{ route('partidac.index') }}">
    <button>Regresar</button>
  </a>

        <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="tipo">Tipo de partida</label>
            <select name="tipo" class="form-control" required>
              <option value="1">Ingreso</option>
              <option value="2">Egreso</option>
              <option value="3">Diario</option>
              <option value="4">CxC</option>
              <option value="5">CxP</option>
              <option value="6">Cierre</option>
            </select> 
          </div>
        </div><!-- fin col-md-3 -->
        <div class="col-md-3">
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" placeholder="Fecha" required>
          </div>
        </div><!-- fin col-md-3 -->

        <div class="col-md-3">
          <div class="form-group">
            <label for="correlativo">Correlativo</label>
                  <?php 
                  if (Empty($partidacs)) {
                    $correl = 1;
                  }else{
                  $correl = $partidacs->correlativo + 1;
                }
                   ?>
                  
            <input type="text" name="correlativo" class="form-control" placeholder="{{ $correl }}" value="{{ $correl }}" required>
          </div>
        </div><!-- fin col-md-3 -->
        </div><!-- fin row cabecera -->

        <div class="row">
          <div class="panel panel-body panel-primary">
            <div class="col-md-2">
              <div class="form-group">
                <label for="idcuenta">Cuenta</label>
              <select name="idcuenta" id="idcuenta" class="form-control selectpicker" data-live-search="true">
                  @foreach($catcuentas as $art)
                  @if($art->cuentaDetalle!=NULL || $art->subcuenta!=NULL)
                  <option value="{{ $art->estatus }}{{ $art->subcuenta }}{{ $art->cuentaDetalle }}">
                    {{ $art->subcuenta }}{{ $art->cuentaDetalle }}{{ $art->rubroDesc }}
                  </option>
                  @endif
                  @endforeach
              </select>
              </div>
            </div>
            <div class="col-md-3">
          <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion">
          </div>
        </div><!-- fin col-md-3 -->
            <div class="col-md-2">
              <div class="form-group">
                <label for="ptipo2">Movimiento</label>
                <select name="ptipo2" id="ptipo2" class="form-control">
              <option value="Debe">Debe</option>
              <option value="Haber">Haber</option>
            </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="pcantidad">Valor</label>
                <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
              </div>
            </div>
            
            <div class="col-md-2">
              <div class="form-group">
                <button type="button" id="bt_add" class="btn btn-primary">
                  Agregar
                </button>
              </div>
            </div>
            
            <div class="col-md-12">
              <table id="detalles" class="table table-striped table-bordered table-hover table-condensed" style="margin-top: 10px">
                <thead style="background-color: #A9D0F5">
                  <th>Opciones</th>
                  <th>Cuenta</th>
                  <th>Descripcion</th>
                  <th>Debe</th>
                  <th>Haber</th>
                  <th></th>
                </thead>
                <tfoot>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th><h4 id="Debetotals">0.00</th>
                  <th><h4 id="Habertotals">0.00</th>
                  <th><h4 id="totals">0.00</h4></th>
                </tfoot>
                <tbody>
                  
                </tbody>
              </table>
            </div>

          </div><!-- panel-body -->
        </div><!-- fin row detalle -->
        
        <div class="row">
        <div class="col-md-12" id="guardar">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">
              Guardar
            </button>
          </div>
        </div>
        </div><!-- fin row buttons -->
      {{ form::close() }}

@push('scripts')
<script>
  
  $(document).ready(function(){
    $("#bt_add").click(function(){
      agregar();
    });
  });
  var cont = 0;
  var aux = 0;
  var totals = 0;
  var Debetotals = 0;
  var Habertotals = 0;
  var subtotal = [];
  var subtotal2 = [];
  var subtotal3 = [];
  //Cuando cargue el documento
  //Ocultar el botón Guardar
  $("#guardar").hide();
  function agregar(){
    //Obtener los valores de los inputs
    idcuenta = $("#idcuenta").val();
    cuenta = $("#idcuenta option:selected").text();
    cantidad = $("#pcantidad").val();
    desc = $("#descripcion").val();
    tipo2 = $("#ptipo2").val();
    //Validar los campos
    if (tipo2 == "Debe") {
      tipo3 = -1;
      if(idcuenta != "" && cantidad > 0 && tipo2 != ""){
      //subtotal array inicie en el indice cero
      subtotal[cont] = (cantidad * tipo3);
      subtotal2[cont] = (cantidad * 1);
      totals = totals + subtotal[cont];
      totals = Math.round(totals*100)/100;
      Debetotals = Debetotals + subtotal2[cont];
      Debetotals = Math.round(Debetotals*100)/100;

      var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="idcuenta[]" value="'+idcuenta+'">'+cuenta+'</td><td><input type="hidden" name="desc[]" value="'+desc+'">'+desc+'</td><td><input type="number" name="debe[]" value="'+cantidad+'"></td><td><input type="number" name="haber[]" value="'+aux+'"></td><td><input type="hidden" name="tipo2[]" value="'+tipo2+'"></td></tr>';
      cont++;
      limpiar();
      $("#Debetotals").html("$" + Debetotals);
      $("#totals").html("$" + totals);
      evaluar();
      $("#detalles").append(fila);
    }else{
      alert("Error al ingresar el detalle del ingreso, revise los datos del asiento contable");
    }
    }else{
      tipo3 = 1;
      if(idcuenta != "" && cantidad > 0 && tipo2 != ""){
      //subtotal array inicie en el indice cero
      subtotal[cont] = (cantidad * tipo3);
      subtotal2[cont] = (cantidad * 1);
      totals = totals + subtotal[cont];
      totals = Math.round(totals*100)/100;
      Habertotals = Habertotals + subtotal2[cont];
      Habertotals = Math.round(Habertotals*100)/100;
      var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="idcuenta[]" value="'+idcuenta+'">'+cuenta+'</td><td><input type="hidden" name="desc[]" value="'+desc+'">'+desc+'</td><td><input type="number" name="debe[]" value="'+aux+'"></td><td><input type="number" name="haber[]" value="'+cantidad+'"></td><td><input type="hidden" name="tipo2[]" value="'+tipo2+'"></td></tr>';
      cont++;
      limpiar();
      $("#Habertotals").html("$" + Habertotals);
      $("#totals").html("$" + totals);
      evaluar();
      $("#detalles").append(fila);
    }else{
      alert("Error al ingresar el detalle del ingreso, revise los datos del asiento contable");
    }
    }
    
  }
  function limpiar(){
    $("#pcantidad").val("");
    $("#ptipo2").val("");
    $("#descripcion").val("");
  }
  //Muestra botón guardar
  function evaluar(){
    if(totals == 0){
      $("#guardar").show();
    }else{
      $("#guardar").hide();
    }
  }
  function eliminar(index){
    totals = totals-subtotal[index];
    totals = Math.round(totals*100)/100;
    Debetotals = Debetotals+subtotal2[index];
    Debetotals = Math.round(Debetotals*100)/100;
    Habertotals = Habertotals-subtotal2[index];
    Habertotals = Math.round(Habertotals*100)/100;
    $("#totals").html("$" + totals);
    $("#Debetotals").html("$" + Debetotals);
    $("#Habertotals").html("$" + Habertotals);
    $("#fila" + index).remove();
    evaluar();
  }
  $(document).ready(function() {
var data = {}; 
$("#cliente option").each(function(i,el) {  
   data[$(el).data("value")] = $(el).val();
});
// `data` : object of `data-value` : `value`
console.log(data, $("#cliente option").val());
    $('#submit').click(function()
    {
        var value = $('#selected').val();
        alert($('#cliente [value="' + value + '"]').data('value'));
    });
});
</script>
@endpush
@endsection