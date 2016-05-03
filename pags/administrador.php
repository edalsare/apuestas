<!DOCTYPE HTML>
    <?php
    require_once 'validaciones.php';
    validarAdmin();
    ?>


<html lang="=es">
   <head>
       <meta charset="utf-8">
       <title>Administrador</title>
   </head>
    <body>
        <h1>Bienvenidos Asesores</h1>
        <a href="ingresoAsesores.php">Agregar asesores</a>
        <br>
        <a href="generarSaldo.php">Agregar saldo a asesores</a>
    </body>
</html>
