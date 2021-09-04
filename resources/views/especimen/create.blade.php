@extends ('layouts.app')
@section('content') 
<div class="row">
    <div class="col-md-7 col-md-offset-2">
      <br>
      {{ Form::open(['route'=>'especimen.store', 'method'=>'POST', 'class'=>'agregar', 'files'=>'true']) }}
        @include('especimen.form_master')
      {{ form::close() }}
    </div>
  </div>


  <!--Script para mostrar formulario y Alerta confirmar Guardar con ajax-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
$('.agregar').submit(function(e){
     e.preventDefault();Swal.fire({
  title: '¿Está seguro de guardar éste especímen?',
  showDenyButton: true,
  //showCancelButton: true,
  confirmButtonText: `Guardar`,
  denyButtonText: `Cancelar`,
})
     .then((result) => {
    if (result.isConfirmed) {
     this.submit();
    }
})
});
</script>
@endsection
