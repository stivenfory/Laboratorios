<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <title>Vehiculos | Sistema Web</title>
 </head><body>
 <div class="container">
 <h3 class="text-center">Reporte de Vehiculos</h3>
 <img align="right" src="" alt="" width='100px'>
 <br><br>
 <h1 class="text-center">Parqueadero el xxx</h1>
 <h3 class="text-center">NIT: 123456-1</h3>
 <h3 class="text-center">Tel. 555555</h3>
 <br> <br> <br>
 <table class="table table-bordered table-striped table-hover">
 <tr>
 <th>Tipo Vehiculo</th>
 <th>Placa</th>
 </tr>
 @foreach($vehiculos as $ve)
 <tr>
 <td>ID: {{$ve->tipo_vehiculo_id}}: {{$ve->nombre}}</td>
 <td>{{$ve->placa}}</td>
 </tr>
 @endforeach
 </table>
 <h5 class="text-center">Usuario: {{auth()->user()->name}}</h5>
 <h6 align="center">Software de Parqueaderos version 1</h6>
 </div>
 </body>
</html>
