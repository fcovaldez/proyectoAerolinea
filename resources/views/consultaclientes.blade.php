@extends('master')
@section('contenido')
<table class="table table-hover">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Edad</th>
      <th>Hijos</th>
      <th>Genero</th>
      <th><a href="{{url('/clientesPDF')}}">PDF</th>
    </tr>
  </thead>
  <tbody>
  @foreach($clientes as $c)
    <tr>
      <td>{{$c->nombre}}</td>
      <td>{{$c->correo}}</td>
      <td>{{$c->edad}}</td>
      <td>{{$c->hijos}}</td>
      <td>
        @if($c->genero=="M")
        Masculino
        @elseif($c->genero=="F")
        Femenino
        @endif
      </td>
      <td>
        <a href="{{url('/editarCliente')}}/{{$c->id}}" class="btn btn-xs btn-primary">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a href="{{url('/eliminarCliente')}}/{{$c->id}}" class="btn btn-xs btn-danger">
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