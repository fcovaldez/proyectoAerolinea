@extends ('master')
@section ('contenido')
<form action="{{url('/guardarPromocion')}}" method="POST">
     <input type="hidden" id="token" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" name="descripcion" required>
        </div>
         <div class= "form-group">
            <label for"fecha_inicio">Fecha de Inicio</label>
            <input type ="date" class="form-control" name="fecha_inicio" required>
        </div>
        <div class= "form-group">
            <label for"fecha_fin">Fecha de Finalización</label>
            <input type ="date" class="form-control" name="fecha_fin" required>
        </div>
        <div>
            <button type= "submit" class="btn btn-success">Registrar</button>
            <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
        </div>
        
    </form>
@stop