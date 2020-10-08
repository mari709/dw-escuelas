<?php
// version Mansueto - otero corregida
// consulta para consultar id escuela:
// SELECT escuela  FROM `inscripciones` group by escuela
include 'conexion.php';

$nivel ="";
$escuela ="";
$ciclo ="";
$anno ="";
$division = "";
$turno = "";
$consulta_escuelas = " select escuela  FROM `inscripciones` group by escuela";



if (isset($_POST["tipo"])){$tipo = $_POST["tipo"];};   
if (isset( $_POST["escuela"])){$escuela = $_POST["escuela"];};
if (isset($_POST["ciclo"])){$ciclo = $_POST["ciclo"];};
if (isset($_POST["anno"])){$anno = $_POST["anno"];};
if (isset($_POST["nivel"])){$nivel = $_POST["nivel"];};
if (isset($_POST["division"])){$division = $_POST["division"];};
if (isset($_POST["turno"])){$turno = $_POST["turno"];};

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

//$tipo = "CICLO";
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

echo "<td width=250><select name =escuela size=1 onchange=this.form.submit()>";

 echo '<option value = "">'.$escuela.'</option>';

$consulta_escuela_dos = mysqli_query($link,$consulta_escuelas);
while($row_dos = mysqli_fetch_array($consulta_escuela_dos)){

  if($row_dos["escuela"] !== $escuela){
  echo '<option value = "'.$row_dos[escuela].'">'.$row_dos[escuela].'</option>';

  }
}
?>
</select>
</td>
<?php
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Ciclo lectivo</td>\n";
echo "<td width=250><input type=text name=ciclo value=\"$ciclo\" size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Curso</td>\n";
echo "<td width=250><input type=text name=anno value=\"$anno\" size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Nivel</td>\n";
echo "<td width=250><input type=text name=nivel  value=\"$nivel\"   size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Division</td>\n";
echo "<td width=250><input type=text name=division value=\"$division\" size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Turno</td>\n";
echo "<td width=250><input type=text name=turno value=\"$turno\"  size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td> &nbsp;</td>\n";
echo "<td></td>\n";

//echo "<td><input type=submit value=\"ver\"></td>\n";

echo "<td> &nbsp;</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";
?>
<form action="index.php" method="post">
  
 <input type=submit value="Reset" /></p>
 
  </form>
<?php

if(isset($tipo)){

  include 'query.php';
}



?>