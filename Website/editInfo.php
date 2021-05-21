<?php
//start session
session_start();
$usuario=$_SESSION['logged_in_user_name'];
$archivosSubidos=0;
if($_SERVER["REQUEST_METHOD"] == "POST")
 {

   /*Conectando a la base de datos*/
   include "dbConn.php";
   /*Guardando datos*/
   $fechaNac=$_POST["fechaNac"];
   if($fechaNac){
     $sql = "UPDATE joven SET fechaNac='".$fechaNac."' WHERE correo = '".$usuario."'";
     if ($conexion->query($sql) === FALSE) {
       $errores["texto"] = "Error al cambiar los datos";
       //echo "Error updating record: " . $conn->error;
      }
   }
   $dir=$_POST["direccion"];
   if($dir){
     $sql = "UPDATE joven SET direccion='".$dir."' WHERE correo = '".$usuario."'";
     if ($conexion->query($sql) === FALSE) {
       $errores["texto"] = "Error al cambiar los datos";
       //echo "Error updating record: " . $conn->error;
      }
   }
   $civil=$_POST["estado_Civil"];
   if($civil){
     $sql = "UPDATE joven SET estatusCivil='".$civil."' WHERE correo = '".$usuario."'";
     if ($conexion->query($sql) === FALSE) {
       $errores["texto"] = "Error al cambiar los datos";
       //echo "Error updating record: " . $conn->error;
      }
   }
   $cantH=$_POST["hijos"];
   if($cantH){
     $sql = "UPDATE joven SET cantidadHijos='".$cantH."' WHERE correo = '".$usuario."'";
     if ($conexion->query($sql) === FALSE) {
       $errores["texto"] = "Error al cambiar los datos";
       //echo "Error updating record: " . $conn->error;
      }
   }
   $nivelEscuela=$_POST["escolaridad"];
   if($nivelEscuela){
     $sql = "UPDATE joven SET nivelEscolaridad='".$nivelEscuela."' WHERE correo = '".$usuario."'";
     if ($conexion->query($sql) === FALSE) {
       $errores["texto"] = "Error al cambiar los datos";
       //echo "Error updating record: " . $conn->error;
      }
   }
   $sitLab=$_POST["situacionLaboral"];
   if($sitLab){
     $sql = "UPDATE joven SET situacionLaboral='".$sitLab."' WHERE correo = '".$usuario."'";
     if ($conexion->query($sql) === FALSE) {
       $errores["texto"] = "Error al cambiar los datos";
       //echo "Error updating record: " . $conn->error;
      }
   }
   $empresa=$_POST["empresa"];
   if($empresa){
     $sql = "UPDATE joven SET empresa ='".$empresa."' WHERE correo = '".$usuario."'";
     if ($conexion->query($sql) === FALSE) {
       $errores["texto"] = "Error al cambiar los datos";
       //echo "Error updating record: " . $conn->error;
      }
   }
   //Get id de joven
   $instruccion = "SELECT idJoven FROM joven WHERE correo = '".$usuario."'";
   $resultado = mysqli_query ($conexion,$instruccion) or die ("Fallo en consulta");
   $res = mysqli_fetch_assoc($resultado);
   $id=$res['idJoven'];
   //acta
   if ($_FILES['acta']['name']!=""){
   $filename = $_FILES['acta']['name'];
   $path='uploads/'.$usuario.'/';
    if (!is_dir($path)) {//crear folder
      mkdir($path, 0777, true);
    }
      // destination of the file on the server
      $destination = 'uploads/'.$usuario.'/' . $filename;
      // get the file extension
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      $file = $_FILES['acta']['tmp_name'];
      $size = $_FILES['acta']['size'];
      if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
          $errores["arch"] = "El archivo debe ser .zip, .pdf o .docx";
      } elseif ($_FILES['acta']['size'] > 40000000) { // file shouldn't be larger than 40Megabyte
          $errores["size"] = "El archivo es muy grande";
      } else {
          // move the uploaded (temporary) file to the specified destination
          if (move_uploaded_file($file, $destination)) {
              $sql = "INSERT INTO actanac (nameActa, idJoven) VALUES ('$filename', '$id')";
              if (mysqli_query($conexion, $sql)) {
                $archivosSubidos+=1;
              }
          } else {
              $errores["upload"] = "El archivo no se ha podido subir";
          }
      }
    }
    if($_FILES['comprobante']['name']!=""){
      //comprobante
      $filename = $_FILES['comprobante']['name'];
      $path='uploads/'.$usuario.'/';
       if (!is_dir($path)) {//crear folder
         mkdir($path, 0777, true);
       }
         // destination of the file on the server
         $destination = 'uploads/'.$usuario.'/' . $filename;
         // get the file extension
         $extension = pathinfo($filename, PATHINFO_EXTENSION);
         $file = $_FILES['comprobante']['tmp_name'];
         $size = $_FILES['comprobante']['size'];
         if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
             $errores["arch"] = "El archivo debe ser .zip, .pdf o .docx";
         } elseif ($_FILES['comprobante']['size'] > 40000000) { // file shouldn't be larger than 40Megabyte
             $errores["size"] = "El archivo es muy grande";
         } else {
             // move the uploaded (temporary) file to the specified destination
             if (move_uploaded_file($file, $destination)) {
                 $sql = "INSERT INTO comprobanteestudios (nameCom, idJoven) VALUES ('$filename', '$id')";
                 if (mysqli_query($conexion, $sql)) {
                     $archivosSubidos+=1;
                 }
             } else {
                 $errores["upload"] = "El archivo no se ha podido subir";
             }
         }
    }
    if($_FILES['curp']['name']!=""){
      //curp
      $filename = $_FILES['curp']['name'];
      $path='uploads/'.$usuario.'/';
       if (!is_dir($path)) {//crear folder
         mkdir($path, 0777, true);
       }
         // destination of the file on the server
         $destination = 'uploads/'.$usuario.'/' . $filename;
         // get the file extension
         $extension = pathinfo($filename, PATHINFO_EXTENSION);
         $file = $_FILES['curp']['tmp_name'];
         $size = $_FILES['curp']['size'];
         if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
            $errores["arch"] = "El archivo debe ser .zip, .pdf o .docx";
         } elseif ($_FILES['curp']['size'] > 40000000) { // file shouldn't be larger than 40Megabyte
             $errores["size"] = "El archivo es muy grande";
         } else {
             // move the uploaded (temporary) file to the specified destination
             if (move_uploaded_file($file, $destination)) {
                 $sql = "INSERT INTO curpfile (nameCurp, idJoven) VALUES ('$filename', '$id')";
                 if (mysqli_query($conexion, $sql)) {
                     $archivosSubidos+=1;
                 }
             } else {
                 $errores["upload"] = "El archivo no se ha podido subir";
             }
         }
    }
    if(!isset($errores)){
        $success["upload"]="Los datos se han cambiado satisfactoriamente";
        if($archivosSubidos>0){$success["upArch"]="Se han subido ".$archivosSubidos." archivos.";}
    }
    header("Location: Estudiante.php");
 }
?>
