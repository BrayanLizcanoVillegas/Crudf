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
    <h1>EDITAR USUARIOS</h1>

    <form action="{{url('/empleados/'.$empleado->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="mb-3">
          <label for="Nombre"  class="form-label">{{'Nombre'}}</label>
          <input type="text" class="form-control" name="Nombre" id="Nombre"  value="{{$empleado->Nombre}}">
        </div>
        <div class="mb-3">
          <label for="Apellido"  class="form-label">{{'Apellido'}}</label>
          <input type="text" class="form-control" name="Apellido" id="Apellido"  value="{{$empleado->Apellido}}">
        </div>
        <div class="mb-3">
            <label for="Correo" class="form-label">{{'Correo'}}</label>
            <input type="text" class="form-control" name="Correo" id="Correo"  value="{{$empleado->Correo}}">
        </div>
        <div class="mb-3">
            <label for="Foto" class="form-label">{{'Foto'}}</label>
            <input type="file" class="form-control" name="Foto" id="Foto"  value="{{$empleado->Foto}}">
        </div>
        <input type="submit" class="btn btn-primary" value="Actualizar">
        
      </form>
  </body>
</html>