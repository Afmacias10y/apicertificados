<?php
$serverName = "panalsrvdb"; 
$connectionOptions = array(
    "Database" => "int_panalsas", 
    "Uid" => "sa",          
    "PWD" => "Admin123.,."          
);

// Establecer la conexión
$conectar = sqlsrv_connect($serverName, $connectionOptions);

// Verificar la conexión
if ($conectar === false) {
    die(print_r(sqlsrv_errors(), true)); // Muestra el error específico
} else {
    echo "Conexión exitosa a la base de datos!";
}
?>