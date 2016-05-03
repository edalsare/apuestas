<!DOCTYPE HTML>
<html lang="es">
   <head>
       <meta charset="utf-8">
       <title>asesor</title>
   </head>
    <body>
    
    <?php
        require_once('gestionDB.php');
            
        
    ?>
    <table>
       <tr>
        <th>Asesor</th>
        <th>Saldo Actual</th>
        </tr>
        <?php
        $enlace= connectionDB();
        $ase = listAsesores($enlace);
        connectionClose($enlace);
        for($i=0;$i<count($ase);$i++){
            $l=0;
            echo("<tr><td>".$ase[$i][$l]."</td>");
            $l++;
            echo("<td>".$ase[$i][$l]."</td></tr>");
           
        }
        ?>
        
    </table>
    
        <form  method="POST" action="lib/ingresoSaldo.php" id="ingresar">
        <select id='asesores' name='asesores'>
            <?php
        echo'<option value="seleccion">Seleccione asesor</option>';
            for($i=0;$i<count($ase);$i++){
                echo('<option value="'.$ase[$i][2].'">'.$ase[$i][0].'</option>');
            }
            ?>
    </select>
        <label>Saldo: </label><input type="text" name="saldo"><button id="agregar">Agregar Saldo</button>
        </form>
        
        <a href="administrador.php">Inicio</a>
        
    </body>
</html>