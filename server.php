<?php
$serverName = "Catador\\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "ExaWebApp",
    "Uid" => "ColAdmin",
    "PWD" => "epitaph"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die("Error de conexión: " . sqlsrv_errors());
}
?>
