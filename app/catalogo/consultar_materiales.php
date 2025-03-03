<?php
session_start();

include ('../config/config.php');
include ('../config/conexion.php');
include ('clasificaciones/NavBar_clasificaciones.php');
include ('materiales/NavBar_materiales.php');
include ('propiedades/NavBar_propiedades.php');


$active_tab = 'clasificaciones';
$mostrar_tabla = 'clasificaciones';
if (!empty($_GET['busqueda_clasificaciones']) ) {
  $active_tab = 'clasificaciones';
  $mostrar_tabla = 'clasificaciones';
} elseif (!empty($_GET['busqueda_materiales'])) {
  $active_tab = 'materiales';
  $mostrar_tabla = 'materiales';
} elseif (!empty($_GET['busqueda_propiedades'])){
  $active_tab = 'propiedades';
  $mostrar_tabla = 'propiedades';
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
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/plugins/toastr/toastr.min.css">
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
          <a href="../../index.php" class="nav-link">Inicio</a>
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
                  <a href="consultar_materiales.php" class="nav-link">
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
                      <a href="clasificaciones/editar_clasificacion.php" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>Clasificación</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="materiales/editar_materiales.php" class="nav-link">
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

      </div><!-- /Menú lateral -->
    </aside> <!-- /Contenedor Barra Lateral de Búsqueda -->

    <!-- Contenido de la página -->
    <div class="content-wrapper">

      <!-- Encabezado de página -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Módulo de consulta de materiales</h1>
            </div><!-- /.col -->
          </div>
        </div>
      </div>
      <!-- /Encabezado de página -->

      <!-- Contenido principal de la página -->
      <div class="content">
        <div class="container-fluid">
          
          <!-- /Tarjeta -->
          <div class="card card-primary card-outline">
            <div class="card-body">
              
              <!-- Inicio Barra de Navegación-->
              <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link <?php echo ($active_tab == 'clasificaciones') ? 'active' : ''; ?>" id="clasificacion_tab" data-toggle="pill" href="#contenido_clasificacion" role="tab" aria-controls="contenido_clasificacion" aria-selected="true" style="color: #0650C6">Clasificación</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($active_tab == 'materiales') ? 'active' : ''; ?>" id="materiales_tab" data-toggle="pill" href="#contenido_materiales" role="tab" aria-controls="contenido_materiales" aria-selected="false" style="color: #0650C6">Materiales</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php echo ($active_tab == 'propiedades') ? 'active' : ''; ?>" id="propiedades_tab" data-toggle="pill" href="#contenido_propiedades" role="tab" aria-controls="contenido_propiedades" aria-selected="false" style="color: #0650C6">Propiedades</a>
                </li>
              </ul>

              <!-- Contenido Barra de Navegación-->
              <div class="tab-content" id="custom-content-above-tabContent">

                <!-- Contenido clasificación-->
                <div class="tab-pane fade <?php echo ($mostrar_tabla == 'clasificaciones') ? 'show active' : ''; ?>" id="contenido_clasificacion" role="tabpanel" aria-labelledby="clasificacion_tab">
                  <!-- BLOQUE BOTONES-->
                  <div class="tab-custom-content" style="height: 50px">
                    <div class="row">
                      <div class="col-sm-2">
                        <a data-toggle="modal" data-target="#modal_clasificaciones" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fas fa-plus"></i> Agregar</a>
                      </div>

                      <form class="input-group input-group-sm col-sm-4" action="" method="get">
                        <input name="busqueda" type="search" class="form-control" placeholder="Buscar">
                        <span class="input-group-append">
                          <button name="enviar" type="submit" class="btn btn-info btn-flat" style="background-color: #0650C6">Buscar</button>
                        </span>
                      </form>

                    </div>
                  </div>

                  <!-- ENCABEZADO TABLA-->
                  <div class="row ">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Clase</th>
                          <th scope="col">Descripción</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>

                      <!-- CUERPO TABLA-->
                      <tbody>
                        <?php
                          
                          if (!empty($resultados)) {
                            foreach ($resultados as $fila):
                              ?>
                              <tr>
                                <th scope="row"><?php echo $clase = isset($fila['clase']) ? $fila['clase'] : ''; ?></th>
                                <td><?php echo $descripcion = isset($fila['descripcion']) ? $fila['descripcion'] : ''; ?></td>

                                <td>
                                  <div class="row justify-content-end">
                                    <div class="col-3">
                                      <a href="clasificaciones/editar_clasificacion.php?clase=<?php echo $clase;?>&descripcion=<?php echo $descripcion;?>" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fa fa-edit"></i> Editar</a>
                                    </div>
                                    <div class="col-3">
                                      <a href="clasificaciones/eliminar_clasificacion.php?clase=<?php echo $clase;?>" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #191935 ; border-color: #191935" onclick="return confirm('¿Deseas eliminar esta clasificación? Se eliminarán los materiales y propiedades relacionados');"><i class="fas fa-times-circle"></i> Eliminar</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <?php
                            endforeach;
                          } else {
                            $query = $pdo->prepare(query: 'SELECT * FROM clasificacion');
                            $query->execute();

                            $clasificaciones = $query->fetchAll(mode: PDO::FETCH_ASSOC);

                            foreach ($clasificaciones as $clasificacion){
                              $clase = $clasificacion['clase'];
                              $descripcion = $clasificacion['descripcion'];
                              ?>

                              <tr>
                                <th scope="row"><?php echo $clase ?></th>
                                <td ><?php echo $descripcion ?></td>
                                <td>
                                  <div class="row justify-content-end">
                                    <div class="col-3">
                                      <a href="clasificaciones/editar_clasificacion.php?clase=<?php echo $clase;?>&descripcion=<?php echo $descripcion;?>" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fa fa-edit"></i> Editar</a>
                                    </div>
                                    <div class="col-3">
                                      <a href="clasificaciones/eliminar_clasificacion.php?clase=<?php echo $clase;?>" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #191935 ; border-color: #191935" onclick="return confirm('¿Deseas eliminar esta clasificación? Se eliminarán los materiales y propiedades relacionados');"><i class="fas fa-times-circle"></i> Eliminar</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              
                              <?php
                            }
                          }
                        ?>
                      </tbody>

                    </table>
                  </div>
                </div>

                <!-- Contenido materiales-->
                <div class="tab-pane fade <?php echo ($mostrar_tabla == 'materiales') ? 'show active' : ''; ?>" id="contenido_materiales" role="tabpanel" aria-labelledby="materiales_tab">
                  <!-- BLOQUE BOTONES-->
                  <div class="tab-custom-content" style="height: 50px">
                    <div class="row">
                      <div class="col-sm-2">
                        <a data-toggle="modal" data-target="#modal_materiales" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fas fa-plus"></i> Agregar</a>
                      </div>

                      <form class="input-group input-group-sm col-sm-4" action="" method="get">
                        <input name="busqueda_materiales" type="search" class="form-control" placeholder="Buscar">
                        <span class="input-group-append">
                          <button name="enviar_materiales" type="submit" class="btn btn-info btn-flat" style="background-color: #0650C6">Buscar</button>
                        </span>
                      </form>

                    </div>
                  </div>

                  <!-- ENCABEZADO TABLA-->
                  <div class="row ">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Clave</th>
                          <th scope="col">Modelo</th>
                          <th scope="col">Marca</th>
                          <th scope="col">Clase</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>

                      <!-- CUERPO TABLA-->
                      <tbody>
                        <?php
                          
                          if (!empty($resultados_materiales)) {
                            foreach ($resultados_materiales as $fila):
                              ?>
                              <tr>
                                <th scope="row"><?php echo $clave_material = isset($fila['clave']) ? $fila['clave'] : ''; ?></th>
                                <td><?php echo $modelos = isset($fila['modelo']) ? $fila['modelo'] : ''; ?></td>
                                <td><?php echo $marca = isset($fila['marca']) ? $fila['marca'] : ''; ?></td>
                                <td><?php echo $clase_material = isset($fila['clase']) ? $fila['clase'] : ''; ?></td>

                                <td>
                                  <div class="row justify-content-end">
                                    <div class="col-5">
                                      <a href="materiales/editar_materiales.php?clave_material=<?php echo $clave_material;?>&modelo=<?php echo $modelo;?>&marca=<?php echo $marca;?>&clase_material=<?php echo $clase_material;?>" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fa fa-edit"></i> Editar</a>
                                    </div>
                                    <div class="col-5">
                                      <a href="materiales/eliminar_materiales.php?clave_material=<?php echo $clave_material;?>" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #191935 ; border-color: #191935" onclick="return confirm('¿Deseas eliminar este material? Se eliminarán las propiedades relacionadas');"><i class="fas fa-times-circle"></i> Eliminar</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <?php
                            endforeach;
                          } else {
                            $query = $pdo->prepare(query: 'SELECT * FROM materiales');
                            $query->execute();

                            $materiales = $query->fetchAll(mode: PDO::FETCH_ASSOC);

                            foreach ($materiales as $material){
                              $clave_material = $material['clave'];
                              $modelo = $material['modelo'];
                              $marca = $material['marca'];
                              $clase_material = $material['clase'];
                              ?>

                              <tr>
                                <th scope="row"><?php echo $clave_material;?></th>
                                <td><?php echo $modelo;?></td>
                                <td><?php echo $marca;?></td>
                                <td><?php echo $clase_material;?></td>
                                <td>
                                  <div class="row justify-content-end">
                                    <div class="col-5">
                                      <a href="materiales/editar_materiales.php?clave_material=<?php echo $clave_material;?>&modelo=<?php echo $modelo;?>&marca=<?php echo $marca;?>&clase_material=<?php echo $clase_material;?>" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fa fa-edit"></i> Editar</a>
                                    </div>
                                    <div class="col-5">
                                      <a href="materiales/eliminar_materiales.php?clave_material=<?php echo $clave_material;?>" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #191935 ; border-color: #191935" onclick="return confirm('¿Deseas eliminar este material? Se eliminarán las propiedades relacionadas');"><i class="fas fa-times-circle"></i> Eliminar</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              
                              <?php
                            }
                          }
                        ?>
                      </tbody>

                    </table>
                  </div>
                </div>

                <!-- Contenido propiedades-->
                <div class="tab-pane fade <?php echo ($mostrar_tabla == 'propiedades') ? 'show active' : ''; ?>" id="contenido_propiedades" role="tabpanel" aria-labelledby="propiedades_tab">
                  <!-- BLOQUE BOTONES-->
                  <div class="tab-custom-content" style="height: 50px">
                    <div class="row">
                      <div class="col-sm-2">
                        <a data-toggle="modal" data-target="#modal_propiedades" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fas fa-plus"></i> Agregar</a>
                      </div>

                      <form class="input-group input-group-sm col-sm-4" action="" method="get">
                        <input name="busqueda_propiedades" type="search" class="form-control" placeholder="Buscar">
                        <span class="input-group-append">
                          <button name="enviar_propiedades" type="submit" class="btn btn-info btn-flat" style="background-color: #0650C6">Buscar</button>
                        </span>
                      </form>

                    </div>
                  </div>

                  <!-- ENCABEZADO TABLA-->
                  <div class="row ">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Clave</th>
                          <th scope="col">Propiedad</th>
                          <th scope="col">Valor</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>

                      <!-- CUERPO TABLA-->
                      <tbody>
                        <?php
                          
                          if (!empty($resultados_propiedades)) {
                            foreach ($resultados_propiedades as $fila):
                              ?>
                              <tr>
                                <th scope="row"><?php echo $clave_propiedad = isset($fila['clave']) ? $fila['clave'] : ''; ?></th>
                                <td><?php echo $propiedad = isset($fila['propiedad']) ? $fila['propiedad'] : ''; ?></td>
                                <td><?php echo $valor = isset($fila['valor']) ? $fila['valor'] : ''; ?></td>

                                <td>
                                  <div class="row justify-content-end">
                                    <div class="col-5">
                                      <a href="propiedades/editar_propiedades.php?clave_propiedad=<?php echo $clave_propiedad;?>&propiedad=<?php echo $propiedad;?>&valor=<?php echo $valor;?>" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fa fa-edit"></i> Editar</a>
                                    </div>

                                    <div class="col-5">
                                      <a href="propiedades/eliminar_propiedades.php?clave_propiedad=<?php echo $clave_propiedad;?>" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #191935 ; border-color: #191935" onclick="return confirm('¿Deseas eliminar esta propiedad?');"><i class="fas fa-times-circle"></i> Eliminar</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <?php
                            endforeach;
                          } else {
                            $query = $pdo->prepare(query: 'SELECT * FROM propiedades');
                            $query->execute();

                            $propiedades = $query->fetchAll(mode: PDO::FETCH_ASSOC);

                            foreach ($propiedades as $propiedad_individual){
                              $clave_propiedad = $propiedad_individual['clave'];
                              $propiedad = $propiedad_individual['propiedad'];
                              $valor = $propiedad_individual['valor'];
                              ?>

                              <tr>
                                <th scope="row"><?php echo $clave_propiedad;?></th>
                                <td><?php echo $propiedad;?></td>
                                <td><?php echo $valor;?></td>
                                <td>
                                  <div class="row justify-content-end">
                                    <div class="col-5">
                                      <a href="propiedades/editar_propiedades.php?clave_propiedad=<?php echo $clave_propiedad;?>&propiedad=<?php echo $propiedad;?>&valor=<?php echo $valor;?>" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #0650C6 ; border-color: #0650C6"><i class="fa fa-edit"></i> Editar</a>
                                    </div>
                                    <div class="col-5">
                                      <a href="propiedades/eliminar_propiedades.php?clave_propiedad=<?php echo $clave_propiedad;?>&propiedad=<?php echo $propiedad;?>" type="button" class="btn-sm btn-primary btn-block" style="width:auto ; background-color: #191935 ; border-color: #191935" onclick="return confirm('¿Deseas eliminar esta propiedad?');"><i class="fas fa-times-circle"></i> Eliminar</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              
                              <?php
                            }
                          }
                        ?>
                      </tbody>

                    </table>
                  </div>
                </div> 
              </div>
              <!-- Fin Barra de Navegación-->

            </div>
            <!-- /Tarjeta -->
          </div>
          <!-- /Tarjeta -->
          
          <!-- Ventana modal para el ingreso de registros a la tabla clasificaciones-->
          <div class="modal fade" id="modal_clasificaciones">
            <div class="modal-dialog">

              <div class="modal-content">

              <!-- Título modal-->
                <div class="modal-header">
                  <h4 class="modal-title">Registrar nueva clasificación</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <!-- Contenido modal -->
                <div class="modal-body">
                  <!-- Formulario -->          
                  <form class="form-horizontal" method="post">

                    <div class="card-body">

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Clase</label>
                        <div class="col-sm-8">
                          <input name="clase" type="number" class="form-control" placeholder="Clave" required>
                        </div>
                      </div>

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Descripción</label>
                        <div class="col-sm-8">
                          <input name="descripcion" type="text" class="form-control" placeholder="Nombre de clasificación">
                        </div>
                      </div>
                      
                      <div class="modal-footer justify-content-between">
                      </div>

                      <div class="form-group row justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #191935 ; border-color: #191935">Regresar</button>
                        <button type="submit" class="btn btn-primary offset-sm-1" style="background-color: #0650C6; border-color: #0650C6">Crear registro</button>
                      </div>
                    </div>                   
                  </form><!-- /Formulario -->
                </div><!-- /Contenido modal -->
              </div><!-- /.modal-content -->
              
            </div><!-- /.modal-dialog -->        
          </div><!-- /Fin Modal -->

          <!-- Ventana modal para el ingreso de registros a la tabla materiales-->
          <div class="modal fade" id="modal_materiales">
            <div class="modal-dialog">

              <div class="modal-content">

              <!-- Título modal-->
                <div class="modal-header">
                  <h4 class="modal-title">Registrar nuevo material</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <!-- Contenido modal -->
                <div class="modal-body">
                  <!-- Formulario -->          
                  <form class="form-horizontal" method="post">

                    <div class="card-body">

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Clave</label>
                        <div class="col-sm-8">
                          <input name="clave_material" type="number" class="form-control" placeholder="Clave" required>
                        </div>
                      </div>

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Modelo</label>
                        <div class="col-sm-8">
                          <input name="modelo" type="text" class="form-control" placeholder="Modelo">
                        </div>
                      </div>

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Marca</label>
                        <div class="col-sm-8">
                          <input name="marca" type="text" class="form-control" placeholder="Marca" required>
                        </div>
                      </div>

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Clase</label>
                        <div class="col-sm-8">
                          <input name="clase_material" type="number" class="form-control" placeholder="Clase">
                        </div>
                      </div>
                      
                      <div class="modal-footer justify-content-between">
                      </div>

                      <div class="form-group row justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #191935 ; border-color: #191935">Regresar</button>
                        <button type="submit" class="btn btn-primary offset-sm-1" style="background-color: #0650C6; border-color: #0650C6">Crear registro</button>
                        <!-- onclick= "return confirm('¿Desea ingresar el registro?')" -->
                      </div>
                    </div>                   
                  </form><!-- /Formulario -->
                </div><!-- /Contenido modal -->
              </div><!-- /.modal-content -->
              
            </div><!-- /.modal-dialog -->
            
          </div><!-- /Fin Modal -->

          <!-- Ventana modal para el ingreso de registros a la tabla materiales-->
          <div class="modal fade" id="modal_propiedades">
            <div class="modal-dialog">

              <div class="modal-content">

              <!-- Título modal-->
                <div class="modal-header">
                  <h4 class="modal-title">Registrar nueva propiedad</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <!-- Contenido modal -->
                <div class="modal-body">
                  <!-- Formulario -->          
                  <form class="form-horizontal" method="post">

                    <div class="card-body">

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Clave</label>
                        <div class="col-sm-8">
                          <input name="clave_propiedad" type="number" class="form-control" placeholder="Clave" required>
                        </div>
                      </div>

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Propiedad</label>
                        <div class="col-sm-8">
                          <input name="propiedad" type="text" class="form-control" placeholder="Nombre de propiedad">
                        </div>
                      </div>

                      <div class="form-group row justify-content-between">
                        <label class="col-sm-3 col-form-label">Valor</label>
                        <div class="col-sm-8">
                          <input name="valor" type="text" class="form-control" placeholder="Valor" required>
                        </div>
                      </div>
                      
                      <div class="modal-footer justify-content-between">
                      </div>

                      <div class="form-group row justify-content-center">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #191935 ; border-color: #191935">Regresar</button>
                        <button type="submit" class="btn btn-primary offset-sm-1" style="background-color: #0650C6; border-color: #0650C6">Crear registro</button>
                        <!-- onclick= "return confirm('¿Desea ingresar el registro?')" -->
                      </div>
                    </div>                   
                  </form><!-- /Formulario -->
                </div><!-- /Contenido modal -->
              </div><!-- /.modal-content -->
              
            </div><!-- /.modal-dialog -->
            
          </div><!-- /Fin Modal -->
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
  <script src="../templates/AdminLTE v3.2.0/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../templates/AdminLTE v3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../templates/AdminLTE v3.2.0/dist/js/adminlte.min.js"></script>
  <!-- Alertas -->
  <script src="../templates/AdminLTE v3.2.0/plugins/toastr/toastr.min.js"></script>
  <!-- jQuery y Toastr -->
  <script>
      $(document).ready(function() {
          <?php if (!empty($mensaje)) : ?>
              toastr.<?php echo $tipo_mensaje; ?>("<?php echo $mensaje; ?>");
          <?php endif; ?>
      });
  </script>
</body>
</html>