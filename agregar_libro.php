<?php
// Conexión a la base de datos (incluyendo el código anterior)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $título = $_POST['título'];
    $fecha_publicacion = $_POST['fecha_publicación'];
    $autor_id = $_POST['Autor']
    $Precio = $_POST['Precio'];
    

    $sql = "INSERT INTO Libros (título, fecha_publicación, Autor, Precio ) VALUES (?, ?, ?, ?)";
    $params = array($título, $fecha_publicacion, $autor_id, $precio );

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Libro agregado correctamente";
}

sqlsrv_close($conn);
?>
