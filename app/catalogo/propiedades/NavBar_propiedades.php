<?php
// Manejo del formulario si se realiza una búsqueda
$busqueda = $_GET['busqueda_propiedades'] ?? '';
$resultados_propiedades = [];

if (!empty($busqueda)) {
    try {
        $sql = "SELECT * FROM propiedades WHERE clave LIKE :busqueda OR propiedad LIKE :busqueda OR valor LIKE :busqueda ORDER BY clave,propiedad ASC";
        $sentencia_busqueda = $pdo->prepare($sql);
        $parametroBusqueda = "%$busqueda%";
        $sentencia_busqueda->bindParam(':busqueda', $parametroBusqueda, PDO::PARAM_STR);
        $sentencia_busqueda->execute();

        $resultados_propiedades = $sentencia_busqueda->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Manejo del formulario si se envían datos
$mensaje = "";
$tipo_mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
  try {
      $clave_propiedad = $_POST['clave_propiedad'] ?? '';
      $propiedad = $_POST['propiedad'] ?? '';
      $valor = $_POST['valor'] ?? '';
      
      if (!empty($clave_propiedad) && !empty($propiedad) && !empty($valor)) {
          $sentencia_ingreso = $pdo->prepare('INSERT INTO propiedades(clave, propiedad, valor) VALUES (:clave_propiedad,:propiedad,:valor)');
          $sentencia_ingreso->bindParam(':clave_propiedad', $clave_propiedad);
          $sentencia_ingreso->bindParam(':propiedad', $propiedad);
          $sentencia_ingreso->bindParam(':valor', $valor);
          
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