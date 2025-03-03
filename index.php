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
  <nav class="main-header navbar navbar-expand navbar-dark">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Contenedor para logo -->
    <a class="brand-link">
      Calculadora 
    </a>

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
                <a href="app/catalogo/consultar_materiales.php" class="nav-link">
                  <p>Consultar Materiales</p>
                </a>
              </li>

              <!--<li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Modificar Registros</p>
                  <i class="right fas fa-angle-left"></i>
                </a>

                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="app/catalogo/clasificaciones/editar_clasificacion.php" class="nav-link">
                      <i class="nav-icon fas fa-table"></i>
                      <p>Clasificación</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="app/catalogo/materiales/editar_materiales.php" class="nav-link">
                      <i class="nav-icon fas fa-table"></i>
                      <p>Materiales</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-table"></i>
                      <p>Propiedades</p>
                    </a>
                  </li>
                </ul>
              </li>-->

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

    <!-- Contenido principal de la página -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- /Columna izquierda del contenido -->
          <div class="col-lg-6">
            
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Titulo</h5>

                <p class="card-text">
                  Texto ejemplo.
                </p>
                <a href="#" class="card-link">Link uno</a>
                <a href="#" class="card-link">Link dos</a>
              </div>
            </div><!-- /Columna izquierda -->

          </div>

          <!-- /Columna derecha del contenido -->
          <div class="col-lg-6">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Titulo negritas</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Titulo</h6>

                <p class="card-text">Texto de ejemplo.</p>
                <a href="#" class="btn btn-primary">Botón enlace</a>
              </div>
            </div>
          </div>
          <!-- /Columna derecha del contenido -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
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