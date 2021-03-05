<?php

$consulta_escuelas = "select escuela from inscripciones group by escuela";
$consulta_ciclos = "select ciclo_lectivo from inscripciones group by ciclo_lectivo";
$consulta_anno = "select anno from inscripciones group by anno";
$consulta_niveles = "select id,dsc from niveles";
$consulta_division = "select id,dsc from divisiones";
$consulta_turno = "select id,dsc from turnos";

$link = mysqli_connect( "localhost", "root", "")
      or die ("no se ha podido conectar");
      mysqli_select_db($link, "dw_escuela")
      or die("Error al tratar de selecccionar esta base");
    
?>
