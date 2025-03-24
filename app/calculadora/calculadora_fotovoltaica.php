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
  
  <!-- Temas -->
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../templates/AdminLTE v3.2.0/dist/css/adminlte.min.css">
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
              <h1 class="m-0">Calculadora Fotovoltaica - Sistema de cargas</h1>
            </div><!-- /.col -->
          </div>
        </div>
      </div>
      <!-- /Encabezado de página -->

      <!-- Contenido principal de la página -->
      <div class="content">
        <div class="container-fluid">
          <!-- Tarjeta para cálculo de corrienntes de los dispositivos en un sistema fotovoltaico -->
          <div class="card card-outline card-primary" style="border-top:3px solid #0650C6">
            
            <form id="voltajeForm" class="card-body">

              <!-- Selección de voltaje del sistema y hrs_funcionamiento de dispositivos del sistema-->
              <div class="form-group row">
                
                  <label for="voltajeSelect" class="col-form-label form-control-sm" style="width: auto; display: inline-block; white-space: nowrap;">Voltaje del sistema</label>
                  <select id="voltajeSelect" class="col-sm-2 form-control form-control-sm" style="margin-right: 1rem">
                    <option value="12">12 voltios</option>
                    <option value="24" selected>24 voltios</option>
                    <option value="48">48 voltios</option>
                  </select>
              

              
                  <label class=" col-form-label form-control-sm" style="width: auto; display: inline-block; white-space: nowrap;">Dispositivos en el sistema de cargas</label>
                  <input class="col-sm-2 form-control form-control-sm" type="number" id="numDispositivos" value="0" oninput="actualizarTabla()">
                
              </div> <!-- ./Selección de voltaje del sistema y hrs_funcionamiento de dispositivos del sistema-->

              <div class="row d-flex justify-content-end">
                <table class="table table-hover" >
                  <!-- ENCABEZADO DE TABLA-->
                  <thead>
                    <tr>
                      <th scope="col">Nombre del dispositivo</th>
                      <th scope="col">Potencia (W)</th>
                      <th scope="col">Horas de funcionamiento al día</th>
                      <th scope="col"></th>
                    </tr>
                  </thead> <!-- /.ENCABEZADO DE TABLA -->

                  <!-- CUERPO TABLA-->
                  <tbody id="tablaDispositivos">
                  </tbody> <!-- -->

                </table>
                <a id="continuar_calculo" class="btn-sm btn-primary btn-block d-flex align-items-center justify-content-center" style="margin-right:33px ; width:160px ; background-color: #0650C6 ; border-color: #0650C6" onclick="return confirm('¿Deseas con el cálculo de cargas?');"> Continuar cálculo</a>
              </div>

              <div id="resultado"></div>
            </form><!-- /.card-body -->
            
          </div><!-- /.Tarjeta -->
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
  <!-- Bootstrap 4 -->
  <script src="../templates/AdminLTE v3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../templates/AdminLTE v3.2.0/dist/js/adminlte.min.js"></script>
  <!-- Script para actualizar tabla -->
  <script>
  function actualizarTabla() {
      let numDispositivosInput = document.getElementById("numDispositivos");
      let numDispositivos = parseInt(numDispositivosInput.value);
      let tablaBody = document.getElementById("tablaDispositivos");

      // Almacenamiento de los valores existentes dentro de la tabla
      let valoresPrevios = [];
      let filasExistentes = tablaBody.getElementsByTagName("tr");

      for (let i = 0; i < filasExistentes.length; i++) {
          let inputs = filasExistentes[i].getElementsByTagName("input");
          valoresPrevios.push({
              nombre: inputs[0].value,
              potencia: inputs[1].value,
              horas: inputs[2].value
          });
      }

      let numFilasActuales = filasExistentes.length;

      // Eliminar filas si el numero de dispositivos disminuye
      if (numDispositivos < numFilasActuales) {
          valoresPrevios = valoresPrevios.slice(0, numDispositivos);
      } else {
          //Agregar filas si el numero de dispositivos aumenta
          for (let i = numFilasActuales; i < numDispositivos; i++) {
              valoresPrevios.push({ nombre: "", potencia: "", horas: "" });
          }
      }

      tablaBody.innerHTML = "";

      // Insertar los valores almacenados
      for (let i = 0; i < valoresPrevios.length; i++) {
          let fila = document.createElement("tr");
          fila.innerHTML = `
              <td><input class="form-control form-control-sm" type="text" name="dispositivo_nombre_${i+1}" value="${valoresPrevios[i].nombre}"></td>
              <td><input class="form-control form-control-sm" type="number" name="potencia_${i+1}" value="${valoresPrevios[i].potencia}"></td>
              <td><input class="form-control form-control-sm" type="number" name="horas_${i+1}" value="${valoresPrevios[i].horas}"></td>
              <td>
                  <a href="#" class="btn-sm btn-primary btn-block d-flex align-items-center justify-content-center" 
                    style="width:160px; background-color: #191935; border-color: #191935"
                    onclick="eliminarFila(this)">
                    <i class="fa fa-minus " style="display: inline-block; margin-right: 5px"></i> Eliminar registro
                  </a>
              </td>
          `;
          tablaBody.appendChild(fila);
      }
  }

  // Eliminar una fila específica y actualizar el contador en "DIspositivos en el sistema de cargas"
  function eliminarFila(elemento) {
      let fila = elemento.closest("tr");
      fila.remove();

      // Actualizar el input "numDispositivos"
      let numDispositivosInput = document.getElementById("numDispositivos");
      let tablaBody = document.getElementById("tablaDispositivos");

      // Ajustar el valor del input al número actual de filas
      numDispositivosInput.value = tablaBody.getElementsByTagName("tr").length;
  }
  </script>
  <!-- Script para mandar datos a formulario -->
  <script>
    document.getElementById("continuar_calculo").addEventListener("click", function (event) {
      event.preventDefault(); 

      // Voltaje seleccionado desde la lista desplegable
      let voltajeSelect = document.getElementById("voltajeSelect");
      let voltajeSeleccionado = voltajeSelect.value;

      if (!voltajeSeleccionado) {
        alert("Selecciona un voltaje antes de continuar.");
        return;
      }

      // Obtención de información de los inputs en la tabla
      let tabla = document.getElementById("tablaDispositivos");
      let filas = tabla.getElementsByTagName("tr");
      let datosTabla = [];

      for (let i = 0; i < filas.length; i++) {
        let inputs = filas[i].getElementsByTagName("input");
        if (inputs.length === 3) {
          datosTabla.push({
            nombre: inputs[0].value.trim(),
            potencia: parseFloat(inputs[1].value) || 0,
            horas: parseFloat(inputs[2].value) || 0
          });
        }
      }

      // Verificar que al menos un dispositivo tenga datos
      if (datosTabla.length === 0 || datosTabla.every(d => !d.nombre)) {
        alert("Por favor, ingresa al menos un dispositivo.");
        return;
      }

      // Enviar los datos al backend
      fetch("calculos/matriz_dispositivos.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            voltaje: voltajeSeleccionado,
            datos: datosTabla
        })
      })
      .then(response => response.text())
      .then(data => {
        alert("Datos enviados correctamente.");
        document.getElementById("resultado").innerHTML = data;  // Mostramos la respuesta en el HTML

      })
      .catch(error => {
        alert("Error al enviar datos.");
      });
    });

  </script>

</body>
</html>