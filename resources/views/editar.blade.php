<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="theme-color" content="#000000" />

  <title>Modificaciones</title>

  {% load django_bootstrap5 %}
  {% bootstrap_css %}

  {% load widget_tweaks %}

  {% load static%}


</head>

<body>

  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <img src="../../static/assets/images/estudiantes.png" class="img-fluid">
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

        <div class="page-content">
          <div class="row">
            <div class="col-md-10">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/alumnos">Alumnos</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modificar</li>
                </ol>
              </nav>

              <div class="row">

                <div class="col-md-12">

                  <div class="content-box-large">

                    <div class="panel-heading">
                      <div class="panel-title">
                        <h2>Modificar Datos</h2>
                      </div>
                    </div>

                    <div class="panel-body">
                      <section class="example mt-4">


                        <form id="actualizar" method="POST" role="form" enctype="multipart/form-data">
                          
                          {% csrf_token %}
                          
                          
                          <input type="hidden" name="id" id="id">

                          <div class="mb-3">
                            <label for="num_control" class="negrita">Numero de Control:</label>
                            <div>
                              {{form.numControl|add_class:"form-control"}}
                            </div>

                          <div class="mb-3">
                            <label for="nombre" class="negrita">Nombre:</label>
                            <div>
                              {{form.nombre|add_class:"form-control"}}
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="primer_ap" class="negrita">Primer Ap:</label>
                            <div>
                              {{form.primerAp|add_class:"form-control"}}
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="segundo_ap" class="negrita">Segundo Ap:</label>
                            <div>
                              {{form.segundoAp|add_class:"form-control"}}
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="fecha_nac" class="negrita">Fecha de Nacimiento:</label>
                            <div>
                              {{form.fechaNac|add_class:"form-control"}}
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="semestre" class="negrita">Semestre:</label>
                            <div>
                              {{form.semestre|add_class:"form-control"}}
                            </div>
                          </div>

                          <div class="mb-3">
                            <label for="carrera" class="negrita">Carrera:</label>
                            <div>
                              {{form.carrera|add_class:"form-control"}}
                            </div>
                          </div>

                          <button type="submit" class="btn btn-success">Guardar Cambios</button>
                          <a href="/alumnos" class="btn btn-warning">Cancelar</a>

                        </form>

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


</body>

</html>