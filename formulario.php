<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="container mt-5">
    <div class="form-container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Formulario de Registro</h2>
            </div>
            <div class="card-body">
                <form id="registroForm" action="insertar.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="nombre_completo">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="observacion">Observación</label>
                        <textarea class="form-control" id="observacion" name="observacion" rows="3" required></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registroForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('insertar.php', { method: 'POST', body: formData })
        .then(response => response.text())
        .then(data => {
            Swal.fire({
                icon: data.includes('Datos insertados correctamente') ? 'success' : 'error',
                title: data.includes('Datos insertados correctamente') ? 'Registro exitoso' : 'Error',
                text: data.includes('Datos insertados correctamente') ? '' : data,
                timer: 2000,
                showConfirmButton: false
            });
        }).catch(() => {
            Swal.fire({ icon: 'error', title: 'Error', text: 'Hubo un problema al procesar la solicitud' });
        });
    });
</script>

</body>
</html>
