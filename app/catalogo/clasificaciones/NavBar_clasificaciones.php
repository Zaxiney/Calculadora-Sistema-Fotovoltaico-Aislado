<?php
// Manejo del formulario si se realiza una búsqueda
$busqueda = $_GET['busqueda'] ?? '';
$resultados = [];

if (!empty($busqueda)) {
    try {
        $sql = "SELECT * FROM clasificacion WHERE clase LIKE :busqueda OR descripcion LIKE :busqueda ORDER BY clase ASC";
        $sentencia_busqueda = $pdo->prepare($sql);
        $parametroBusqueda = "%$busqueda%";
        $sentencia_busqueda->bindParam(':busqueda', $parametroBusqueda, PDO::PARAM_STR);
        $sentencia_busqueda->execute();

        $resultados = $sentencia_busqueda->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Manejo del formulario si se agregan registros
$mensaje = "";
$tipo_mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
  try {
      $clase = $_POST['clase'] ?? '';
      $descripcion = $_POST['descripcion'] ?? '';
      
      if (!empty($clase) && !empty($descripcion)) {
          $sentencia_ingreso = $pdo->prepare('INSERT INTO clasificacion(clase, descripcion) VALUES (:clase,:descripcion)');
          $sentencia_ingreso->bindParam(':clase', $clase);
          $sentencia_ingreso->bindParam(':descripcion', $descripcion);
          
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