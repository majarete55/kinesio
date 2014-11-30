<h3 style='margin-top="20px"'>Pagos <a href=javascript:llamarasincrono('pagosdet.php?aux=1','contenido');><span id='glyplus' class='glyphicon glyphicon-user'></span></a>
    <a><span id='glyplus' class='glyphicon glyphicon-calendar'></span></a></h3> 


<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            include("conexion.php");
            $buscar=mysql_query("SELECT * FROM mensualidad WHERE estado='0' ORDER BY mes, ano") or die(mysql_error());
            $busca=mysql_fetch_array($buscar); 
            $meses[0]="ENERO";$meses[1]="FEBRERO";$meses[2]="MARZO";$meses[3]="ABRIL";$meses[4]="MAYO";$meses[5]="JUNIO";$meses[6]="JULIO";$meses[7]="AGOSTO";$meses[8]="SEPTIEMBRE";$meses[9]="OCTUBRE";$meses[10]="NOVIEMBRE";$meses[11]="DICIEMBRE";
           $auxmes=-1;
            do {        
                if($busca[0]!=""){
                    
                    if($auxmes!=$meses[$busca['mes']-1]){
                    echo "<li class='list-group-item'>".$meses[$busca['mes']-1]." ".$busca['ano']."<a href=javascript:llamarasincrono('pagosdet.php?mes=".$busca['mes']."&ano=".$busca['ano']."','contenido');><span id='gly' class='glyphicon glyphicon-send'></span></a></li>"; $auxmes=$meses[$busca['mes']-1];}
       
                   
                }
            }while ($busca=mysql_fetch_array($buscar));
        ?>   

    </ul>
    
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>