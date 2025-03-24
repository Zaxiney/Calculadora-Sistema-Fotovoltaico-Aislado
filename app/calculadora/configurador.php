<?php
include ('../config/config.php');
include ('../config/conexion.php');

//Inicialización de variables para obtener propiedades de paneles solares
$potencia = '';
$alto = '';
$ancho = '';
$eficiencia = '';
//Inicialización de variables para baterías
$voltaje = '';
$capacidad = '';

//Almacenamiento de las propiedades del panel en caso de recibir el modelo mediante
//una llamada con POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modelo'])) {
  $modelo = $_POST['modelo'] ?? '';

  $fichas_tecnicas = $pdo->prepare(query:' SELECT * 
  FROM propiedades 
  INNER JOIN materiales ON propiedades.clave = materiales. clave 
  WHERE materiales.clase = 1 AND materiales.modelo = :modelo
  ORDER BY propiedades.clave, propiedades.propiedad ASC;');
  $fichas_tecnicas->bindParam(':modelo', $modelo, PDO::PARAM_STR);
  $fichas_tecnicas->execute();
  $result = $fichas_tecnicas->fetchAll(PDO::FETCH_ASSOC);

  foreach ($result as $row) {
    switch ($row['propiedad']) {
      case 'Potencia (W)':
        $potencia = $row['valor'];
        break;
      case 'Alto (m)':
        $alto = $row['valor']; 
        break;
      case 'Ancho (m)':
        $ancho = $row['valor'];
        break;
      case 'Eficiencia (%)':
        $eficiencia = $row['valor']; 
        break;
    }
  }

  //Si la llamada se realiza mediante AJAX, se envían las va
  if (isset($_POST['ajax'])) {
    echo json_encode([
      "potencia" => $potencia,
      "alto" => $alto,
      "ancho" => $ancho,
      "eficiencia" => $eficiencia
    ]);
    exit;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modelo_bateria'])) {
  $modelo_bateria = $_POST['modelo_bateria'] ?? '';

  $ficha_bateria = $pdo->prepare('SELECT * 
  FROM propiedades 
  INNER JOIN materiales ON propiedades.clave = materiales.clave 
  WHERE materiales.clase = 2 AND materiales.modelo = :modelo
  ORDER BY propiedades.clave, propiedades.propiedad ASC;');
  $ficha_bateria->bindParam(':modelo', $modelo_bateria, PDO::PARAM_STR);
  $ficha_bateria->execute();
  $result_bateria = $ficha_bateria->fetchAll(PDO::FETCH_ASSOC);

  foreach ($result_bateria as $row) {
    switch ($row['propiedad']) {
      case 'V':
        $voltaje = $row['valor'];
        break;
      case 'Ah':
        $capacidad = $row['valor'];
        break;
    }
  }

  if (isset($_POST['ajax'])) {
    echo json_encode([
      "voltaje" => $voltaje,
      "capacidad" => $capacidad,
    ]);
    exit;
  }
}

$menu_paneles = $pdo->prepare(query: 'SELECT modelo, valor FROM propiedades 
          INNER JOIN materiales ON propiedades.clave = materiales.clave
          WHERE materiales.clase = 1 AND propiedades.propiedad = "Potencia (W)" 
          ORDER BY propiedades.clave, propiedades.propiedad ASC');
$menu_paneles->execute();
$paneles = $menu_paneles->fetchAll(mode: PDO::FETCH_ASSOC);

//Consultas de los modelos de baterías
$menu_baterias = $pdo->prepare(query:'SELECT modelo, valor 
          FROM materiales INNER JOIN propiedades ON materiales.clave = propiedades.clave 
          WHERE materiales.clase = 2 AND propiedades.propiedad = "Ah"
          ORDER BY propiedades.clave, propiedades.propiedad ASC');
$menu_baterias->execute();
$baterias = $menu_baterias->fetchAll(PDO::FETCH_ASSOC);
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
  
  <!-- Temas -->
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/plugins/ekko-lightbox/ekko-lightbox.css">
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#191935 !important; border-color:#191935 !important;">
      <!-- Contenedor para logo -->
      <div class="sidebar">
        <a class="brand-link" >
          <img src="../../public/imagenes/Isotipo en color negativo.png" style="opacity: .8; height: 25px; margin-left: 5px">
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
                  <a href="calculadora_fotovoltaica.php" class="nav-link">
                    <p>Calculadora Fotovoltaica</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../catalogo/consultar_materiales.php" class="nav-link">
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
            <div class="col-sm-12">
              <h1 class="m-0">Calculadora Fotovoltaica - Configurador</h1>
            </div>
          </div>
        </div>
      </div><!-- /Encabezado de página -->

      <!-- Contenido principal de la página -->
      <div class="content">
        <div class="container-fluid">
          <!-- Tarjeta para parámetros Predeterminados -->
          <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
              <h5 style="width: auto; display: inline-block; white-space: nowrap;">Parámetros Predeterminados</h5>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <form class="row" id="variablesForm">
                <!-- Variables predeterminadas del sistema -->
                <div class="col-sm-6">
                  <div class="col-sm-12">
                    <label class="form-control-sm">SISTEMA</label>
                  </div>

                  <div class=" tab-custom-content row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-control-sm">Cargas en CD</label>
                        <div class="input-group">
                          <input type="number" class="form-control form-control-sm" id="variable1" value="0" disabled>
                          <div class="input-group-append ">
                            <span class="input-group-text form-control form-control-sm">W</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-control-sm">Cargas en CA</label>
                        <div class="input-group">
                          <input type="number" class="form-control form-control-sm" id="variable2" value="0" disabled>
                          <div class="input-group-append ">
                            <span class="input-group-text form-control form-control-sm">W</span>
                          </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-control-sm">Eficiencia del inversor (%)</label>
                        <div class="input-group">
                          <input type="number" class="form-control form-control-sm" id="variable3" value="87" disabled>
                          <div class="input-group-append ">
                            <span class="input-group-text form-control form-control-sm">%</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-control-sm">Horas de funcionamiento al día</label>
                        <input type="number" class="form-control form-control-sm" id="variable4" value="24" disabled>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-control-sm">Radiación solar mínima promedio registrada en un mes</label>
                        <div class="input-group">
                          <input type="number" class="form-control form-control-sm" id="variable5" value="0" disabled>
                          <div class="input-group-append ">
                            <span class="input-group-text form-control form-control-sm"> (Wh/m^2/día)</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Variables predeterminadas de las baterías -->
                <div class="col-sm-6 h-100">
                  <div class="col-sm-12">
                    <label class="form-control-sm">BATERÍAS</label>
                  </div>

                  <div class=" tab-custom-content row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-control-sm">Días de respaldo de la batería</label>
                        <input type="number" class="form-control form-control-sm" id="variable6" value="3" disabled>
                      </div>
                    </div>

                    <div class="col-sm-12" >
                      <div class="form-group">
                        <label class="form-control-sm">Porcentaje utilizable de batería </label>
                        <div class="input-group">
                          <input type="number" class="form-control form-control-sm" id="variable7" value="80" disabled>
                          <div class="input-group-append ">
                            <span class="input-group-text form-control form-control-sm">%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              <div class="col-sm-12 d-flex justify-content-between align-items-center ms-auto">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="habilitar_casillas">
                  <label class="custom-control-label" for="habilitar_casillas">Habilitar edición</label>
                </div>
                <button class="btn row btn-primary align-self-end" style="background-color: #0650C6; border-color: #0650C6" onclick="return confirm('¿Desea continuar el cálculo con los datos modificados?');" id="guardarValores" disabled>Guardar valores</button>
              </div>
            </div>
          </div><!-- /.Tarjeta para parámetros Predeterminados -->

          <!-- Tarjeta para arreglo del sistema -->
          <div class="card card-outline card-primary">
            <div class="card-header">
              <h5>Arreglo del Sistema</h5>
            </div>

            <div class="card-body">
              <div class="row">
                <!-- Variables predeterminadas de los paneles -->
                <div class="col-sm-6"><!-- Columna 1 Paneles -->
                  <div class="col-sm-12 d-flex justify-content-center"> <!-- Encabezado -->
                    <label class="form-control-sm">PANELES</label>
                  </div><!-- /.Encabezado -->

                  <div class="tab-custom-content"><!-- Contenido con tabulador superior -->
                    <div class="col-sm-12">
                      <form method="POST">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="col-form-label form-control-sm">Modelo</label>               
                          <select class="form-control form-control-sm" id="selectorModeloPanel" >
                            <?php
                            foreach ($paneles as $panel){
                              $modelo = $panel['modelo'];
                              $valor = $panel['valor'];
                              $selected = (isset($_POST['modelo']) && $_POST['modelo'] == $modelo) ? 'selected' : '' ;
                              echo "<option value='$modelo' $selected>$modelo (Potencia: $valor W) </option>";
                            }
                            ?>
                          </select>
                        </div>
                      </form>

                      <!-- Contenedor para centrar la tabla de especificaciones técnicas del panel-->
                      <div class="col-sm-12 d-flex justify-content-center">
                        <div class="table-responsive mx-auto">
                          <table class="table table-sm">
                            <tbody id="caracteristicasPanel">
                              <tr>
                                <td class="form-control-sm col-4">Potencia (W)</td>
                                <td id="potencia" class="form-control-sm col-6"> - </td>
                              </tr>
                              <tr>
                                <td class="form-control-sm col-4">Alto (m)</td>
                                <td id="alto" class="form-control-sm col-6"> - </td>
                              </tr>
                              <tr>
                                <td class="form-control-sm col-4">Ancho (m)</td>
                                <td id="ancho" class="form-control-sm col-6"> - </td>
                              </tr>
                              <tr>
                                <td class="form-control-sm col-4">Eficiencia (%)</td>
                                <td id="eficiencia" class="form-control-sm col-6"> - </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 mt-1">
                      <div class="d-flex justify-content-between align-items-center" style="margin-top: 3%">
                        <label class="col-form-label form-control-sm">Arreglo</label>
                        <select class="form-control form-control-sm">
                          <option>Serie</option>
                          <option>Paralelo</option>
                        </select>
                      </div>
                      
                      <!-- Contenedor para centrar la tabla del arreglo de paneles-->
                      <div class="col-sm-12 d-flex justify-content-center">
                        <div class="table-responsive mx-auto">
                          <table class="table-sm">
                            <tbody>
                              <tr>
                                <td class="form-control-sm col-4">Amperaje paneles (A)</td>
                                <td class="form-control-sm col-6">-</td>
                              </tr>
                              <tr>
                                <td class="form-control-sm col-4">VoC (V)</td>
                                <td class="form-control-sm col-6">-</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div> <!-- /.Contenido con tabulador superior -->
                </div><!-- /.Columna 1 -->

                <!-- Variables predeterminadas de las baterías -->
                <div class="col-sm-6"><!-- Columna 2 Baterías -->
                  <div class="col-sm-12 d-flex justify-content-center">
                    <label class="form-control-sm">BATERÍAS</label>
                  </div>

                  <div class=" tab-custom-content">
                    <div class="col-sm-12">
                      <form method="POST">
                        <div class="d-flex justify-content-between align-items-center">
                          <label class="col-form-label form-control-sm">Modelo</label>
                          <select class="form-control form-control-sm" id="selectorModeloBateria">
                            <?php
                            foreach ($baterias as $bateria){
                              $modelo = $bateria['modelo'];
                              $valor = $bateria['valor'];
                              $selected = (isset($_POST['modelo']) && $_POST['modelo'] == $modelo) ? 'selected':'';

                              echo "<option value='$modelo' $selected>$modelo (Capacidad: $valor Ah) </option>";
                            }
                            ?>
                          </select>
                        </div>

                        <!-- Contenedor para centrar la tabla -->
                        <div class="col-sm-12 d-flex justify-content-center">
                          <div class="table-responsive mx-auto">
                            <table class="table-sm">
                              <tbody id="caracteristicasBaterias">
                                <tr>
                                  <td class="form-control-sm col-4">Capacidad (Ah)</td>
                                  <td id="capacidad" class="form-control-sm col-6"> - </td>
                                </tr>
                                <tr>
                                  <td class="form-control-sm col-4">Voltaje batería (V)</td>
                                  <td id="voltaje" class="form-control-sm col-6"> - </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </form>
                      <div class="col-sm-12 d-flex justify-content-end" style="height: 160px">
                        <button class="btn row btn-primary align-self-end" style="background-color: #0650C6; border-color: #0650C6" onclick="return confirm('¿La selección de arreglo del sistema es correcto?');">Calcular lista de materiales</button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.Columna 2 -->
                
                <!-- Variables de los resultados obtenidos -->
                <!-- Columna 3 -->
                <div class="col-sm-12 wrapper">
                  <div class="tab-custom-content">
                    <div class="col-sm-12 d-flex justify-content-center"> <!-- Encabezado -->
                      <label class="form-control-sm">RESULTADOS</label>
                    </div><!-- /.Encabezado -->
                  </div>
                  <div style="overflow: auto; max-width: 100%;">
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col" class="form-control-sm text-center"></th>
                          <?php for ($i = 1; $i <= 30; $i++) { ?>
                            <th scope="col" class="form-control-sm text-center">Día <?php echo $i; ?></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row" class="form-control-sm text-center">Radiación solar registrada en el día (kWh/m2)</th>
                        </tr>
                        <tr>
                          <th scope="row" class="form-control-sm text-center">Generación al día de los paneles (Wh)</th>
                        </tr>
                        <tr>
                          <th scope="row" class="form-control-sm text-center">Energía remanente (Generado - consumido)(Wh)</th>
                        </tr>
                        <tr>
                          <th scope="row" class="form-control-sm text-center">Carga de baterías al día (Wh)</th>
                        </tr>
                        <tr>
                          <th scope="row" class="form-control-sm text-center">Porcentaje restante de baterías (%)</th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div><!-- /.Columna 3 -->

                <!-- Parámetros del sistema generado -->
                <!-- Columna 5 -->
                <div class="col-sm-6">
                  <table class="table-sm" style="border: 1.5px solid black;">
                    <tbody>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%">Energía requerida del sistema al día</th>
                        <td class="form-control-sm col-2">0</td>
                      </tr>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%">Energía adicional al día para rellenar baterías</th>
                        <td class="form-control-sm col-2">0</td>
                      </tr>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%">Radiación solar recibida por el panel al día (Wh/día)</th>
                        <td class="form-control-sm col-2">0</td>
                      </tr>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%">Energía eléctrica generada por el panel al día (Wh/día)</th>
                        <td class="form-control-sm col-2">0</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.Columna 5 -->

                <!-- Parámetros del sistema generado + piezas/redondeo de paneles y baterías -->
                <!-- Columna 6 -->
                <div class="col-sm-6">
                  <table class="table-sm col-sm-12" style="border: 1.5px solid black;">
                    <tbody>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%">Energía requerida para respaldo (wh/dia)</th>
                        <td class="form-control-sm col-2">0</td>
                      </tr>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%">Potencia utilizable de batería (Wh)</th>
                        <td class="form-control-sm col-2">0</td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="table-sm" style="border: 1.5px solid black;">
                    <thead>
                      <tr>
                        <th class="form-control-sm col-6 text-center" style="background-color: #D9D9D9; border-radius: 0%">Componente</th>
                        <th class="form-control-sm col-1 " style="background-color: #D9D9D9; border-radius: 0%">Piezas</th>
                        <th class="form-control-sm col-1 " style="background-color: #D9D9D9; border-radius: 0%">Redondeo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%;">Módulos fotovoltaicos necesarios (pzs)</th>
                        <td class="form-control-sm col-1">0</td>
                        <td class="form-control-sm col-1">0</td>
                      </tr>
                      <tr>
                        <th class="form-control-sm col-6" style="background-color: #F2F2F2; border-radius: 0%;">Baterías necesarios (pzs)</th>
                        <td class="form-control-sm col-1">0</td>
                        <td class="form-control-sm col-1">0</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.Columna 6 -->
              </div><!-- /.Row -->
              <div id="resultado"></div>
            </div><!-- /.Cuerpo de la tarjeta -->
          </div><!-- /.Tarjeta para arreglo del sistema -->
        </div>
      </div> <!-- /.Contenido principal de la página -->      
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
  <!-- Bootstrap -->
  <script src="../templates/AdminLTE v3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="../templates/AdminLTE v3.2.0/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../templates/AdminLTE v3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../templates/AdminLTE v3.2.0/dist/js/adminlte.min.js"></script>
  <!-- Filterizr-->
  <script src="../templates/AdminLTE v3.2.0/plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- Modificar el estado y valor de inputs correspondientes al formulario "Parámetros Predeterminados"-->
  <script>
    // Habilitar/Deshabilitar input's de acuerdo al cambio del checkbox
    document.getElementById("habilitar_casillas").addEventListener("change", function() {
      let habilitar = this.checked;
      document.querySelectorAll("#variablesForm input[type=number]").forEach(input => {
        input.disabled = !habilitar;
      });
      document.getElementById("guardarValores").disabled = !habilitar;
    });

    // Cambiar valor al ingresado por usuario al seleccionar botón
    document.getElementById("guardarValores").addEventListener("click", function() {
      let valores = [];
      document.querySelectorAll("#variablesForm input[type=number]").forEach(input => {
        let tempDisabled = input.disabled;
        input.disabled = false; //Habilita temporalmente el input para poder acceder a su valor, ya que algunos navegadores no leen valores de inputs deshabilitados.
        valores.push(`${input.id}: ${input.value}`);
        input.disabled = tempDisabled; 
      });
      document.getElementById("resultado").innerHTML = valores.join("<br>");
    });
  </script>
  <!-- Mostrar propiedades técnicas de cada panel o batería dentro de su tabla correspondiente -->
  <script>
    //Propiedades del panel
    document.getElementById("selectorModeloPanel").addEventListener("change", function () {
      const modelo = this.value;

      fetch("configurador.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `modelo=${encodeURIComponent(modelo)}&ajax=1`
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById("potencia").textContent = data.potencia;
        document.getElementById("alto").textContent = data.alto;
        document.getElementById("ancho").textContent = data.ancho;
        document.getElementById("eficiencia").textContent = data.eficiencia;
      })
      .catch(error => console.error("Error al cargar datos:", error));
    });

    //Propiedades de la batería
    document.getElementById('selectorModeloBateria').addEventListener('change', function() {
      const modelo = this.value;
      
      fetch('configurador.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `modelo_bateria=${encodeURIComponent(modelo)}&ajax=1`
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById('voltaje').textContent = data.voltaje;
        document.getElementById('capacidad').textContent = data.capacidad;
      });

    });
  </script>
  </body>
</html>