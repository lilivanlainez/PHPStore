<?php
   $host = "localhost:3306"; // Cambia 3306 por el número de puerto de tu servidor MySQL
   $user = "root";
   $clave = "";
   $bd = "card";
   $conexion = mysqli_connect($host, $user, $clave, $bd);
   if (mysqli_connect_errno()) {
       echo "No se pudo conectar a la base de datos";
       exit();
   }
   mysqli_select_db($conexion, $bd) or die("No se encuentra la base de datos");
   mysqli_set_charset($conexion, "utf8");
   