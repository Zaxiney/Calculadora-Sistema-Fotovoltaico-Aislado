<?php
session_start();
include ('../../config/config.php');
include ('../../config/conexion.php');

// Obtener valores de GET al cargar la página
$clave_material = isset($_GET['clave_material']) ? $_GET['clave_material'] : null;
$modelo = isset($_GET['modelo']) ? $_GET['modelo'] : null;
$marca = isset($_GET['marca']) ? $_GET['marca'] : null;
$clase_material = isset($_GET['clase_material']) ? $_GET['clase_material'] : null;

// Si el formulario se envió, actualizar la base de datos y limpiar los inputs
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  try {
      $clave_material_mod = $_POST['clave_material_mod'] ?? '';
      $modelo_mod = $_POST['modelo_mod'] ?? '';
      $marca_mod = $_POST['marca_mod'] ?? '';
      $clase_material_mod = $_POST['clase_material_mod'] ?? '';
      $clave_original = $_GET['clave_material'] ?? '';

      if (!empty($clave_original) && !empty($clave_material_mod) && !empty($modelo_mod) && !empty($marca_mod) && !empty($clase_material_mod)) {
          $sentencia = $pdo->prepare('UPDATE materiales SET
              clave = :clave_material_mod,
              modelo = :modelo_mod,
              marca = :marca_mod,
              clase = :clase_material_mod 
              WHERE clave = :clave_original');

          $sentencia->bindParam(':clave_material_mod', $clave_material_mod);
          $sentencia->bindParam(':modelo_mod', $modelo_mod);
          $sentencia->bindParam(':marca_mod', $marca_mod);
          $sentencia->bindParam(':clase_material_mod', $clase_material_mod);
          $sentencia->bindParam(':clave_original', $clave_original);

          if ($sentencia->execute()) {
              $_SESSION['mensaje'] = "Datos actualizados correctamente.";
              $_SESSION['tipo_mensaje'] = "success";
          } else {
              $_SESSION['mensaje'] = "Error al actualizar los datos.";
              $_SESSION['tipo_mensaje'] = "danger";
          }
      } else {
          $_SESSION['mensaje'] = "Todos los campos son obligatorios.";
          $_SESSION['tipo_mensaje'] = "warning";
      }
  } catch (Exception $e) {
      $_SESSION['mensaje'] = "Error: " . $e->getMessage();
      $_SESSION['tipo_mensaje'] = "danger";
  }

  // Redirigir para evitar reenvío del formulario
  header("Location: ../consultar_materiales.php");
  exit();
}


