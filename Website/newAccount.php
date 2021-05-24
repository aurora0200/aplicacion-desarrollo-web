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
  <?php
  	if($_SERVER["REQUEST_METHOD"] == "POST")
     {

        if(strlen(trim($_POST["pass"]))<7 )
        $errores["pas"] = "La contraseña debería tener al menos 8 caracteres";


   		if(!isset($errores)) //No hay errores
  		{
        include 'cuenta.php';
  		}
     }
  ?>
  <img src="Udemlogo.png" style="position: relative; top:0px; left:0px; height:100px; width:200px;">
  <div id= "bImage">

  </div>
    <form name ="myform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data" onsubmit="myFunction()" >
      <div>

          <p style="position: relative;left:10px;">Tipo Cuenta</p>
          <select name="cuenta" style="position: relative;left:30px;" required>
            <option>joven</option>

          </select>
          <p style="position: relative;left:10px;">Nombre:</p>
          <input style="position: relative;left:30px;" name = "name"required></input>
          <p style="position: relative;left:10px;">Telefono:</p>
          <input type="tel" id="phone" name="tel" placeholder="12-3456-6789" pattern="[0-9]{2}[0-9]{4}[0-9]{4}" required>
          <p style="position: relative;left:10px;">Correo:</p>
          <input style="position: relative;left:30px;" name = "correo" required></input>
          <p style="position: relative;left:10px;">Grupo:</p>
          <input style="position: relative;left:30px;" name = "grupo" required></input>
          <font color="red"> <?php echo @$errores["grupo"]?></font> <br>
          <p style="position: relative;left:10px;">Contraseña:</p>
          <input type="password" id="pass" name="pass" style="position: relative; " required></input>
          <font color="red"> <?php echo @$errores["pas"]?></font> <br>
          <br>
          <div style="position:absolute; right:200px; top:10px;">
          <input type="submit" id="crear" value="Continuar" style="position:relative; left:180px; width:150px;height:50px; background:#403b33; color:#faf22e; ">
          <a href="Administrador.php" style="position: relative; right:90px; top:10px;">Regresar</a></div>
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
