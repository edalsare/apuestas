<!DOCTYPE HTML>
<?php
    require_once 'validaciones.php';
    validarAdmin();
?>
<html lang="es">
      <head>
          <meta charset = "utf-8">
          <title>agregarAsesores</title>
      </head>
      <body>
          <center>
             
              <form method="post" action="ingresosUpdates.php" id="formularioAsesor" onsubmit="return confirmar()">
                 <ul>
                    <li>
                        <label>Nombre: </label>
                        <input type="text" name='nombre' required maxlength="20">
                    </li>
                    <li>
                        <label>Apellido: </label>
                        <input type="text" name="apellido" required maxlength="20">
                    </li>
                    <li>
                        <label>Cedula: </label>
                        <input type="text" name="cedula" required maxlength="20">
                    </li>
                    <li>
                        <label>Telefono: </label>
                        <input type="tel" name="telefono" required maxlength="15">
                    </li>
                    <li>
                        <label>Email: </label>
                        <input type="email" name="email" required maxlength="40">
                    </li>
                    <li>
                        <label>ID Usuario: </label>
                        <input type="text" name="usuario" required maxlength="10">
                    </li>
                     <li>
                         <label>Contraseña: </label>
                         <input type="password" name="password" required maxlength="8" placeholder="maximo 8 caracteres">
                     </li>
                     <li>
                         <button type="submit" name="ingresar" id="btnIngAsesor">Ingresar</button>
                     </li>
                 </ul>
                  <div id='result'></div>
              </form>
          </center>
          <a href="administrador.php">Inicio</a>
      </body>
      <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
      <script src="../js/funciones.js"></script>
</html>