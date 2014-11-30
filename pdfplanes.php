<?php
require_once('mpdf/mpdf.php');
include("conexion.php");

$buscar=mysql_query("SELECT nombre FROM plan") or die(mysql_error());



$mpdf = new mPDF();

$html = '
<img  src="img/kinesioch.fw.png" height="75px" width:"100px" style="margin-left:27%"> 
<h3 style="margin-left:44%; margin-top:7%">PLANES</h3>

';

while($busca = mysql_fetch_array($buscar)){
$html .= $busca[0]. '<hr>';
}



$mpdf->WriteHTML($html);

$mpdf->Output();

exit;
?>