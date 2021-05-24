<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
 {
   $cuenta=$_POST["cuenta"];
   echo $cuenta;
   $newName=$_POST["name"];
   $newUsuario=$_POST["correo"];
   $newTel=$_POST["tel"];
   $newPass=$_POST["pass"];
   $newGrupo=$_POST["grupo"];
   include "dbConn.php";

   if($cuenta=="joven"){
     $sql = "INSERT INTO joven (nombre, correo, telefono, contraseña, idGrupo) VALUES ('".$newName."', '".$newUsuario."', '".$newTel."', '".$newPass."', '".$newGrupo."')";
     if ($conexion->query($sql) === TRUE) {
        header("Location: Administrador.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
      }
   }
   if($cuenta=="capacitador"){
     $sql = "INSERT INTO capacitador (nombreCap, correo, telCap, contraseña) VALUES ('".$newName."', '".$newUsuario."', '".$newTel."', '".$newPass."')";

     if ($conexion->query($sql) === TRUE) {
        header("Location: Administrador.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
      }
   }
   if($cuenta=="Administrador"){
     $sql = "INSERT INTO admin (nombre, correo, telefono, contraseña) VALUES ('".$newName."', '".$newUsuario."', '".$newTel."', '".$newPass."')";
     if ($conexion->query($sql) === TRUE) {
        header("Location: Administrador.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
      }
   }
 }
?>
