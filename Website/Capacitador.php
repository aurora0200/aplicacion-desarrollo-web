<?php
session_start();
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <img src="Udemlogo.png" style="position: sticky; top:0px; left:0px; height:100px; width:200px;">
  <button style="position:fixed; right:110px;top: 10px; color:white; background: transparent; border:0px;">Home |</button>
  <form action="logout.php" method="POST">
    
    <input type="submit" id="logout" value="Sign Out" style="position:fixed; right:50px;top: 10px; color:yellow; background: transparent; border:0px;">
  </form>
  <div id= "bApp">
    <div style=" position: relative; left:15px;top:30px; padding-bottom:100px;width:440px;">
      <form style=" border: 2px solid black; width: 430px; padding:0px;">
        <legend style=" text-align: center; background-color:#403b33; color:white;">Acciones</legend>
        <div style=" padding-left:10px;">
              <label>Publicar Informacion:</label> <br><textarea cols = "30" rows = "10" maxlength="50"  style=" max-height:200px; width:400px; max-width:400px;"></textarea><br><br>
                <label>Subir Videos:</label> <br><input type="url" style=" width: 90%"></input><br><br>
                <button style="background-color:#403b33; color:white; position: relative; left: 100px; display: inline-block; height:40px; width: 100px;">Publicar</button><br><br><br>
                <label> Cambiar password:</label><br>
                <!--FALTA AGREGAR EL POP UP-->
                <br><button style="background-color:#403b33; color:white; position: relative; left: 100px; display: inline-block; height:40px; width: 100px;">Editar</button><br><br><br>
        </div>

      </form>
      <p></p>
      <!--FALTA SCROLL A LA TABLA-->
      <form style="border: 2px solid black; width: 430px; padding:0px; position: relative; top: 40px;">
          <legend style="text-align: center; vertical-align:; background-color:#403b33; color:white; ">Alumnos</legend>
          <div style="height:200px; overflow-y: scroll;">
            <table>
              <tr>
                <td>Grupo</td>
                <td>nombre</td>
                <td>Correo</td>
                <td>Acción</td>
              </tr>
            <?php
              include "dbConn.php";
              $instruccionG = "SELECT idGrupo, nombre, correo FROM joven ORDER BY idGrupo";
              $consultaG = mysqli_query ($conexion,$instruccionG) or die ("Fallo en consulta");
              while ($filaG = mysqli_fetch_array($consultaG)) {
            ?>
            <tr>
              <td><?php echo $filaG['idGrupo']; ?></td>
              <td><?php echo $filaG['nombre']; ?></td>
              <td><?php echo $filaG['correo']; ?></td>
              <td><input  type="image"src="WhatsApp-logo.png" style="position:relative; height:20px; width:40px; padding:0px;"><input  type="image"src="MailLogo.png" style="position:relative; height:20px; width:30px; padding:0px;"></td>
            </tr>
            <?php
            }
            ?>

        </table>
        </div>
    </form>
  </div>
  </div>
    <footer>
      <div style=" position:fixed; right:10px;">
          <a href="https://www.w3schools.com/tags/tag_footer.asp" id="a" style="padding-left:30px; padding-bottom: 10px;"> Numero de Contacto</a>
          <a href="https://www.w3schools.com/tags/tag_footer.asp" id="a" style="padding-right:260px; padding">| Correo</a>
            <a href="#" class="fa fa-facebook" ></a>
              <a href="#" class="fa fa-instagram" ></a>
              <a href="#" class="fa fa-twitter" ></a>
              <a href="#" class="fa fa-google">+</a>
              <img src="188.png" style=" height:78px; width:150px; padding-left:100px; padding-right:10px; bottom:0px;">
      </div>
  </footer>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          }
        });
      }
</script>

</body>
</html>

