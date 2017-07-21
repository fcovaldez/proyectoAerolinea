<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de Clientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1 style=>Lista de Promociones</h1><br><br>
    <table class ="table">
    <thead>
    <tr>
      <th>Descripcion</th>
      <th>Fecha de inicio</th>
      <th>Fecha de finalizacion</th>
    </tr>
  </thead>
  <tbody>
  @foreach($promociones as $p)
    <tr>
      <td>{{$p->descripcion}}</td>
      <td>{{$p->fecha_inicio}}</td>
      <td>{{$p->fecha_fin}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>
