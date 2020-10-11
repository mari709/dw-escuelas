<?php
// arreglos para escuela-ciclo lectivo - curso

$escuela_array = array();
$contador = '0';

$sql_q = mysqli_query($link,$consulta_escuelas);

  while ($row_rd = mysqli_fetch_array($sql_q)) {

    $contador++;
    $escuela_array[$contador] = $row_rd["escuela"];
 
  }

  /*
  echo "<br>";
  //echo $contador;
//-------------------
  foreach($escuela_array as $clave => $resultado)
  {

    echo $resultado;
    echo "<br>";
  }
 // ----------------
  
 */
  






    

   
 


?>