<?php

$conexion = mysqli_connect("localhost","root","","empleabilidad");

if(!$conexion)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
