@extends ('master')
@section ('contenido')
<form action="{{url('/actualizarCliente')}}/{{$cliente->id}}" method="POST">
     <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required value="{{$cliente->nombre}}">
        </div>
         <div class="form-group">
            <label for="correo">Email</label>
            <input type="email" class="form-control" name="correo" required value="{{$cliente->correo}}">
        </div>
         <div class= "form-group">
            <label for"fecha_nacimiento">Fecha de Nacimiento</label>
            <input type ="date" class="form-control" name="fecha_nacimiento" required value="{{$cliente->fecha_nacimiento}}">
        </div>
         <div class= "form-group">
            <label for="genero">Genero</label><br>
            @if($cliente->genero=="M")
                <input type="radio" name="genero" value="M" checked="checked">Masculino<br>
                <input type="radio" name="genero" value="F">Femenino<br>
            @else
                <input type="radio" name="genero" value="M">Masculino<br>
                <input type="radio" name="genero" value="F" checked="checked">Femenino<br>
            @endif
        </div>
        <div class= "form-group">
            <label for="hijos">Hijos</label><br>
            @if($cliente->hijos=="Si")
                <input type="radio" name="hijos" value="Si" checked="checked">Si<br>
                <input type="radio" name="hijos" value="No">No<br>
            @else
                <input type="radio" name="hijos" value="Si">Si<br>
                <input type="radio" name="hijos" value="No" checked="checked">No<br>
            @endif
        </div>
        <div>
            <button type= "submit" class="btn btn-success">Actualizar</button>
            <a href="{{url('/consultaclientes')}}" class="btn btn-danger">Cancelar</a>
        </div>
        
    </form>
@stop