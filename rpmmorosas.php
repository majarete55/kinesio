
<h3 style='margin-top:40px;margin-bottom: 20px;'>Reporte Personas Morosas <a><span id='glyplus' class='glyphicon glyphicon-stats'></span></a><a><span id='glyplus' class='glyphicon glyphicon-list'></span></a></h3> 

<h6> Meses <input id='cant' style='height: 20px; margin-right: 10px; margin-bottom:10px; width: 150px;' type='text' name='cant' size='10' maxlength='30'> <a onclick="reportemm();"><span id='glysearch' style="float: none;" class='glyphicon glyphicon-search'></span></a></h6>

<form action="" method="POST" >
    <ul class="list-group">
        <?php 
 $meses[0]="ENERO";$meses[1]="FEBRERO";$meses[2]="MARZO";$meses[3]="ABRIL";$meses[4]="MAYO";$meses[5]="JUNIO";$meses[6]="JULIO";$meses[7]="AGOSTO";$meses[8]="SEPTIEMBRE";$meses[9]="OCTUBRE";$meses[10]="NOVIEMBRE";$meses[11]="DICIEMBRE";
           $auxmes=-1;
            //muestra personas morosas de acuerdo a una cantidad de meses o mas de ella

            $cant=$_GET['cant'];
            if($cant!=""){
                include("conexion.php");
                $buscar=mysql_query("SELECT c.cedula, c.nombre, COUNT( m.mes ) AS cant, SUM( m.monto ) AS deuda
                                    FROM mensualidad as m 
                                    LEFT JOIN cliente as c
                                    on m.cedcli=c.cedula
                                    WHERE m.estado='0' GROUP BY c.cedula") or die(mysql_error()); 
                
                $busca=mysql_fetch_array($buscar); 
                
                do {        
                    if($busca[0]!=""){
                        if($busca['cant']>=$cant){
                            $mon=$mon+$busca['deuda'];
                        }
                    }
                }while ($busca=mysql_fetch_array($buscar));
                echo $mon;
                $buscar=mysql_query("SELECT c.cedula, c.nombre, COUNT( m.mes ) AS cant, SUM( m.monto ) AS deuda
                                    FROM mensualidad as m 
                                    LEFT JOIN cliente as c
                                    on m.cedcli=c.cedula
                                    WHERE m.estado='0' GROUP BY c.cedula") or die(mysql_error()); 
                
                $busca=mysql_fetch_array($buscar); 
                echo "<table class='table'> <tbody>";
                echo "<tr><td>Cedula Afiliado</td><td>Nombre Afiliado</td><td>Cantidad de Meses</td><td>Monto</td><td>%</td></tr>";
                do {        
                    if($busca[0]!=""){
                        if($busca['cant']>=$cant){
                            echo "<tr><td>".$busca['cedula']."</td><td>".$busca['nombre']."</td><td>".$busca['cant']."</td><td>".$busca['deuda']."</td><td>".round(($busca['deuda']*100/$mon),2)."</td></tr>";
                        }
                    }
                }while ($busca=mysql_fetch_array($buscar));
                echo "</tbody></table>";
            
            }
            
        ?>   

    </ul>
    
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>