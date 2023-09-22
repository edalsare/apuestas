<?php
<?php
    require_once 'validaciones.php';
require_once 'gestionDB.php';
validarAsesor();
$idp=null;

$apuesta=null;

if($_POST['idP']!=null){
    echo 'hola';
    $idp = $_POST['idP'];
    $apuesta = $_POST['apuesta'];
}
    
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
          <meta charset = "utf-8">
          </head>
      <body>
      <ul>
              <li id="selecfecha">
                  <label>Seleccione una fecha: </label>
                  <input type="date" name="fecha" id="fecha" <?php date_default_timezone_set('America/Lima');
                $dActual= new datetime();
                $dActual= date('Y-m-d');
                echo 'value = "'.$dActual.'"';
                ?>>
                 
              </li>
          </ul>
      
      <div id="listpartidos">
            
             
        
         
          </div>
      
</body>
</html>