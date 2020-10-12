<?php
// version Mansueto - otero corregida

// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include 'conexion.php';
include 'arreglos.php';

if(isset($_POST["ciclo"])){$ciclo = $_POST["ciclo"];}; //<-----$ciclo_lectivo
if (isset($_POST["escuela"])){$escuela = $_POST["escuela"];};  //<----- $escuela
if (isset($_POST["tipo"])){$tipo = $_POST["tipo"];};
if (isset($_POST["anno"])){$anno = $_POST["anno"];}; //<---$curso
if (isset($_POST["nivel"])){$nivel = $_POST["nivel"];};//<---$nivel
if (isset($_POST["division"])){$division = $_POST["division"];};//<---$division
if (isset($_POST["turno"])){$turno = $_POST["turno"];};//<---$turno

$tipos = array( "ESCUELA" => "Por escuela",
"NIVEL" => "Por nivel",
"ANNO" => "Por curso",
"DIVISION" => "Por division",
"CICLO" => "Por ciclo lectivo",
"TURNO" => "Por turno");
?>

<!doctype html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
  <div class="container">
    <div class="container-fluid bg-contenedor rounded p-3 mt-3">
  <h2><strong>Realizar consulta</strong></h2>

    <FORM class="pl-2" name="f" method="POST" action="index.php"> 
      <br>
      <table>
    <tr>
    <td>Tipo</td>

<?php


echo "<td><select class=\"form-control form-control-sm\" name=tipo size=1  onchange=this.form.submit()  >\n";
echo "<option value= ''> </option>";

foreach ($tipos as $key => $dsc) {
if ($key == $tipo) {
echo "<option selected value=\"$key\">$dsc</option>";
 } else {
    echo "<option value=\"$key\">$dsc</option>";
  }
}
echo "</select></td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=150>Escuela</td>\n";
echo "<td width=250><select class=\"form-control form-control-sm\" name =escuela size=1 onchange=this.form.submit()>\n";
echo "<option value= ''> </option>";
foreach($escuela_array as $clave => $dato){

  if ($dato == $escuela) {
    echo "<option selected value=\"$clave\">$dato</option>";
      } 
     else
      {
        echo "<option value=\"$clave\">$dato</option>";
      }
    }
 
echo "</select>";
echo "</td>";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=150>Ciclo lectivo</td>\n";
echo "<td width=250> <select class=\"form-control form-control-sm\" name =ciclo size=1 onchange=this.form.submit()>\n";
echo "<option value= ''> </option>";

foreach($ciclo_array as $claved => $datod){

  if ($datod == $ciclo) {
    echo "<option selected value=\"$datod\">$datod</option>";
      } 
     else
      {
        echo "<option value=\"$datod\">$datod</option>";
      }
    }

echo "</select>";
echo "</td>";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=150>Curso</td>\n";

echo "<td width=250> <select class=\"form-control form-control-sm\" name =anno size=1 onchange=this.form.submit()>\n";

echo "<option value= ''> </option>";

foreach($curso_array as $clavee => $datoe){

  if ($datoe == $anno) {
    echo "<option selected value=\"$datoe\">$datoe</option>";
      } 
     else
      {
        echo "<option value=\"$datoe\">$datoe</option>";
      }
    }


echo "</select>";

echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";

echo "<td width=150>Nivel</td>\n";
echo "<td width=250> <select class=\"form-control form-control-sm\" name =nivel size=1 onchange=this.form.submit()>\n";

$consulta_id_nivel = "select id,dsc from niveles where id = '$nivel'";

$sql_consulta_id_exec = mysqli_query($link,$consulta_id_nivel);
$sql_consulta_id_fa = mysqli_fetch_array($sql_consulta_id_exec) ;
$sql_consulta_dsc = $sql_consulta_id_fa['dsc'];

echo '<option value = "'.$nivel.'">'.$sql_consulta_dsc.'</option>';

$consulta_niveles_dos = mysqli_query($link,$consulta_niveles);
while($row_cinco = mysqli_fetch_array($consulta_niveles_dos)){

  if($row_cinco["id"] !== $nivel){
  echo '<option value = "'.$row_cinco['id'].'">'.$row_cinco[dsc].'</option>';
  }
}

echo "</select>";
echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=150>Division</td>\n";


echo "<td width=250> <select class=\"form-control form-control-sm\" name =division size=1 onchange=this.form.submit()>\n";

$consulta_id_division = "select id,dsc from divisiones where id = '$division'";

$sql_consulta_id_exec_dos = mysqli_query($link,$consulta_id_division);
$sql_consulta_id_fb = mysqli_fetch_array($sql_consulta_id_exec_dos) ;
$sql_consulta_dsc_b = $sql_consulta_id_fb['dsc'];

echo '<option value = "'.$division.'">'.$sql_consulta_dsc_b.'</option>';

$consulta_division_dos = mysqli_query($link,$consulta_division);
while($row_seis = mysqli_fetch_array($consulta_division_dos)){

  if($row_seis["id"] !== $division){
  echo '<option value = "'.$row_seis['id'].'">'.$row_seis[dsc].'</option>';
  }
}

echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=150>Turno</td>\n";

echo "<td width=250> <select class=\"form-control form-control-sm\" name =turno size=1 onchange=this.form.submit()>\n";

$consulta_id_turno = "select id,dsc from turnos where id = '$turno'";

$sql_consulta_id_turno = mysqli_query($link,$consulta_id_turno);
$sql_consulta_id_fc = mysqli_fetch_array($sql_consulta_id_turno) ;
$sql_consulta_dsc_turno = $sql_consulta_id_fc['dsc'];

echo '<option value = "'.$turno.'">'.$sql_consulta_dsc_turno.'</option>';

$consulta_turno_dos = mysqli_query($link,$consulta_turno);
while($row_siete = mysqli_fetch_array($consulta_turno_dos)){

  if($row_siete["id"] !== $turno){
  echo '<option value = "'.$row_siete['id'].'">'.$row_siete[dsc].'</option>';
  }
}


echo "</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td> &nbsp;</td>\n";

//echo "<td><input type=submit value=\"ver\"></td>\n";

echo "<td> &nbsp;</td>\n";
echo "</tr>\n";
echo "</table>\n";

//echo " <input type=submit value='index.php' /></p>";

echo "</form>\n";

?>

<form class="pl-2" action="index.php" method="post">
      <input type=submit value="Reset" class="btn btn-warning" />
  </form>
</div>
</div>
<div class="container pt-3">
<div class="container-fluid">
<?php

if(isset($tipo)){

  include 'query.php';
  echo "<br>";
  
}



?>
</div>
</div>
</body>