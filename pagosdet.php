<?php  $mes=$_GET['mes']; 
       $ano=$_GET['ano'];
       $id=$_GET['id'];
       $aux=$_GET['aux'];

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
<h3 style='margin-top="20px"'>Pagos <?php if($aux==""){ echo " ".$meses[$mes-1]." ".$ano; }?> <a><span id='glyplus' class='glyphicon glyphicon-user'></span></a><a><span id='glyplus' class='glyphicon glyphicon-calendar'></span></a></h3> 


<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            include("conexion.php");
            if($id!=""){
                 $buscar1=mysql_query("UPDATE MENSUALIDAD
                              SET estado=1
                              WHERE id='$id'") or die(mysql_error());}
            
            if($aux!=""){
                     $buscar=mysql_query("SELECT * FROM mensualidad as m 
                                         LEFT JOIN cliente as c
                                         on m.cedcli=c.cedula
                                         WHERE m.estado='0'") or die(mysql_error());
                    $busca=mysql_fetch_array($buscar); 
            }
            else{
            $buscar=mysql_query("SELECT * FROM mensualidad as m 
                                 LEFT JOIN cliente as c
                                 on m.cedcli=c.cedula
                                 WHERE m.estado='0' and m.mes='$mes' and m.ano='$ano'") or die(mysql_error());
            $busca=mysql_fetch_array($buscar); 
            }
            do {        
                if($busca[0]!=""){
                    
                    if(aux!=""){
                    echo "<li class='list-group-item'>".$busca['nombre']." ".$meses[$busca['mes']-1]." ".$busca['ano']."<a href=javascript:llamarasincrono('pagosdet.php?mes=".$busca['mes']."&ano=".$busca['ano']."&id=".$busca['id']."&aux=1','contenido');><span id='gly' class='glyphicon glyphicon-send'></span></a></li>";
                    
                    }
                    else{
                    echo "<li class='list-group-item'>".$busca['nombre']."<a href=javascript:llamarasincrono('pagosdet.php?mes=".$busca['mes']."&ano=".$busca['ano']."&id=".$busca['id']."','contenido');><span id='gly' class='glyphicon glyphicon-send'></span></a></li>";
                    }
                   
                }
            }while ($busca=mysql_fetch_array($buscar));
        ?>   

    </ul>
    
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>