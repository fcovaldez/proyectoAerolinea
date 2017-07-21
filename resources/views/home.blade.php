@extends ('master')
@section ('contenido')
<div class="jumbotron">
  <h1>Bienvenido</h1>
  <p>Sistema de aerolinea
  </p>
  <p><a class="btn btn-primary btn-lg">Ver más...</a></p>
</div>
 @include('flash::message')
<script type="text/javascript">
    setTimeout(function(){
        $(".alert").fadeOut(1500);
    },1500);
    </script>
@stop
