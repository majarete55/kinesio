<?php
    
    $ced=$_GET['ced'];
    include("conexion.php");
    $buscar=mysql_query("SELECT nombre
                        FROM cliente
                        WHERE cedula='$ced'") or die(mysql_error());
    $busca=mysql_fetch_array($buscar);
    $per=$busca[0];
    if($ced==""){
        //me quede haciendo la funcion para buscar
        
        echo "<a href=javascript:buscapp();><span id='glysearch' class='glyphicon glyphicon-search'></span></a><input id='buscaplan' style='float: right; height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='buscaplan' size='10' maxlength='30'>";
    }
?>


<h3 style='margin-top:40px;'>Reporte pagos pendientes <?php if ($per==""){echo "por persona";}else{echo $per;} ?> <a href="javascript:llamarasincrono('rpagosp.php','contenido');"><span id='glyplus' class='glyphicon glyphicon-user'></span></a><a href="javascript:llamarasincrono('rpagosm.php','contenido');"><span id='glyplus' class='glyphicon glyphicon-calendar'></span></a></h3> 
<br>

<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            
            if($per==""){
                $buscar=mysql_query("SELECT c.cedula, c.nombre FROM mensualidad as m 
                                     LEFT JOIN cliente as c
                                     on m.cedcli=c.cedula
                                     WHERE m.estado='0' GROUP BY c.nombre") or die(mysql_error()); 
            }else{
                $buscar=mysql_query("SELECT mes, ano, monto
                                    FROM mensualidad 
                                    WHERE estado='0'AND cedcli='".$ced."' 
                                    GROUP BY mes, ano 
                                    ORDER BY mes, ano") or die(mysql_error()); 
            }
            $busca=mysql_fetch_array($buscar); 
            if($per==""){
                do {        
                    if($busca[0]!=""){
                            $nombre=$busca['nombre'];
                            
                            echo "<li class='list-group-item'>".$busca['nombre']."<a href=javascript:llamarasincrono('rpagosp.php?ced=".$busca['cedula']."','contenido');><span id='gly' class='glyphicon glyphicon-chevron-right'></span></a></li>";         
                    }
                }while ($busca=mysql_fetch_array($buscar));
            
            }else{
                            $meses[0]="ENERO";$meses[1]="FEBRERO";$meses[2]="MARZO";$meses[3]="ABRIL";$meses[4]="MAYO";$meses[5]="JUNIO";$meses[6]="JULIO";$meses[7]="AGOSTO";$meses[8]="SEPTIEMBRE";$meses[9]="OCTUBRE";$meses[10]="NOVIEMBRE";$meses[11]="DICIEMBRE";
                
                echo "<table class='table'> <tbody>";
                echo "<tr><td>Mes</td><td>Ano</td><td>Monto</td></tr>";
                do {        
                    if($busca[0]!=""){
                        echo "<tr><td>".$meses[$busca['mes']-1]."</td><td>".$busca['ano']."</td><td>".$busca['monto']."</td></tr>";
                    }
                }while ($busca=mysql_fetch_array($buscar));
                echo "</tbody></table>";
            }
            
            
            
        ?>   

    </ul>
    
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>