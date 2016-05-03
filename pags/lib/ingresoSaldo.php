<?php
require_once('../gestionDB.php');

$id = $_POST['asesores'];
$saldo = $_POST['saldo'];
echo '<script type="text/javascript">alert("Saldo agregado ocn exito '.$id.' id '.$saldo.' agregado")</script>';

$saldoactual = 0;
$sql='SELECT SALDO FROM saldos WHERE IDASESOR="'.$id.'";';


$enlace = connectionDB();
$enlace->autocommit(false);
$flag = true;
if(!$enlace->query($sql)){
    $flag = false;
    echo 'error en tansaccion saldos';
}
$result = $enlace->query(($sql));
if($row = $result->fetch_assoc()){
    $saldoactual=$row['SALDO'];
}else{
    $flag = false;
    echo 'error en tansaccion saldos';
}
$saldoactual=$saldoactual+$saldo;
$sql2='UPDATE saldos SET SALDO="'.$saldoactual.'" WHERE IDASESOR="'.$id.'";';
if(!$enlace->query($sql2)){
    $flag = false;
    echo 'error en tansaccion saldos';
}
if($flag){
    $enlace->commit();
}else{
    $enlace->rollBack();
}
connectionClose($enlace);
header('location: ../generarSaldo.php')
?>