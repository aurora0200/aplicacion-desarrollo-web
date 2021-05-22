<?php

include "dbconn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

//Ver si el usuario tiene archivos en la base
$sqlA="SELECT * FROM actanac WHERE idJoven = '".$id."' ";
$consultaA = mysqli_query ($conexion,$sqlA) or die ("Fallo en consulta");
$nfilasA= mysqli_num_rows ($consultaA);
$sqlCom="SELECT * FROM comprobanteestudios WHERE idJoven = '".$id."' ";
$consultaCom = mysqli_query ($conexion,$sqlCom) or die ("Fallo en consulta");
$nfilasCom= mysqli_num_rows ($consultaCom);
$sqlC="SELECT * FROM curpfile WHERE idJoven = '".$id."' ";
$consultaC = mysqli_query ($conexion,$sqlC) or die ("Fallo en consulta");
$nfilasC= mysqli_num_rows ($consultaC);


//Eliminar datos del usuario en los archivos
if ($nfilasA>0){
  $sql = "DELETE FROM actanac where idJoven= '".$id."'";
  $delActa=mysqli_query($conexion, $sql);
}
if ($nfilasCom>0) {
  $sql = "DELETE FROM comprobanteestudios where idJoven= '".$id."'";
  $delCom=mysqli_query($conexion, $sql);
}
if ($nfilasC>0) {
  $sql = "DELETE FROM curpfile where idJoven= '".$id."'";
  $delC=mysqli_query($conexion, $sql);
}
//Eliminar usuario
 $sql = "DELETE FROM joven where idJoven= '".$id."'";
 if(mysqli_query($conexion, $sql)){
   echo'<script type="text/javascript">
        alert("usuario eliminado");
        window.location.href="Administrador.php";
        </script>';
 }
 header("Location: Administrador.php");
?>
