<?php
session_start();
$usuario=$_POST['usuario'];
$pass=$_POST['pass'];
if($_SERVER["REQUEST_METHOD"] == "POST")
 {

   /*Conectando a la base de datos*/
   $server = "localhost";
   $user = "root";
   $passbd = "";
   $dbname = "empleabilidad";
   $conexion = mysqli_connect ($server,$user,$passbd,$dbname) or die ("Error de conexi´on:".mysqli_connect_error());

   /*Consulta*/
   $instruccion = "SELECT correo, contraseña FROM joven WHERE correo = '".$usuario."' AND contraseña = '".$pass."' ";
   $consulta = mysqli_query ($conexion,$instruccion) or die ("Fallo en consulta");
   $nfilas= mysqli_num_rows ($consulta);
   $instruccionCap = "SELECT correo, contraseña FROM capacitador WHERE correo = '".$usuario."' AND contraseña = '".$pass."' ";
   $consultaCap = mysqli_query ($conexion,$instruccionCap) or die ("Fallo en consulta");
   $nfilasCap = mysqli_num_rows ($consultaCap);
   $instruccionAdmin = "SELECT correo, contraseña FROM admin  WHERE correo = '".$usuario."' AND contraseña = '".$pass."' ";
   $consultaAdmin = mysqli_query ($conexion,$instruccionAdmin) or die ("Fallo en consulta");
   $nfilasAdmin = mysqli_num_rows ($consultaAdmin);
   if ($nfilas > 0)/*Si es alumno*/
   {
     header("Location: estudiante.html");;
     $_SESSION['logged_in_user_name'] = $usuario;
   }
   elseif ($nfilasCap>0) {
     header("Location: Capacitador.html");
     $_SESSION['logged_in_user_name'] = $usuario;
   }
   elseif ($nfilasAdmin>0) {
     header("Location: Administrador");
     $_SESSION['logged_in_user_name'] = $usuario;
   }else {
     echo "no";
     mysqli_close($conexion);
   }


 }
 ?>
