<?php
include ('../../config/config.php');
include ('../../config/conexion.php');

$clave_propiedad = $_GET['clave_propiedad'];
$propiedad = $_GET['propiedad'];

$sentencia_eliminar = $pdo->prepare('DELETE FROM propiedades WHERE propiedades.clave = :clave_propiedad AND propiedades.propiedad = :propiedad');
$sentencia_eliminar->bindParam(':clave_propiedad',$clave_propiedad);
$sentencia_eliminar->bindParam(':propiedad',$propiedad);

$sentencia_eliminar->execute();

header("Location: ../consultar_materiales.php");
exit();

?>