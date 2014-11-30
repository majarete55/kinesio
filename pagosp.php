<?php
    $per=$_GET['per']; //yapara pagar
    $mes=$_GET['mes'];
    $ano=$_GET['ano'];
?>
<h3 style='margin-top="20px"'>Pagos por persona <a href="javascript:llamarasincrono('pagosp.php','contenido');"><span id='glyplus' class='glyphicon glyphicon-user'></span></a><a href="javascript:llamarasincrono('pagosmes.php', 'contenido');"><span id='glyplus' class='glyphicon glyphicon-calendar'></span></a></h3> 


<ul class="list-group">
    <?php 
        include("conexion.php");
        if(($mes!="") and ($ano!="")){
            if(per!=""){
                $buscar1=mysql_query("UPDATE MENSUALIDAD
                              SET estado=1
                              WHERE cedcli='$per' AND mes='$mes' AND ano='$ano'") or die(mysql_error());
            }
            $buscar=mysql_query("SELECT c.cedula, c.nombre FROM mensualidad as m 
                                 LEFT JOIN cliente as c
                                 on m.cedcli=c.cedula
                                 WHERE m.estado='0' AND mes='$mes' AND ano='$ano' GROUP BY c.nombre") or die(mysql_error()); 
        }
        else{
            $buscar=mysql_query("SELECT c.cedula, c.nombre FROM mensualidad as m 
                                 LEFT JOIN cliente as c
                                 on m.cedcli=c.cedula
                                 WHERE m.estado='0' GROUP BY c.nombre") or die(mysql_error()); 
        }
        $busca=mysql_fetch_array($buscar); 

        $meses[0]="ENERO";$meses[1]="FEBRERO";$meses[2]="MARZO";$meses[3]="ABRIL";$meses[4]="MAYO";$meses[5]="JUNIO";$meses[6]="JULIO";$meses[7]="AGOSTO";$meses[8]="SEPTIEMBRE";$meses[9]="OCTUBRE";$meses[10]="NOVIEMBRE";$meses[11]="DICIEMBRE";
       $auxmes=-1;
        do {        
            if($busca[0]!=""){
                if(($mes!="") and ($ano!="")){
                    echo "<li class='list-group-item'>".$busca['nombre']."<a href=javascript:llamarasincrono('pagosp.php?per=".$busca['cedula']."&mes=".$mes."&ano=".$ano."','contenido');><span id='gly' class='glyphicon glyphicon-ok'></span></a></li>";
                }else{
                    echo "<li class='list-group-item'>".$busca['nombre']."<a href=javascript:llamarasincrono('pagosmes.php?per=".$busca['cedula']."','contenido');><span id='gly' class='glyphicon glyphicon-chevron-right'></span></a></li>";
                }

            }
        }while ($busca=mysql_fetch_array($buscar));
    ?>   

</ul>