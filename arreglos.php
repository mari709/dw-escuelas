<?php
// arreglos para escuela-ciclo lectivo - curso

$escuela_array = array();
$ciclo_array = array();
$curso_array = array();

$contador = '0';
$contadorb = '0';
$contadorc ='0';

$sql_q = mysqli_query($link,$consulta_escuelas);

  while ($row_rd = mysqli_fetch_array($sql_q)) {

    $contador++;
    $escuela_array[$contador] = $row_rd["escuela"];
 
  }
  $sql_r = mysqli_query($link,$consulta_ciclos);

  while ($row_rf = mysqli_fetch_array($sql_r)) {

    $contadorb++;
    $ciclo_array[$contadorb] = $row_rf["ciclo_lectivo"];
 
  }
  $sql_s = mysqli_query($link,$consulta_anno);

  while ($row_ri = mysqli_fetch_array($sql_s)) {

    $contadorc++;
    $curso_array[$contadorc] = $row_ri["anno"];
 
  }

foreach($ciclo_array as $dato => $resultado){

    echo $resultado;
    echo "<br>";
}


  

?>