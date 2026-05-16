<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Lista de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <h2 class="mb-4">Lista General de Alumnos</h2>
        
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Num. Control</th>
                    <th>Nombre Completo</th>
                    <th>Carrera</th>
                    <th>Semestre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->Num_Control }}</td>
                    <td>{{ $alumno->Nombre }} {{ $alumno->Primer_Ap }}</td>
                    <td>{{ $alumno->Carrera }}</td>
                    <td>{{ $alumno->Semestre }}°</td>
                    <td>
                        <a href="/alumnos/{{ $alumno->id }}" class="btn btn-sm btn-info">Ver Detalle</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($alumnos->isEmpty())
            <p class="text-center">No hay alumnos registrados todavía.</p>
        @endif
    </div>
</body>
</html>