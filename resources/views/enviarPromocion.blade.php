@extends ('master')
@section ('contenido')
<h1>{{$promocion->descripcion}}</h1>
<form action="{{url('/enviarCorreo')}}/{{$promocion->id}}" method="POST">
<input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
<h5>Selecciona al grupo de personas que desees enviar la promocion</h5>
<input type="checkbox" name="may18">Personas mayores de 18 <br>
<input type="checkbox" name= "confamilia">Personas con hijos<br>
<input type="checkbox" name="femenino">Personas del genero Femenino<br>
<input type="checkbox" name="masculino">Personas del genero Masculino <br>
<br>
<div>
    <button type"submit" class="btn btn-success">Enviar</button>
    <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
</div>
</form>
@stop