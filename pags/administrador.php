<!DOCTYPE HTML>
    <?php
    require_once 'validaciones.php';
    validarAdmin();
    ?>


<html lang="=es">
   <head>
       <meta charset="utf-8">
       <title>administrador</title>
   </head>
    <body>
        <h1>bienbenidos administradores</h1>
        <a href="ingresoAsesores.php">agregar asesores</a>
        <br>
        <a href="generarSaldo.php">Agregar saldo a asesores</a>
    </body>
</html>
