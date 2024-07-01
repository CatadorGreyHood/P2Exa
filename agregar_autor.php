<?php
// Conexión a la base de datos (incluyendo el código anterior)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $sql = "INSERT INTO Autores (nombre, apellido, fecha_nacimiento) VALUES (?, ?, ?)";
    $params = array($nombre, $apellido, $fecha_nacimiento);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Autor agregado correctamente";
}

sqlsrv_close($conn);
?>
