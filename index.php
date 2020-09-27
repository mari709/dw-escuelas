<?php


include 'conexion.php';

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
echo "<FORM name=f method=\"POST\" action=\"query.php\">\n";
echo "<table width=\"500\" border=0 cellspacing=0 style=\"border-collapse: collapse\">\n";
echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Tipo</td>\n";

$tipo = "CICLO";
echo "<td width=250><select name=tipo size=1>\n";
foreach ($tipos as $key => $dsc) {
 // if ($key == $tipo) {
  //  echo "<option selected value=\"$key\">$dsc</option>";
//  } else {
    echo "<option value=\"$key\">$dsc</option>";
//  }
}
echo "</select></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Escuela</td>\n";
echo "<td width=250><input type=text name=escuela  size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Ciclo lectivo</td>\n";
echo "<td width=250><input type=text name=ciclo  size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Curso</td>\n";
echo "<td width=250><input type=text name=anno  size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Nivel</td>\n";
echo "<td width=250><input type=text name=nivel   size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Division</td>\n";
echo "<td width=250><input type=text name=division  size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "<td width=150>Turno</td>\n";
echo "<td width=250><input type=text name=turno  size=20></td>\n";
echo "<td width=50> &nbsp;</td>\n";
echo "</tr>\n";

echo "<tr>\n";
echo "<td> &nbsp;</td>\n";
echo "<td></td>\n";

echo "<td><input type=submit value=\"ver\"></td>\n";

echo "<td> &nbsp;</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "</form>\n";


?>