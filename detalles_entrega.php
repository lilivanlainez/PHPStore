<?php
// detalles_entrega.php
require_once "config/conexion.php";
require_once "config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... (código del encabezado) ... -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/informacion_cliente.css">
    <link rel="stylesheet" href="assets/css/detalles_entrega.css">
    <title>Detalles de entrega</title>
</head>

<body>
     <!-- Navigation-->
     <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Zareshka</a>
             
                </button>
            </div>
        </nav>
    </div>
    <!-- Banner con Fondo -->
    <div class="banner-container">
    <div class="content">
            <img src="/assets/img/logo.png" alt="Logo de Zarezka"> <!-- Cambia 'tu-logo.png' con la ruta de tu logo -->
        </div>
    </div>
    <div class="container">
        <h2>Detalles de Entrega</h2>
        <form id="formDetallesEntrega">
        <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <select class="form-select" id="departamento" required>
                    <!-- Opciones de departamentos -->
                    <option value="">Selecciona</option>
                    <option value="SanSalvador">San Salvador</option>
                    <option value="Ahuachapán">Ahuachapán</option>
                    <option value="Cabañas">Cabañas</option>
                    <option value="Chalatenango">Chalatenango</option>
                    <option value="Cuscatlán">Cuscatlán</option>
                    <option value="La Libertad">La Libertad</option>
                    <option value="La Paz">La Paz</option>
                    <option value="La Unión">La Unión</option>
                    <option value="Morazán">Morazán</option>
                    <option value="San Miguel">San Miguel</option>
                    <option value="San Vicente">San Vicente</option>
                    <option value="Santa Ana">Santa Ana</option>
                    <option value="Sonsonate">Sonsonate</option>
                    <option value="Usulután">Usulután</option>
                </select>

        </div>

            <div class="mb-3">
                <label for="municipio" class="form-label">Municipio</label>
                <select class="form-select" id="municipio" required>
                    <!-- Opciones de municipios (se llenarán dinámicamente) -->
                </select>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" required>
            </div>
            <div class="mb-3">
                <label for="referencia" class="form-label">Punto de Referencia</label>
                <input type="text" class="form-control" id="referencia" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="guardarDetallesEntrega()">Siguiente</button>
        </form>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script>
        function guardarDetallesEntrega() {
    // Recoger la información del formulario
    var departamento = $('#departamento').val();
    var municipio = $('#municipio').val();
    var direccion = $('#direccion').val();
    var referencia = $('#referencia').val();

    // Verificar si hay información del cliente en localStorage
    var informacionCliente = JSON.parse(localStorage.getItem('detalles_entrega')) || {};

    // Actualizar la información del cliente con los detalles de entrega
    informacionCliente.departamento = departamento;
    informacionCliente.municipio = municipio;
    informacionCliente.direccion = direccion;
    informacionCliente.referencia = referencia;

    // Guardar la información actualizada en localStorage
    localStorage.setItem('detalles_entrega', JSON.stringify(informacionCliente));

    // Redireccionar a confirmacion_pedido.php
    window.location.href = 'confirmacion_pedido.php';
}

    </script>
    <!-- ... (código anterior) ... -->

<script>
    // Obtener referencias a los elementos del DOM
    var departamentoSelect = document.getElementById('departamento');
    var municipioSelect = document.getElementById('municipio');

    // Definir los municipios para cada departamento (puedes extender esta lista según tus necesidades)
    var municipiosPorDepartamento = {
        SanSalvador: ['San Salvador', 'Mejicanos', 'Apopa'],
    Ahuachapán: ['Ahuachapán', 'Atiquizaya', 'Apaneca', 'Jujutla'],
    Cabañas: ['Sensuntepeque', 'Ilobasco', 'Cinquera'],
    Chalatenango: ['Chalatenango', 'Nueva Concepción', 'La Palma', 'San Francisco Morazán'],
    Cuscatlán: ['Cojutepeque', 'Candelaria', 'Oratorio de Concepción'],
    LaLibertad: ['Santa Tecla', 'Antiguo Cuscatlán', 'La Libertad', 'Santa Elena'],
    LaPaz: ['Zacatecoluca', 'San Juan Nonualco', 'Olocuilta', 'San Pedro Masahuat'],
    LaUnión: ['La Unión', 'Concepción de Oriente', 'Santa Rosa de Lima', 'Pasaquina'],
    Morazán: ['San Francisco Gotera', 'Sociedad', 'Corinto', 'Yoloaiquín'],
    SanMiguel: ['San Miguel', 'Usulután', 'Carolina', 'San Rafael Oriente'],
    SanVicente: ['San Vicente', 'Tecoluca', 'Tepetitán', 'Verapaz'],
    SantaAna: ['Santa Ana', 'Metapán', 'Chalchuapa', 'Atiquizaya'],
    Sonsonate: ['Sonsonate', 'Sonzacate', 'Izalco', 'Nahuizalco'],
    Usulután: ['Usulután', 'Jiquilisco', 'San Dionisio', 'Santa María'],
};


    // Función para llenar el select de municipios según el departamento seleccionado
    function actualizarMunicipios() {
        // Obtener el valor seleccionado del departamento
        var departamentoSeleccionado = departamentoSelect.value;

        // Obtener la lista de municipios correspondiente al departamento seleccionado
        var municipios = municipiosPorDepartamento[departamentoSeleccionado] || [];

        // Limpiar el select de municipios
        municipioSelect.innerHTML = '';

        // Llenar el select de municipios con las opciones correspondientes
        municipios.forEach(function (municipio) {
            var option = document.createElement('option');
            option.value = municipio;
            option.text = municipio;
            municipioSelect.add(option);
        });
    }

    // Agregar un evento de cambio al select de departamentos
    departamentoSelect.addEventListener('change', actualizarMunicipios);

    // Llamar a la función inicialmente para cargar los municipios según el valor inicial del departamento
    actualizarMunicipios();
</script>

<!-- ... (código anterior) ... -->

</body>

</html>
