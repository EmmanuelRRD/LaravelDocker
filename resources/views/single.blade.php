<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Sistemas ABCC - Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <h4>Gestión de Alumnos</h4>
                <button class="btn btn-success" onclick="nuevoAlumno()">+ Nuevo Alumno</button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Control</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaAlumnos">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAlumno" tabindex="-1">
        <div class="modal-dialog">
            <form id="formAlumno" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Datos del Alumno</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="text" name="Num_Control" class="form-control mb-2" placeholder="Num Control" required>
                    <input type="text" name="Nombre" class="form-control mb-2" placeholder="Nombre" required>
                    <input type="text" name="Primer_Ap" class="form-control mb-2" placeholder="Primer Apellido"
                        required>
                    <input type="text" name="Segundo_Ap" class="form-control mb-2" placeholder="Segundo Apellido"
                        required>
                    <input type="date" name="Fecha_Nac" class="form-control mb-2" required>
                    <input type="number" name="Semestre" class="form-control mb-2" placeholder="Semestre" required>
                    <input type="text" name="Carrera" class="form-control mb-2" placeholder="Carrera" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Alumno</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const modal = new bootstrap.Modal(document.getElementById('modalAlumno'));
        const tabla = document.getElementById('tablaAlumnos');

        // 1. Cargar Alumnos (Consultas)
        function cargarAlumnos() {
            fetch('/api/alumnos')
                .then(res => res.json())
                .then(data => {
                    tabla.innerHTML = '';
                    data.forEach(a => {
                        tabla.innerHTML += `
                            <tr>
                                <td>${a.Num_Control}</td>
                                <td>${a.Nombre} ${a.Primer_Ap}</td>
                                <td>${a.Carrera}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" onclick="verAlumno(${a.id})">Ver</button>
                                    <button class="btn btn-sm btn-danger" onclick="eliminarAlumno(${a.id})">Borrar</button>
                                </td>
                            </tr>
                        `;
                    });
                });
        }

        // 2. Guardar (Altas)
        document.getElementById('formAlumno').onsubmit = function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('/api/alumnos', {
                method: 'POST',
                body: formData,
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            }).then(() => {
                modal.hide();
                this.reset();
                cargarAlumnos(); // Recarga la tabla sin refrescar la página
            });
        };

        function nuevoAlumno() { modal.show(); }

        window.onload = cargarAlumnos;

        // Función para Borrar (Bajas)
        function eliminarAlumno(id) {
            if (confirm('¿Estás seguro de eliminar a este alumno?')) {
                fetch(`/api/alumnos/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                }).then(() => {
                    cargarAlumnos(); // Refresca la tabla automáticamente
                });
            }

            cargarAlumnos();
        }

        // Función para Ver (Consulta individual)
        function verAlumno(id) {
            fetch(`/api/alumnos`) // En un SPA real, buscarías por ID, aquí un ejemplo rápido:
                .then(res => res.json())
                .then(data => {
                    const alumno = data.find(a => a.id === id);
                    alert(`Detalle del Alumno:\n\nNombre: ${alumno.Nombre}\nControl: ${alumno.Num_Control}\nSemestre: ${alumno.Semestre}`);
                    // Aquí podrías abrir otro modal con el detalle completo si gustas
                });
        }
    </script>
</body>

</html>