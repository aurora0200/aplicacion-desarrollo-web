<?php

include "dbconn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

//Ver si el usuario tiene archivos en la base
$sqlCap="SELECT * FROM grupo WHERE idC = '".$id."' ";
$consultaCap= mysqli_query ($conexion,$sqlCap) or die ("Fallo en consulta");
$nfilasCap= mysqli_num_rows ($consultaCap);



//Eliminar datos del usuario en los archivos
if ($nfilasCap>0){
  $sql = "DELETE FROM grupo where idC= '".$id."'";
  $delActa=mysqli_query($conexion, $sql);
}
//Eliminar usuario
 $sql = "DELETE FROM capacitador where idC= '".$id."'";
 if(mysqli_query($conexion, $sql)){
   echo'<script type="text/javascript">
        alert("usuario eliminado");
        window.location.href="Administrador.php";
        </script>';
 }
 header("Location: Administrador.php");
?>
