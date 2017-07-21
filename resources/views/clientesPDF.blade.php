<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de Clientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 style=>Lista de Clientes</h1><br><br>
    <table class ="table">
    <thead>
    <tr>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Edad</th>
      <th>Hijos</th>
      <th>Genero</th>
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
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>
