<?php
// Manejo del formulario si se realiza una búsqueda
$busqueda = $_GET['busqueda_materiales'] ?? '';
$resultados_materiales = [];

if (!empty($busqueda)) {
    try {
        $sql = "SELECT * FROM materiales WHERE clave LIKE :busqueda OR modelo LIKE :busqueda OR marca LIKE :busqueda OR clase LIKE :busqueda ORDER BY clave ASC";
        $sentencia_busqueda = $pdo->prepare($sql);
        $parametroBusqueda = "%$busqueda%";
        $sentencia_busqueda->bindParam(':busqueda', $parametroBusqueda, PDO::PARAM_STR);
        $sentencia_busqueda->execute();

        $resultados_materiales = $sentencia_busqueda->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Manejo del formulario si se envían datos
$mensaje = "";
$tipo_mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
  try {
      $clave_material = $_POST['clave_material'] ?? '';
      $modelo = $_POST['modelo'] ?? '';
      $marca = $_POST['marca'] ?? '';
      $clase_material = $_POST['clase_material'] ?? '';
      
      if (!empty($clave_material) && !empty($modelo)) {
          $sentencia_ingreso = $pdo->prepare('INSERT INTO materiales(clave, modelo, marca, clase) VALUES (:clave_material,:modelo,:marca,:clase_material)');
          $sentencia_ingreso->bindParam(':clave_material', $clave_material);
          $sentencia_ingreso->bindParam(':modelo', $modelo);
          $sentencia_ingreso->bindParam(':marca', $marca);
          $sentencia_ingreso->bindParam(':clase_material', $clase_material);
          
          if ($sentencia_ingreso->execute()) {
              $_SESSION['mensaje'] = "Datos insertados correctamente.";
              $_SESSION['tipo_mensaje'] = "success";

              header("Location: " . $_SERVER['PHP_SELF']);
              exit();
          } else {
            $_SESSION['mensaje'] = "Error al insertar los datos.";
            $_SESSION['tipo_mensaje'] = "error";
          }
      } else {
        $_SESSION['mensaje'] = "Por favor, complete todos los campos.";
        $_SESSION['tipo_mensaje'] = "warning";
      }
  } catch (Exception $e) {
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['tipo_mensaje'] = "error";
  }
}

$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
$tipo_mensaje = isset($_SESSION['tipo_mensaje']) ? $_SESSION['tipo_mensaje'] : "";

unset($_SESSION['mensaje']);
unset($_SESSION['tipo_mensaje']);
?>