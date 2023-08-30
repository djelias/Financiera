@extends('layouts.app2')

@section('content')


      
      {{ Form::open(['route'=>'libcompras.store', 'method'=>'POST']) }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        
        <h3>Nuevo ingreso
        </h3>
        

        <div class="row">
          <div class="panel panel-body panel-primary">
            <div class="col-md-3">
          <div class="form-group">
            <label for="tipoDoc">Tipo de documento</label>
            <select name="tipoDoc" id="tipoDoc" class="form-control" required>
              <option value="Compra Local">Compra Local</option>
              <option value="Importacion">Importacion</option>
              <option value="Nota de Credito">Nota de Credito</option>
              <option value="Documento Contable de Liquidacion">Documento Contable de Liquidacion</option>
              <option value="Retencion de IVA (No inscritos al iva)">Retencion de IVA (No inscritos al iva)</option>
              <option value="Retencion de iva (Comp. de retencion com">Retencion de iva (Comp. de retencion com</option>
            </select> 
          </div>
        </div>
            <div class="col-md-3">
          <div class="form-group">
            <label for="ccf">CCF #</label>
            <input type="text" name="ccf" id="ccf" class="form-control">
          </div>
        </div><!-- fin col-md-3 -->
            <div class="col-md-4">
          <div class="form-group">
            <label for="fechaccf">Fecha CCF</label>
            <input type="date" name="fechaccf" id="fechaccf" class="form-control" min = "<?php echo date("Y-m-d",strtotime(date("Y-m-d")."- 90 days"));?>" onkeydown="return false">
          </div>
        </div>

        <div class="col-md-2">
              <div class="form-group">
                <button type="button" id="bt_add" class="btn btn-primary">
                  Agregar
                </button>
              </div>
            </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="mes">Mes</label>
            <input type="text" name="mes" id="mes" class="form-control">
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label for="año">Año</label>
            <input type="text" name="año" id="año" class="form-control">
          </div>
        </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="montoGravado">Monto Gravado</label>
                <input type="number" name="montoGravado" id="montoGravado" class="form-control" placeholder="Cantidad">
              </div>
            </div>

            <div class="col-md-5">
              <div class="form-group">
                <label for="idContribuyente">Registro</label>
              <select name="idContribuyente" id="idContribuyente" class="form-control selectpicker" data-live-search="true">
                  @foreach($contribuyentes as $art)
                  <option value="{{ $art->nombreContrib }}">
                    {{ $art->nombreContrib }}
                  </option>
                  @endforeach
              </select>
              </div>
            </div>
            
            <div class="col-md-3">
          <div class="form-group">
            <label><strong>Calculo de impuestos :</strong></label><br>
                                <label><input type="checkbox" name="calculo1" id="calculo1"> No sujetas</label>
                                <label><input type="checkbox" name="calculo2" id="calculo2"> Exento</label>
                                <label><input type="checkbox" name="calculo3" id="calculo3"> Iva</label>
                                <label><input type="checkbox" name="calculo4" id="calculo4"> R. iva</label>
                                <label><input type="checkbox" name="calculo5" id="calculo5"> Renta</label>
          </div>
        </div>

            
            <div class="col-md-12">
              <table id="detalles" class="table table-striped table-bordered table-hover table-condensed" style="margin-top: 10px">
                <thead style="background-color: #A9D0F5">
                  <th>Opciones</th>
                  <th>Numero</th>
                  <th>Registro</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Anulado</th>
                  <th>Sneto</th>
                  <th>Siva</th>
                  <th>Sriva</th>
                  <th>Stotal</th>
                  <th>Srenta</th>
                </thead>
                <tfoot>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><h4 id="snetots">0.00</th>
                  <th><h4 id="sivats">0.00</th>
                  <th><h4 id="srivats">0.00</h4></th>
                  <th><h4 id="montots">0.00</h4></th>
                  <th><h4 id="srentats">0.00</h4></th>
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
  var sneto = [];
  var snetot = 0;
  var snetots = 0;
  var siva = [];
  var sivat = 0;
  var sivats = 0;
  var sriva = [];
  var srivat = 0;
  var srivats = 0;
  var srenta = [];
  var srentat = 0;
  var srentats = 0;
  var montot = [];
  var montott = 0;
  var montots = 0;
  var montotss = 0;
  var tipo2 = [];
  var tipo2t = "0";
  var Habertotals = 0;
  var subtotal = [];
  var subtotal2 = [];
  var subtotal3 = [];
  var montoGravado2 = [];
  var sneto2 = 0;
  var siva2 = 0;
  var sriva2 = 0;
  var srenta2 = 0;
  //Cuando cargue el documento
  //Ocultar el botón Guardar
  $("#guardar").hide();
  function agregar(){
    //Obtener los valores de los inputs
    tipoDoc = $("#tipoDoc option:selected").val();
    ccf = $("#ccf").val();
    fechaccf = $("#fechaccf").val();
    montoGravado = $("#montoGravado").val();
    idContribuyente = $("#idContribuyente option:selected").val();
    calculo1 = document.getElementById("calculo1").checked;
    calculo2 = document.getElementById("calculo2").checked;
    calculo3 = document.getElementById("calculo3").checked;
    calculo4 = document.getElementById("calculo4").checked;
    calculo5 = document.getElementById("calculo5").checked;
    //Validar los campos
      if(tipoDoc != "" && montoGravado > 0){
      //subtotal array inicie en el indice cero
        if(calculo1){

          sneto[cont] = (montoGravado);
          sneto2 = Math.round(sneto[cont]*100)/100;
          snetot = snetot + sneto2;
          siva[cont] = 0;
          siva2 = Math.round(siva[cont]*100)/100;
          sivat = sivat + siva2;
          montoGravado = montoGravado * 1;
          montot[cont] = montoGravado;
          tipo2t = "No sujetas";
          tipo2[cont] = tipo2t;
          srenta2 = 0;
          srenta[cont] = srenta2;
          sriva2 = 0;
          sriva[cont] = sriva2;

        } else if(calculo2){

          sneto[cont] = (montoGravado);
          sneto2 = Math.round(sneto[cont]*100)/100;
          snetot = snetot + sneto2;
          siva[cont] = 0;
          siva2 = Math.round(siva[cont]*100)/100;
          sivat = sivat + siva2;
          montoGravado = montoGravado * 1;
          montot[cont] = montoGravado;
          tipo2t = "Exento"; 
          tipo2[cont] = tipo2t;
          srenta2 = 0;
          srenta[cont] = srenta2;
          sriva2 = 0;
          sriva[cont] = sriva2;

        } else if(calculo3){

          sneto[cont] = (montoGravado / 1.13);
          sneto2 = Math.round(sneto[cont]*100)/100;
          snetot = snetot + sneto2;
          siva[cont] = (montoGravado - sneto[cont]);
          siva2 = Math.round(siva[cont]*100)/100;
          sivat = sivat + siva2;
          montoGravado = montoGravado * 1;
          montoGravado = montoGravado;
          montot[cont] = montoGravado ;       
          tipo2t = "Iva"; 
          tipo2[cont] = tipo2t;
          srenta2 = 0;
          srenta[cont] = srenta2;
          sriva2 = 0;
          sriva[cont] = sriva2;

        } else if(calculo4){

          if (montoGravado > 99) {

            sneto[cont] = (montoGravado * 1);
            sneto2 = Math.round(sneto[cont]*100)/100;
            snetot = snetot + sneto2;
            sriva[cont] = (montoGravado * 0.01);
            sriva2 = Math.round(sriva[cont]*100)/100;
            srivat = srivat + sriva2;
            montoGravado = montoGravado * 1;
            montoGravado = montoGravado + sriva2;
            montot[cont] = montoGravado ;
            tipo2t = "R. iva"; 
            tipo2[cont] = tipo2t;
            srenta2 = 0;
            srenta[cont] = srenta2;
            siva2 = 0;
            siva[cont] = siva2;

          } else {

            sneto[cont] = (montoGravado);
            sneto2 = Math.round(sneto[cont]*100)/100;
            snetot = snetot + sneto2;
            sriva[cont] = 0;
            sriva2 = Math.round(sriva[cont]*100)/100;
            srivat = srivat + sriva2;
            montoGravado = montoGravado * 1;
            montot[cont] = montoGravado;
            tipo2t = "R. iva"; 
            tipo2[cont] = tipo2t;
            srenta2 = 0;
            srenta[cont] = srenta2;
            siva2 = 0;
            siva[cont] = siva2;

          }

        } else if(calculo5){

          sneto[cont] = (montoGravado * 1);
          sneto2 = Math.round(sneto[cont]*100)/100;
          snetot = snetot + sneto2;
          sriva2 = 0;
          sriva[cont] = sriva2;
          siva[cont] = 0;
          srenta[cont] = (montoGravado * 0.1);
          srenta2 = Math.round(srenta[cont]*100)/100;
          srentat = srentat + srenta2;
          montoGravado = montoGravado * 1;
          montoGravado = montoGravado + srenta2;
          montot[cont] = montoGravado ;
          tipo2t = "Renta"; 
          tipo2[cont] = tipo2t;

        } else {
      
      siva[cont] = (montoGravado * 0.13);
      sneto[cont] = (montoGravado * 1);
      siva2 = Math.round(siva[cont]*100)/100;
      sivat = sivat + siva2;
      sneto2 = Math.round(sneto[cont]*100)/100;
      snetot = snetot + sneto2;
      montoGravado = montoGravado * 1;
      montoGravado = montoGravado + siva2;
      montot[cont] = montoGravado;
      tipo2t = "En blanco"; 
      tipo2[cont] = tipo2t;
      srenta2 = 0;
      srenta[cont] = srenta2;
      sriva2 = 0;
      sriva[cont] = sriva2;

      }

      snetots = snetots + sneto2;
      snetots = Math.round(snetots*100)/100;
      sivats = sivats + siva2;
      sivats = Math.round(sivats*100)/100;
      srivats = srivats + sriva2;
      srivats = Math.round(srivats*100)/100;
      srentats = srentats + srenta2;
      srentats = Math.round(srentats*100)/100;
      montots = montots + montoGravado;
      montots = Math.round(montots*100)/100; 

      var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="ccf[]" value="'+ccf+'">'+ccf+'</td><td><input type="hidden" name="tipoDoc[]" value="'+tipoDoc+'">'+tipoDoc+'</td><td><input type="hidden" name="idContribuyente[]" value="'+idContribuyente+'">'+idContribuyente+'</td><td><input type="hidden" name="fechaccf[]" value="'+fechaccf+'">'+fechaccf+'</td><td><input type="hidden" name="tipo2[]" value="'+tipo2t+'">'+tipo2t+'</td><td></td><td><input type="hidden" name="sneto2[]" value="'+sneto2+'">'+sneto2+'</td><td><input type="hidden" name="siva[]" value="'+siva2+'">'+siva2+'</td><td><input type="hidden" name="sriva[]" value="'+sriva2+'">'+sriva2+'</td><td><input type="hidden" name="montot[]" value="'+montoGravado+'">'+montoGravado+'</td><td><input type="hidden" name="srenta[]" value="'+srenta2+'">'+srenta2+'</td></tr>';
      cont++;
      limpiar();
      $("#snetots").html("$" + snetots);
      $("#sivats").html("$" + sivats);
      $("#srivats").html("$" + srivats);
      $("#srentats").html("$" + srentats);
      $("#montots").html("$" + montots);
      evaluar();
      $("#detalles").append(fila);
    }else{
      alert("Error al ingresar el detalle del ingreso, revise los datos del credito fiscal");
    }
   
    
  }
  function limpiar(){
    $("#ccf").val("");
    $("#fechaccf").val("");
    $("#montoGravado").val("");
  }
  //Muestra botón guardar
  function evaluar(){
    if(montot != 0){
      $("#guardar").show();
    }else{
      $("#guardar").hide();
    }
  }
  function eliminar(index){
    montots = montots - montot[index];
    montots = Math.round(montots*100)/100; 
    sivats = sivats - siva[index];
    sivats = Math.round(sivats*100)/100;
    srivats = srivats - sriva[index];
    srivats = Math.round(srivats*100)/100;
    srentats = srentats - srenta[index];
    srentats = Math.round(srentats*100)/100;
    snetots = snetots - sneto[index];
    snetots = Math.round(snetots*100)/100;
    $("#sivats").html("$" + sivats);
    $("#srivats").html("$" + srivats);
    $("#srentats").html("$" + srentats);
    $("#snetots").html("$" + snetots);
    $("#montots").html("$" + montots);
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