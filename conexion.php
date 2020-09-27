
<?php

$link = mysqli_connect( "localhost", "root", "")
      or die ("no se ha podido conectar");
      mysqli_select_db($link, "dw_escuela")
      or die("Error al tratar de selecccionar esta base");
    
?>
