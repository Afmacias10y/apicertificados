<?php
class Conectar {
    protected $dbh;

    protected function Conexion() {
        $serverName = "panalsrvdb"; 
        $connectionOptions = array(
            "Database" => "int_panalsas", 
            "Uid" => "sa",          
            "PWD" => "Admin123.,."          
        );

        // Establecer la conexión
        $this->dbh = sqlsrv_connect($serverName, $connectionOptions);

        // Verificar la conexión
        if ($this->dbh === false) {
            die(json_encode(["error" => "No se pudo conectar a la base de datos", "details" => sqlsrv_errors()]));
        }
        return $this->dbh;
    }
}
?>