
<h3 style='margin-top:40px;'>Reporte Afiliacion Planes 
<a href="javascript:llamarasincrono('raplanesg.php', 'contenido');"><span id='glyplus' class='glyphicon glyphicon-stats'></span></a>
<a href="javascript:llamarasincrono('raplanes.php', 'contenido');"><span id='glyplus' class='glyphicon glyphicon-list'></span></a>
</h3> 
<br>

<form action="" method="POST" >
    <ul class="list-group">
        <?php 
            include("conexion.php");
            
            $buscar=mysql_query("SELECT p.nombre, COUNT( c.cedula ) AS cantidad, (
                                SELECT COUNT( c.cedula ) *100 / COUNT( cli.cedula ) 
                                FROM cliente AS cli
                                ) AS porcentaje
                                FROM plan AS p, cliente AS c
                                WHERE c.idplan = p.id
                                GROUP BY p.id") or die(mysql_error());
            $busca=mysql_fetch_array($buscar); 
            echo "<table class='table'> <tbody>";
            echo "<tr><td>Nombre</td><td>Cantidad de Afiliados</td><td>%</td></tr>";
            do {        
                if($busca[0]!=""){
                    echo "<tr><td>".$busca['nombre']."</td><td>".$busca['cantidad']."</td><td>".round($busca['porcentaje'],2)."</td></tr>";
                }
            }while ($busca=mysql_fetch_array($buscar));
            echo "</tbody></table>";
        
 
        ?>   
   
    </ul>
  
<!--    <input class='btn btn-default' type='submit' value='Editar'>-->
</form>