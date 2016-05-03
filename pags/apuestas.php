<!DOCTYPE HTML>

<?php
//require_once('consultas.php');
require_once('gestionDB.php');
require_once 'validaciones.php';
    validarAsesor();
?>

<html lang="es">
      <head>
          <meta charset = "utf-8">
          <title>Apuestas</title>
          <link rel="stylesheet" href="../css/apuestas.css">
      </head>  
      <body>
          
          <center>
              <div id="banner">
              <div id="logo">
                 <img style="absolute:left" src="../images/Bookiesport_Logo.png" height="140">
                  </div>
                  </div>
              <div id="apuestas">
              <center><h2> <label><strong>Saldo Disponible: </strong><stron></h2></center><?php 
                  $enlace = connectionDB();
                  $saldoA = saldo($enlace,$_SESSION['id']);
                  echo "<strong>$ ".$saldoA."</strong>";
                  echo "<script>
                  var sal=".$saldoA.";
                  </script>";
                  ?></stron></strong></label>
             <form method="post" action="ingresoApuesta.php" id='formularioApuesta' onsubmit="return confirmar()">
                <div id="saldos"><!--se usa para la validacion en java script-->
                    <input type="text" id="saldo" name="saldo">
                </div>
                 <ul style="list-style-type:none">
                    Datos Apostador:
                     <li>
                         <label>CC: </label>
                         <input type='text' name='cedula' required maxlength="20" id="CC" class="estiloinput">
                     </li>
                     <li>
                         <label>Nombre: </label>
                         <input type="text" name='nombre' required maxlength='20' id="nombre" class="estiloinput">
                     </li>
                     <li>
                         <label>$ valor: </label>
                         <input type="number" name="valor" required maxlength='6' id="valor"class="estiloinput">
                     </li>
                     Datos partido
                     <li>
                         <label>Fecha partido: </label>
                         <input type="date" name='fecha' required id="fecha" class="estiloinput">
                     </li>
                     
                     <li><div id="loadingPartido" >
                        <label>Partido: </label>
                         <select name="partidos" id="partidos" required>
<!--                         se cargaran los option desde php-->
                         </select>
                         </div>
                         <div id="divPartidos">
                             <ul>
                                 <li><label>Equipo A: </label>
                                     <input list="equipos" name="equipoA" id="otroequipo1" class="estiloinput">
                                     <datalist id="equipos">
                                         
                                         <?php
                                         $enlace = connectionDB();
                                         $listEquipo = equipos($enlace);
                                         connectionClose($enlace);
                                         
                                         foreach($listEquipo as $v){
                                             echo('<option>'.$v.'</option>');
                                         }
                                         
                                         ?>
                                     </datalist>
                                 </li>
                             
                                 <li><label>Equipo B: </label>
                                     <input list="equipos" name="equipoB" id="otroequipo2" class="estiloinput">
                                     <datalist id="equipos">
                                         <?php
                                         foreach($listEquipo as $v){
                                             echo('<option>'.$v.'</option>');
                                         }
                                         ?>
                                     </datalist>
                                 </li>
                                 <li><label>HORA: </label><input type="time" name="hora" id="hora" class="estiloinput"> </li>
                             </ul>
                         </div>
                     </li>
                     <li>
                         <label>Liga Torneo: </label>
                         <input list="liga" name="liga" id="ligaselect" required class="estiloinput">
                         <datalist id="liga">
                             <!--<option value="liga1">-->
                             <?php
                             $enlace = connectionDB();
                            $listLigas = ligas($enlace);
                            connectionClose($enlace);

                           foreach($listLigas as $v){ echo('<option>'.$v.'</option>');}
                             ?>
                         </datalist>
                     </li>
                     <li>
                         <label id=equipoApuesta>Equipo apuesta: </label>
<!--                         insertar codigo php desde ajax-->
                         <select name="equipoApostado" id="equipoApostado" required>

                        <div id="opciones">
                            
                        </div>
                         </select>
                     </li>
                 </ul>
                 <div id="inputs">
                      <input type='text' name='partido' id="partidoselecionado" class="inputs" class="estiloinput">

                     <input type="text" name='equipoapuesta' id="equipoapuesta" class="inputs" class="estiloinput">
                 </div>
                 <button id="enviar" class="button" type="submit">Enviar Apuesta</button>
             </form> 
              </div>
           
          </center>
          
      </body>
      <script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
      <script src="../js/apuestas.js"></script>
      
</html>