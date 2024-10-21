<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si el formulario ha sido enviado (si se recibió el método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos enviados a través del formulario
    $nombre_completo = $_POST['nombre_completo'];
    $direccion = $_POST['direccion'];
    $observacion = $_POST['observacion'];

    // Preparar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO tabla (nombre_completo, direccion, observacion) VALUES (?, ?, ?)";

    // Preparar la sentencia para evitar inyecciones SQL
    $stmt = $conn->prepare($sql);

    // Verificar si la preparación fue exitosa
    if ($stmt) {
        // Vincular los parámetros con los valores recibidos del formulario
        $stmt->bind_param("sss", $nombre_completo, $direccion, $observacion);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a la página de éxito o mostrar un mensaje
            echo "Datos insertados correctamente";
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
