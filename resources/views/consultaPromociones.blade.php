@extends('master')
@section('contenido')
<table class="table table-hover">
  <thead>
    <tr>
      <th>Descripcion</th>
      <th>Fecha de Inicio</th>
      <th>Fecha de Finalización</th>
      <th><a href="{{url('/promocionesPDF')}}">PDF</th>
    </tr>
  </thead>
  <tbody>
  @foreach($promociones as $p)
    <tr>
      <td>{{$p->descripcion}}</td>
      <td>{{$p->fecha_inicio}}</td>
      <td>{{$p->fecha_fin}}</td>
      <td>
        <a href="{{url('/enviarPromocion')}}/{{$p->id}}" class="btn btn-success btn-xs">Enviar</a>
        <a href="{{url('/editarPromocion')}}/{{$p->id}}" class="btn btn-xs btn-primary">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="{{url('/eliminarPromocion')}}/{{$p->id}}" class="btn btn-xs btn-danger">
        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
      </td>
    </tr>
  @endforeach
  </tbody>
  @include('flash::message')
</table>
<script type="text/javascript">
    setTimeout(function(){
        $(".alert").fadeOut(1500);
    },1500);
    </script>

@stop