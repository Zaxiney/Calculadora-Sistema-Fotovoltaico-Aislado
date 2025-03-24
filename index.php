<?php
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
  <link rel="stylesheet" href="app/templates/AdminLTE v3.2.0/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="app/templates/AdminLTE v3.2.0/dist/css/adminlte.min.css">
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
        <a href="index.php" class="nav-link">Inicio</a>
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
        <img src="public/imagenes/Isotipo en color negativo.png" style="opacity: .8; height: 25px; margin-left: 5px">
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
                <a href="app/calculadora/calculadora_fotovoltaica.php" class="nav-link">
                  <p>Calculadora Fotovoltaica</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="app/catalogo/consultar_materiales.php" class="nav-link">
                  <p>Consultar Materiales</p>
                </a>
              </li>
            </ul>

          </li>

        </ul>
      </nav>

      <!-- /Menú lateral -->
    </div>

  </aside> <!-- /Contenedor Barra Lateral de Búsqueda -->

  <!-- Contenido de la página -->
  <div class="content-wrapper">

    <!-- Encabezado de página -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Página de inicio</h1>
          </div><!-- /.col -->
        </div>
      </div>
    </div>
    <!-- /Encabezado de página -->
  </div><!-- /.content-wrapper -->
  
  <!-- Pie de página -->
  <footer class="main-footer">
    <div style="display: flex; justify-content: center;">
    &copy; 2025 Propiedad de IPTE Soluciones S.A. de C.V.
    </div>
  </footer><!-- ./Pie de página -->

</div><!-- /.wrapper -->



<!-- SCRIPTS REQUERIDOS-->
<!-- jQuery -->
<script src="app/templates/AdminLTE v3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/templates/AdminLTE v3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="app/templates/AdminLTE v3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>