// Mostrar notificaciones en la interfaz
if (isset($_SESSION['mensaje'])) {
  echo "<script>
          window.onload = function() {
              showToast('" . $_SESSION['mensaje'] . "', '" . $_SESSION['tipo_mensaje'] . "');
          }
        </script>";
  unset($_SESSION['mensaje']);
  unset($_SESSION['tipo_mensaje']);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calculadora Sistema Fotovoltaico Aislado</title>

  <!-- Google Font: Poppins (Fuente de letra para website y redes sociales de IPTE)-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../templates/AdminLTE v3.2.0/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../templates/AdminLTE v3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../templates/AdminLTE v3.2.0/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Barra de navegación horizontal superior -->
    <nav class="main-header navbar navbar-expand navbar-dark" style="background-color:#191935 !important; border-color:#191935 !important;">
      <!-- Botones izquierdos (barra de navegación) -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../../index.php" class="nav-link">Inicio</a>
        </li>
      </ul>

      <!-- Botones derechos (barra de navegación) -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.Barra de navegación -->

    <!-- Contenedor Barra Lateral de Búsqueda -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#191935 !important; border-color:#191935 !important;">
      <!-- Contenedor para logo -->
      <div class="sidebar">
        <a class="brand-link" >
          <img src="../../../public/imagenes/Isotipo en color negativo.png" style="opacity: .8; height: 25px; margin-left: 5px">
        </a>
      </div>

      <!-- Menú lateral -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Menú de opciones laterales -->

            <li class="nav-item">
              <!-- Menú de opciones para el catálogo de materiales -->
              <a href="#" class="nav-link">
                <p>
                  Catálogo de Materiales
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../calculadora/calculadora_fotovoltaica.php" class="nav-link">
                    <p>Calculadora Fotovoltaica</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../consultar_materiales.php" class="nav-link">
                    <p>Consultar Materiales</p>
                  </a>
                </li>

              </ul>

            </li>  
          </ul>
        </nav>
      </div><!-- /Menú lateral -->

    </aside> <!-- /Contenedor Barra Lateral de Búsqueda -->

    <!-- Contenido de la página -->
    <div class="content-wrapper">

      <!-- Encabezado de página -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            
          </div>
        </div>
      </div>
      <!-- /Encabezado de página -->

      <!-- Contenido principal de la página -->
      <div class="content">
        <div class="container-fluid">
          
          <!-- Horizontal Form -->
          <div class="card card-info">
            <div class="card-header" style="background-color: #191935">
              <h3 class="card-title">MATERIALES</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
                <div class="card-body">

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Clave de Material</label>
                      <div class="col-sm-10">
                          <input name="clave_material_mod" type="number" class="form-control" placeholder="Clave" value="<?php echo htmlspecialchars($clave_material); ?>" required>
                      </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Modelo</label>
                      <div class="col-sm-10">
                          <input name="modelo_mod" type="text" class="form-control" placeholder="Modelo" value="<?php echo htmlspecialchars($modelo); ?>" required>
                      </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Marca</label>
                      <div class="col-sm-10">
                          <input name="marca_mod" type="text" class="form-control" placeholder="Marca" value="<?php echo htmlspecialchars($marca); ?>" required>
                      </div>
                  </div>

                  <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Clase</label>
                      <div class="col-sm-10">
                          <input name="clase_material_mod" type="text" class="form-control" placeholder="Clase" value="<?php echo htmlspecialchars($clase_material); ?>" required>
                      </div>
                  </div>

                  <div class="form-group row">
                  </div>
                </div>
                
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="../consultar_materiales.php" class="btn btn-default">Regresar</a>
                    <button type="submit" class="btn btn-default float-right" style="background-color: #0650C6 ; color: white">Guardar cambios</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <!-- /.card -->

        </div><!-- /.container-fluid -->
      </div><!-- /.content -->
      
      <!-- Pie de página -->
      <footer class="main-footer">
        <div style="display: flex; justify-content: center;">
        &copy; 2025 Propiedad de IPTE Soluciones S.A. de C.V.
        </div>
      </footer><!-- ./Pie de página -->
    </div><!-- /.content-wrapper -->
  </div><!-- /.wrapper -->

  <!-- SCRIPTS REQUERIDOS-->
  <!-- jQuery -->
  <script src="../../templates/AdminLTE v3.2.0/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../templates/AdminLTE v3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../templates/AdminLTE v3.2.0/dist/js/adminlte.min.js"></script>
  <!-- Alertas -->
  <script src="../../templates/AdminLTE v3.2.0/plugins/toastr/toastr.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector(".form-horizontal").addEventListener("submit", function(event) {
            setTimeout(() => {
                event.target.reset();
            }, 100);
        });
    });
  </script>
  <script>
    function showToast(message, type) {
        let toastContainer = document.getElementById("toast-container");
        if (!toastContainer) {
            toastContainer = document.createElement("div");
            toastContainer.id = "toast-container";
            toastContainer.style.position = "fixed";
            toastContainer.style.top = "20px";
            toastContainer.style.right = "20px";
            toastContainer.style.zIndex = "9999";
            document.body.appendChild(toastContainer);
        }

        let toast = document.createElement("div");
        toast.innerText = message;
        toast.style.padding = "10px 20px";
        toast.style.margin = "5px";
        toast.style.color = "white";
        toast.style.borderRadius = "5px";
        toast.style.display = "inline-block";

        switch (type) {
            case "success":
                toast.style.backgroundColor = "green";
                break;
            case "danger":
                toast.style.backgroundColor = "red";
                break;
            case "warning":
                toast.style.backgroundColor = "orange";
                break;
            default:
                toast.style.backgroundColor = "gray";
        }

        toastContainer.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000);
    }
  </script>
</body>
</html>