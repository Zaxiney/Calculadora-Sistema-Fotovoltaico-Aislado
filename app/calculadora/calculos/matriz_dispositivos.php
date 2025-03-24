<?php
$datosJSON = file_get_contents("php://input");
$datos = json_decode($datosJSON, true);

if (!empty($datos['voltaje']) && !empty($datos['datos'])) {
    $voltaje = intval($datos['voltaje']); 
    $datosTabla = $datos['datos']; 

    echo "Voltaje del sistema: $voltaje V<br>";

    foreach ($datosTabla as $fila) {
        $nombre = htmlspecialchars($fila['nombre']);
        $potencia = floatval($fila['potencia']);
        $horas = floatval($fila['horas']);
        $corriente = $potencia / $voltaje;
        $corriente_fusible = $corriente * 1.25;
        
        echo $nombre . ", ";
        echo $potencia . "W, ";
        echo $horas . "h, ";
        echo $corriente . "A, ";
        echo $corriente_fusible . "A<br>";

    }
} else {
    echo "No se recibieron datos válidos.";
}
?>