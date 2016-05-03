<?php
require_once('../gestionDB.php');

$idp = $_REQUEST['idpartido'];

$arr = array();

$enlace = connectionDB();
$arr=equiposLigaPartido($enlace,$idp);
if($arr){
    $idEquipoA=$arr[0];
    $idEquipoB=$arr[1];
    $nomEquiA = nomEquipo($idEquipoA,$enlace);
    $nomEquiB = nomEquipo($idEquipoB,$enlace);
}
connectionClose($enlace);
echo("<option value='seleccion'>selecione equipo</option><option value='".$nomEquiA."'>".$nomEquiA."</option>
<option value='".$nomEquiB."'>".$nomEquiB."</option><option value='enpate'>Enpate</option>");

?>