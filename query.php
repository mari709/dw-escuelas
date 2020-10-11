<?php


include 'conexion.php';


   $coordY_tabla = 0;
   $tipos = array( "ESCUELA" => "Por escuela",
   "NIVEL" => "Por nivel",
   "ANNO" => "Por curso",
   "DIVISION" => "Por division",
   "CICLO" => "Por ciclo lectivo",
   "TURNO" => "Por turno");

   if ($tipo == "ESCUELA") {
    $sql = "SELECT escuela as x, sum(cant_alumnos) as y";
    $agrupar = "GROUP BY escuela;";
  } else
  if ($tipo == "NIVEL") {
    $sql = "SELECT nivel as x, sum(cant_alumnos) as y";
    $agrupar = "GROUP BY nivel;";
  } else
  if ($tipo == "ANNO") {
    $sql = "SELECT anno as x, sum(cant_alumnos) as y";
    $agrupar = "GROUP BY anno;";
  } else
  if ($tipo == "DIVISION") {
    $sql = "SELECT division as x, sum(cant_alumnos) as y";
    $agrupar = "GROUP BY division;";
  } else
  if ($tipo == "CICLO") {
    $sql = "SELECT ciclo_lectivo as x, sum(cant_alumnos) as y";
    $agrupar = "GROUP BY ciclo_lectivo;";
  } else {
    $sql = "SELECT turno as x, sum(cant_alumnos) as y";
    $agrupar = "GROUP BY turno;";
  }
  $sql .= " FROM inscripciones";

  

  $filtro = "";
  if ($escuela) {
    if ($filtro != "") {
      $filtro .= " and ";
    }
    $filtro .= "(escuela = '$escuela')";
  }
  if ($ciclo) {
    if ($filtro != "") {
      $filtro .= " and ";
    }
    $filtro .= "(ciclo_lectivo = '$ciclo')";
  }
  if ($anno) {
    if ($filtro != "") {
      $filtro .= " and ";
    }
    $filtro .= "(anno = '$anno')";
  }
  if ($nivel) {
    if ($filtro != "") {
      $filtro .= " and ";
    }
    $filtro .= "(nivel = '$nivel')";
  }
  if ($division) {
    if ($filtro != "") {
      $filtro .= " and ";
    }
    $filtro .= "(division = '$division')";
  }
  if ($nivel) {
    if ($filtro != "") {
      $filtro .= " and ";
    }
    $filtro .= "(nivel = '$nivel')";
  }
  if ($filtro) {
    $sql .= " WHERE $filtro";
  }
  $sql .= " $agrupar";

echo $sql;

  $sql_consulta = mysqli_query($link,$sql);
  $datos = array();
  $sql_borrado = mysqli_query($link, "TRUNCATE TABLE xy");

  if ($sql_consulta) {
    while ($row = mysqli_fetch_array($sql_consulta)) {

      $datos[$row["x"]] = $row["y"]; 
      $sql_elinsert ="insert into  `dw_escuela`.`xy` (`x`, `y`) values ('".$row["x"]."','".$row["y"]."')";
      $sql_resultado = mysqli_query($link,$sql_elinsert);
   
    }
    
   mysqli_free_result($sql_consulta);
    
  }

include 'intervals.php';


foreach($datos as $coordX => $coordY){

  if($indicador == $coordX)
  {$coordY_tabla = $coordY; }
  
}

   echo "<br>";
   echo "<table border=1 cellspacing=0 style=\"border-collapse: collapse\">\n";
   echo "<tr>\n";
     echo "<td width=50 height=20></td>\n";
   foreach($datos as $key => $value) {

     $alto = round($value/100);
     if ($value == $coordY_tabla){

      echo "<td width=30 align=center valign=bottom><img src=\"rojo.jpg\" width=20 height=$alto border=0> </td>\n";
     }
     else{
      echo "<td width=30 align=center valign=bottom><img src=\"x.jpg\" width=20 height=$alto border=0> </td>\n";
     }
    
   }
   echo "</tr>\n";
   echo "<tr>\n";
   
   echo "<td width=30>".substr($tipos[$tipo],4,100)."</td>\n";
   foreach($datos as $key => $value) {
     echo "<td width=30> $key</td>\n";
   }
   
   echo "</tr>\n";
   echo "<tr>\n";
     echo "<td width=30> valor</td>\n";
   foreach($datos as $key => $value) {
     echo "<td width=30> $value</td>\n";
   }
   echo "</tr>\n";
   echo "</table>\n";
   echo "<br>"; 
  
?>

  


