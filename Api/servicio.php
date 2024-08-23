<?php
    require_once("../config/conexionsql.php");
    require_once("../models/Servicio.php");

    $servicio = new Servicio();

    switch ($_GET["Items"]) {
        case "Certificados":
            $datos = $servicio->get_servicio();
            
            // Verifica el contenido antes de enviarlo como JSON
            if (empty($datos)) {
                echo json_encode(["error" => "No se encontraron resultados o hubo un problema con la consulta."]);
            } else {
                header('Content-Type: application/json');
                
                // Añadir depuración para ver el contenido de $datos
                echo "<pre>";
                print_r($datos);  // Muestra el array $datos en su forma cruda
                echo "</pre>";
                
                echo json_encode($datos);
            
            break;
        }
    }
?>