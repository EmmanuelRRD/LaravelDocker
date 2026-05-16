<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="theme-color" content="#000000" />

  <title>Servicios Escolares </title>

    <!-- Bootstrap 5 (CSS y JS) -->
    @vite(['resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>


  <!-- JQUERY para desaparecer mensajes-->
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      setTimeout(function() {
          $("#msj").fadeOut(1500);
      },3000);
  });
  </script>
</head>

<body>

  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="{{ asset('images/estudiantes.png') }}" class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07"
          aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Asignaturas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Docentes</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-5 mb-5">

    <div class="row">

      <div class="col-md-12">

        <h1 style="font-size: 28px; margin-top: 50px;" class=" text-center">SERVICIOS ESCOLARES </h1>



        <div class="col-md-10">

          <!-- NVEGACION -->

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">Inicio</li>
              <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
            </ol>
          </nav>

          <div class="row">

            <div class="col-md-12">

              <div class="content-box-large">

                <div class="panel-heading">
                  <div class="panel-title">
                    <h2>Listado de Alumnos</h2>
                  </div>

                </div>

                <div class="panel-body">

                    @if(Session::has('message'))
                    <div class="alert alert-success" role="alert" id="msj">
                        {{ Session::get('message') }}
                    </div>
                    @endif

                      <a href="{{route('alumnos.create')}}"
                        class="btn btn-success mt-4 ml-3"> AGREGAR </a>
                      <section class="example mt-4">
                        <div class="table-responsive" id="tablaAlumnos">

                          <table class='table table-striped table-bordered table-hover text-center'>
                              <thead>
                                <tr>
                                  <th>Numero de Control</th>
                                  <th>Nombre</th> <th>Semestre</th> <th>Fecha Nacimiento</th>
                                  <th>ACCIONES</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($alumnos as $a)
                                  <tr>
                                    <td class=v-align-middle>{{$a->Num_Control}}</td>
                                    <td class=v-align-middle>{{$a->Nombre}}</td>
                                    <td class=v-align-middle>{{$a->Semestre}}</td>
                                    <td class=v-align-middle>{{$a->Fecha_Nac}}</td>
                                    <td class=v-align-middle>

                                        <form action="{{ route('alumnos.destroy', $a) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminacion()">
                                          @csrf
                                          @method('DELETE')

                                          <a class="btn btn-primary" href="{{route('alumnos.show', $a->id)}}">Detalle</a>
                                          <a class="btn btn-warning" href="{{route('alumnos.edit', $a->id) }}">Editar</a>

                                        <button type="submit" class="btn btn-danger">
                                          ELIMINAR </button>

                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          {!! $alumnos->links() !!}

                        </div>
                      </section>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

  </div>

  <hr>


  <footer class="text-muted mt-3 mb-3">
    <div align="center">
      FOOTER
    </div>
  </footer>

  <script type="text/javascript">

    function confirmarEliminacion()
    {
    var x = confirm("Estas seguro de ELIMINAR?");
    if (x)
      return true;
    else
      return false;
    }

</script>

</body>

</html>