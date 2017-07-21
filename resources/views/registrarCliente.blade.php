@extends ('master')
@section ('contenido')
<form action="{{url('/guardarCliente')}}" method="POST">
     <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
         <div class="form-group">
            <label for="correo">Email</label>
            <input type="email" class="form-control" name="correo" required>
        </div>
         <div class= "form-group">
            <label for"fecha_nacimiento">Fecha de Nacimiento</label>
            <input type ="date" class="form-control" name="fecha_nacimiento" required>
        </div>
         <div class= "form-group">
            <label for="genero">Genero</label><br>
            <input type="radio" name="genero" value="M">Masculino<br>
            <input type="radio" name="genero" value="F">Femenino<br>
        </div>
        <div class= "form-group">
            <label for="hijos">Hijos</label><br>
            <input type="radio" name="hijos" value="Si">Si<br>
            <input type="radio" name="hijos" value="No">No<br>
        </div>
        <div>
            <button type= "submit" class="btn btn-success">Registrar</button>
            <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
        </div>
        
    </form>
@stop