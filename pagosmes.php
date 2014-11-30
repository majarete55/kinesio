<?php
    $per=$_GET['per'];
    $mes=$_GET['mes'];
    $ano=$_GET['ano'];
?>
<h3 style='margin-top="20px"'>Pagos por Mes<a href="javascript:llamarasincrono('pagosp.php','contenido');"><span id='glyplus' class='glyphicon glyphicon-user'></span></a><a href="javascript:llamarasincrono('pagosmes.php', 'contenido');"><span id='glyplus' class='glyphicon glyphicon-calendar'></span></a></h3> 


<ul class="list-group">
    <?php 
        include("conexion.php");
        if($per!=""){
            if(($mes!="") and ($ano!="")){
                $buscar1=mysql_query("UPDATE MENSUALIDAD
                              SET estado=1
                              WHERE cedcli='$per' AND mes='$mes' AND ano='$ano'") or die(mysql_error());
            }
            $buscar=mysql_query("SELECT * FROM mensualidad WHERE estado='0'AND cedcli='".$per."' GROUP BY mes, ano ORDER BY mes, ano") or die(mysql_error());  
            $busca=mysql_fetch_array($buscar);
        }
        else{
            $buscar=mysql_query("SELECT * FROM mensualidad WHERE estado='0' GROUP BY mes, ano ORDER BY mes, ano") or die(mysql_error());  
            $busca=mysql_fetch_array($buscar); 
        }
        
        $meses[0]="ENERO";$meses[1]="FEBRERO";$meses[2]="MARZO";$meses[3]="ABRIL";$meses[4]="MAYO";$meses[5]="JUNIO";$meses[6]="JULIO";$meses[7]="AGOSTO";$meses[8]="SEPTIEMBRE";$meses[9]="OCTUBRE";$meses[10]="NOVIEMBRE";$meses[11]="DICIEMBRE";
       $auxmes=-1;
        do {        
            if($busca[0]!=""){
                
                if($auxmes!=$meses[$busca['mes']-1]){
                    if($per!=""){
                        echo "<li class='list-group-item'>".$meses[$busca['mes']-1]." ".$busca['ano']."<a href=javascript:llamarasincrono('pagosmes.php?mes=".$busca['mes']."&ano=".$busca['ano']."&per=".$per."','contenido');><span id='gly' class='glyphicon glyphicon-ok'></span></a></li>"; $auxmes=$meses[$busca['mes']-1];
                    }else{
                        echo "<li class='list-group-item'>".$meses[$busca['mes']-1]." ".$busca['ano']."<a href=javascript:llamarasincrono('pagosp.php?mes=".$busca['mes']."&ano=".$busca['ano']."','contenido');><span id='gly' class='glyphicon glyphicon-chevron-right'></span></a></li>"; $auxmes=$meses[$busca['mes']-1];
                    }
                    
                }
            }
        }while ($busca=mysql_fetch_array($buscar));
    ?>   

</ul>