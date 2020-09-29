
<?php

$sql_truncate = "truncate table intervalos";
$sql_truncate_query = mysqli_query($link,$sql_truncate);

$sql_new = "select count(*) as cuenta from`xy`";
$sql_par = mysqli_query($link,$sql_new);
$row2 = mysqli_fetch_array($sql_par);
$valor = $row2['cuenta'];
$array_claves = array();
$array_claves[0]=1;
$array_valor = array();
$intervalo = $valor - 1;
echo " registros  ";
echo $valor;
echo "<br>";

for ($i = 1; $i <= $intervalo; $i++) {
$f = $i+1;
$sql_new2 = "select x,y from xy where id_coordenada = '".$i."'";
$sql_new4 = "select x,y from xy where id_coordenada = '".$f."'";
$sql_new_exec= mysqli_query($link,$sql_new2);
$sql_new_exec3= mysqli_query($link,$sql_new2);
$sql_new_exec4= mysqli_query($link,$sql_new4);
$sql_new_exec5= mysqli_query($link,$sql_new4);
$row_new2 = mysqli_fetch_array($sql_new_exec);
$row_new3 = mysqli_fetch_array($sql_new_exec3);
$row_new4 = mysqli_fetch_array($sql_new_exec4);
$row_new5 = mysqli_fetch_array($sql_new_exec5);
$valora = $row_new2['x'];
$valorb = $row_new3['y'];
$valord = $row_new4['x'];
$valorc = $row_new5['y'];
$amplitud = $valorc- $valorb;
$insert_interval = "insert into  `dw_escuela`.`intervalos` (`clave_a`, `clave_b`,`amplitud`) values ('".$valora."','".$valord."','".$amplitud."')";
$sql_insercion = mysqli_query($link,$insert_interval);

}

for($d=1;$d <=$intervalo; $d++ ){

$sql_consulta_am = "select clave_b,amplitud FROM `intervalos` where id_intervalo = '".$d."'";
$sql_consulta_amp= mysqli_query($link,$sql_consulta_am);
$row_respuesta = mysqli_fetch_array($sql_consulta_amp);
$valor_respuesta_a = $row_respuesta['amplitud'];
$valor_respuesta_b = $row_respuesta['clave_b'];
$array_valor[$d] = $valor_respuesta_a ;
$array_claves[$d] = $valor_respuesta_b ;

    
}

$mayor_valor = 0;
$id_mayor_valor= 0;

foreach($array_valor as $clave => $resultado)
{
    if($resultado > $mayor_valor){
        $mayor_valor = $resultado;
        $id_mayor_valor = $clave;
    }

}
echo "<br>";
echo "Mayor diferencia positiva de inscriptos :";
echo $mayor_valor;
echo "<br>";
echo "Indicador :";
echo $array_claves[$id_mayor_valor];
echo "<br>";



?>