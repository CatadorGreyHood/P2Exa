<?php
// Conexión a la base de datos (incluyendo el código anterior)

// Parámetros de paginación
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
$offset = ($page - 1) * $limit;

// Consulta para obtener los resultados paginados
$sql = "SELECT id, nombre, apellido, fecha_nacimiento FROM Autores ORDER BY id OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Generar la tabla HTML con los resultados
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Fecha de Nacimiento</th>
<th>Acciones</th>
</tr>";

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['apellido'] . "</td>";
    echo "<td>" . $row['fecha_nacimiento']->format('Y-m-d') . "</td>";
    echo "<td><button onclick='editarAutor(" . $row['id'] . ")'>Editar</button> <button onclick='eliminarAutor(" . $row['id'] . ")'>Eliminar</button></td>";
    echo "</tr>";
}

echo "</table>";

// Contar el número total de registros para la paginación
$sqlCount = "SELECT COUNT(*) AS total FROM Autores";
$stmtCount = sqlsrv_query($conn, $sqlCount);
$rowCount = sqlsrv_fetch_array($stmtCount, SQLSRV_FETCH_ASSOC);
$totalRecords = $rowCount['total'];

// Mostrar los controles de paginación
echo "<div>";
$totalPages = ceil($totalRecords / $limit);
$currentURL = $_SERVER['PHP_SELF'];

if ($totalPages > 1) {
    echo "<ul class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        $active = ($i == $page) ? "active" : "";
        echo "<li class='page-item $active'><a class='page-link' href='$currentURL?page=$i&limit=$limit'>$i</a></li>";
    }
    echo "</ul>";
}

echo "</div>";

sqlsrv_free_stmt($stmt);
sqlsrv_free_stmt($stmtCount);
sqlsrv_close($conn);
?>
