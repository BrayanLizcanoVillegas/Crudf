<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Empleados</title>
  </head>
  <body>
    <a type="button" class="btn btn-primary" href="{{url('empleados/create')}}">AGREGAR EMPELADO</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">CORREO</th>
            <th scope="col">FOTO</th>
            <th scope="col">ACCIONES</th>

          </tr>
        </thead>
        <tbody>
            @foreach($empelados as $empleado)
          <tr>
            <th scope="row">{{$empleado->id}}</th>
            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->Apellido}}</td>
            <td>{{$empleado->Correo}}</td>
            <td><img src="{{ asset('storage').'/'.$empleado->Foto}}" alt width="200"></td>
            <td> <a class="btn btn-success" href="{{url ('/empleados/'.$empleado->id.'/edit')}}">Modificar
                </a> | 
                <form method="post" action="{{url('/empleados/'.$empleado->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger" onclick="return confirm(¿borrar?);">Eliminar</button>

                </form>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    
  </body>
</html>