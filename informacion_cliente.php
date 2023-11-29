<?php
// informacion_cliente.php
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
    <title>Informacion Cliente</title>
</head>

<body>
    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Zareshka</a>
                 <span class="navbar-toggler-icon"></span>
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
        <h2>Información del Cliente</h2>
        <form id="formInformacionCliente">
            <div class="form-group">
                <label for="nombre">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="guardarInformacionCliente()">Siguiente</button>
        </form>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script>
        function guardarInformacionCliente() {
            // Recoger la información del formulario
            var nombre = $('#nombre').val();
            var correo = $('#correo').val();
            var telefono = $('#telefono').val();

            // Guardar la información localmente (puedes usar localStorage)
            localStorage.setItem('informacion_cliente', JSON.stringify({
                nombre: nombre,
                correo: correo,
                telefono: telefono
            }));

            // Redireccionar a detalles_entrega.php
            window.location.href = 'detalles_entrega.php';
        }
    </script>
</body>

</html>
