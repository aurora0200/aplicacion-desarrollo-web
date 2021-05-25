<?php
// Original PHP code by Chirp Internet: www.chirpinternet.eu
function cleanData(&$str)
  {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

include 'dbConn.php';
/*$instruccionG = "SELECT idGrupo, nombre, correo , telefono, situacionLaboral, empresa FROM joven ORDER BY idGrupo";
$consultaG = mysqli_query ($conexion,$instruccionG) or die ("Fallo en consulta");
$nfilas= mysqli_num_rows ($consultaG);
$data = array();
while ($filaG = mysqli_fetch_array($consultaG)) {//Arreglar datos en array
  $var = array('Grupo' => $filaG['idGrupo'], 'Nombre'=>$filaG['nombre'], 'Correo'=>$filaG['correo'], 'Telefono'=>$filaG['telefono'], 'Situacion Laboral'=>$filaG['situacionLaboral'], 'Empresa'=>$filaG['empresa']);
  array_push($data, $var);
}*/
// filename for download
  $filename = "EmpleabilidadJuvenil_" . date("m-d-y") . ".xls";
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
  $flag = false;
  $instruccion = "SELECT idGrupo, nombre, correo , telefono, situacionLaboral, empresa FROM joven ORDER BY idGrupo";
  $result = mysqli_query ($conexion,$instruccion) or die ("Fallo en consulta");
  while(($row = mysqli_fetch_assoc($result))) {
    if(!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, __NAMESPACE__ . '\cleanData');
    echo implode("\t", array_values($row)) . "\r\n";

  }
  exit;


?>
