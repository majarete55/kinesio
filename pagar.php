<?php  $mes=$_GET['mes']; 
       $ano=$_GET['ano'];
       $id=$_GET['id'];

$meses[0]="ENERO";
$meses[1]="FEBRERO";
$meses[2]="MARZO";
$meses[3]="ABRIL";
$meses[4]="MAYO";
$meses[5]="JUNIO";
$meses[6]="JULIO";
$meses[7]="AGOSTO";
$meses[8]="SEPTIEMBRE";
$meses[9]="OCTUBRE";
$meses[10]="NOVIEMBRE";
$meses[11]="DICIEMBRE";
?>
<h3 style='margin-top="20px"'>Pagos <?php echo " ".$meses[$mes-1]." ".$ano?> <a><span id='glyplus' class='glyphicon glyphicon-user'></span></a><a><span id='glyplus' class='glyphicon glyphicon-calendar'></span></a></h3> 


<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            include("conexion.php");
           $buscar=mysql_query("UPDATE MENSUALIDAD
                              SET estado=1
                              WHERE id='$id'") or die(mysql_error());
            
        // echo "Pago realizado correctamente "."<a href=javascript:llamarasincrono('pagosdet.php?mes=".$mes."&ano=".$ano."','contenido');>Volver</a> ";

$valor="llamarasincrono('pagosdet.php?mes=".$mes."&ano=".$ano."','contenido');";

header("Location: javascript:llamarasincrono('pagosdet.php?mes=".$mes."&ano=".$ano."','contenido');");
   
        
        ?>   
<script>$( document ).ready(function() {
    alert("loool");
});</script>
    </ul>
    
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>