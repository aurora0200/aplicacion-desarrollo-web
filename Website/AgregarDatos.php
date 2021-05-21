<?php
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<html>
<meta charset="UTF-8">
<head>
<link rel="stylesheet" href="styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
form
{
  position:relative;
  background-color: #faf22e;
  top:50px;
  width: 800px;
  left:40px;
  -moz-border-radius:24px;
  border-radius:24px;
  border: 2px solid black;
  opacity: 0.8;
  padding-bottom: 20px;
}
#bImage
{
  left: 0px;
  position: fixed;
  height: 70%;
  background-image: url('background.png');
  background-size: cover;
  background-position:absolute;
  background-repeat: no-repeat;
  background-position: fixed;
  padding-top: 20%;
  padding-bottom: 20%;
  padding-left: 100%;
  padding-right: 100%;
}
</style>
<body>
  <img src="Udemlogo.png" style="position: relative; top:0px; left:0px; height:100px; width:200px;">
  <div id= "bImage">

  </div>
    <form name ="myform" action="editInfo.php" method="POST" enctype="multipart/form-data" onsubmit="myFunction()" >
      <div>
          <p style="position: relative;left:10px;">Fecha de Nacimiento: <input type="date" name = "fechaNac"></input></p>
          <p style="position: relative;left:10px;">Direccion:</p>
          <input style="position: relative;left:30px;" name = "direccion"></input>
          <p style="position: relative;left:10px;">Estatus Civil:</p>
          <select name="estado Civil" style="position: relative;left:30px;">
            <option>Casado</option>
            <option>Soltero</option>
            <option>Relación Libre</option>
            <option>Prefiero no decirlo</option>
          </select>
          <p style="position: relative;left:10px;">Numero de Hijos <input type="number"min="0" placeholder="0" style="width:50px;" name="hijos"></input></p>
          <p style="position: relative;left:10px;">Nivel de escolaridad:</p>
          <select name="escolaridad" style="position: relative;left:30px;">
            <option>Secundaria</option>
            <option>Secundaria Trunca</option>
            <option>Preparatoria</option>
            <option>Preparatoria Trunca</option>
            <option>Licenciatura</option>
            <option>Licenciatura Trunca</option>
            <option>Master</option>
            <option>Doctorado</option>
          </select>
          <p style="position: relative;left:10px;">Situacion Laboral:</p>
          <select name="situacionLaboral" style="position: relative;left:30px;">
            <option>Sin empleo</option>
            <option>1 trabajo</option>
            <option>2 o más trabajos</option>
            <option>Estudio o trabajo al mismo tiempo</option>
          </select>
          <p style="position: relative;left:10px;">Nombre de la empresa que labora:</p>
          <input type="text" placeholder="" style="position: relative;width:250px; left:10px;" name="empresa"></input>
      </div>
      <div style="position:absolute; right:0px; top:10px;">
          <p>Acta de Nacimiento: <input type="file" name = "acta"></input></p><br><br>
          <p>Comprobante de Estudios: <input type="file" name = "comprobante"></input></p><br>
          <p>CURP: <input type="file" name ="curp"></input></p>
          <p>**Disclaimer**</p>
          <input type="checkbox">He leido y acepto los terminos y condiciones</input><br><br><br>
          <input type="submit" id="editFiles" value="Continuar" style="position:relative; left:180px; width:150px;height:50px; background:#403b33; color:#faf22e; ">
          <a href="Estudiante.php" style="position: relative; right:90px; top:10px;">Regresar</a>
      </div>

    </form>
    <footer>

  <a href="https://www.w3schools.com/tags/tag_footer.asp" id="a" style="padding-left:30px; padding-bottom: 10px;"> Numero de Contacto</a>
  <a href="https://www.w3schools.com/tags/tag_footer.asp" id="a" style="padding-right:260px; padding">| Correo</a>
    <a href="#" class="fa fa-facebook" ></a>
      <a href="#" class="fa fa-instagram" ></a>
      <a href="#" class="fa fa-twitter" ></a>
      <a href="#" class="fa fa-google">+</a>
      <img src="188.png" style=" height:75px; width:150px; padding-left:100px; padding-right:10px;">

  </footer>
</html>
