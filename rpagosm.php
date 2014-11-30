<?php
    
    $mes=$_GET['mes'];
    $ano=$_GET['ano'];
    
    if($mes==""){
        echo "<a href=javascript:buscaplan();><span id='glysearch' class='glyphicon glyphicon-search'></span></a><input id='buscaplan' style='float: right; height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='buscaplan' size='10' maxlength='30'><br>";
    }
?>

<h3 style='margin-top="20px"'>Pagos por Mes<a href="javascript:llamarasincrono('rpagosp.php','contenido');"><span id='glyplus' class='glyphicon glyphicon-user'></span></a><a href="javascript:llamarasincrono('rpagosm.php','contenido');"><span id='glyplus' class='glyphicon glyphicon-calendar'></span></a></h3> 


<ul class="list-group">
    <?php 
        include("conexion.php");
        if($mes!=""){
            $buscar=mysql_query("SELECT c.cedula, c.nombre, m.monto FROM mensualidad as m 
                                 LEFT JOIN cliente as c
                                 on m.cedcli=c.cedula
                                 WHERE m.estado='0' AND mes='$mes' AND ano='$ano' GROUP BY c.nombre") or die(mysql_error());  
            $busca=mysql_fetch_array($buscar); 
        }else{
            
            $buscar=mysql_query("SELECT * FROM mensualidad WHERE estado='0' GROUP BY mes, ano ORDER BY mes, ano") or die(mysql_error());  
            $busca=mysql_fetch_array($buscar); 
        }
        
        
        $meses[0]="ENERO";$meses[1]="FEBRERO";$meses[2]="MARZO";$meses[3]="ABRIL";$meses[4]="MAYO";$meses[5]="JUNIO";$meses[6]="JULIO";$meses[7]="AGOSTO";$meses[8]="SEPTIEMBRE";$meses[9]="OCTUBRE";$meses[10]="NOVIEMBRE";$meses[11]="DICIEMBRE";
       
               
        if($busca[0]!=""){
            if($mes==""){
                do { 
                    echo "<li class='list-group-item'>".$meses[$busca['mes']-1]." ".$busca['ano']."<a href=javascript:llamarasincrono('rpagosm.php?mes=".$busca['mes']."&ano=".$busca['ano']."','contenido');><span id='gly' class='glyphicon glyphicon-chevron-right'></span></a></li>"; 
                }while ($busca=mysql_fetch_array($buscar));
            }else{

                echo "<table class='table'> <tbody>";
                echo "<tr><td>Cedula Afiliado</td><td>Nombre Afiliado</td><td>Monto</td></tr>";
                do {        
                    if($busca[0]!=""){
                        echo "<tr><td>".$busca['cedula']."</td><td>".$busca['nombre']."</td><td>".$busca['monto']."</td></tr>";
                    }
                }while ($busca=mysql_fetch_array($buscar));
                echo "</tbody></table>";
            }


        }
        
    ?>   

</ul>