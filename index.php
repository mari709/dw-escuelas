<?php
// version Mansueto - otero corregida

include 'conexion.php';
include 'arreglos.php';

echo "<br>";

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

echo "<HTML>\n";
echo "<Head>\n";
echo "</Head>\n";
echo "<Body>\n";
echo "<br>";

echo "<FORM name=f method=\"POST\" action=\"index.php\">\n";
echo "<table width=\"500\" border=0 cellspacing=0 style=\"border-collapse: collapse\">\n";
echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Tipo</td>\n";
echo "<td width=250><select name=tipo size=1  onchange=this.form.submit()  >\n";
foreach ($tipos as $key => $dsc) {
if ($key == $tipo) {
echo "<option selected value=\"$key\">$dsc</option>";
 } else {
    echo "<option value=\"$key\">$dsc</option>";
  }
}
echo "</select></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Escuela</td>\n";
echo "<td width=250><select name =escuela size=1 onchange=this.form.submit()>\n";
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
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Ciclo lectivo</td>\n";
echo "<td width=250> <select name =ciclo size=1 onchange=this.form.submit()>\n";
echo "<option value= ''> </option>";

/*
foreach($ciclo_array as $claveb => $datob){

  if ($datob == $ciclo) {
    echo "<option selected value=\"$claveb\">$datob</option>";
      } 
     else
      {
        echo "<option value=\"$claveb\">$datob</option>";
      }
    }
  
*/


//---

echo '<option value = "">'.$ciclo.'</option>';

$consulta_ciclo_dos = mysqli_query($link,$consulta_ciclos);
while($row_tres = mysqli_fetch_array($consulta_ciclo_dos)){

  if($row_tres["ciclo_lectivo"] !== $ciclo){
  echo '<option value = "'.$row_tres['ciclo_lectivo'].'">'.$row_tres[ciclo_lectivo].'</option>';
 }
}

//--
echo "</select>";
echo "</td>";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Curso</td>\n";//name

echo "<td width=250> <select name =anno size=1 onchange=this.form.submit()>\n";
echo '<option value = "">'.$anno.'</option>';

$consulta_anno_dos = mysqli_query($link,$consulta_anno);
while($row_cuatro = mysqli_fetch_array($consulta_anno_dos)){

  if($row_cuatro["anno"] !== $anno){
  echo '<option value = "'.$row_cuatro['anno'].'">'.$row_cuatro[anno].'</option>';
  }
}

echo "</select>";

echo "</td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";

echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Nivel</td>\n";
echo "<td width=250> <select name =nivel size=1 onchange=this.form.submit()>\n";

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
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Division</td>\n";


echo "<td width=250> <select name =division size=1 onchange=this.form.submit()>\n";

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
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Turno</td>\n";

echo "<td width=250> <select name =turno size=1 onchange=this.form.submit()>\n";

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
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td> &nbsp;</td>\n";
echo "<td></td>\n";

//echo "<td><input type=submit value=\"ver\"></td>\n";

echo "<td> &nbsp;</td>\n";
echo "</tr>\n";
echo "</table>\n";

//echo " <input type=submit value='index.php' /></p>";

echo "</form>\n";

?>

<form action="index.php" method="post">
  
 <input type=submit value="Reset" /></p>
 
  </form>
<?php

if(isset($tipo)){

  include 'query.php';
  echo "<br>";
  
}



?>