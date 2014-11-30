<div class="row">
    <div class="box">
        <div class="col-lg-12">

        </div>
         <div class="col-lg-12 text-center">
        <?php 
            include("conexion.php");
            $buscar=mysql_query("SELECT * FROM articulo order by fecha limit 0,3") or die(mysql_error());
            $busca=mysql_fetch_array($buscar); 

            do {        
                if($busca[0]!=""){
                    echo "<img class='img-responsive img-border img-thumbnail' style='width: 200px; height: 200px;' src='mimagen.php?id=".$busca['idimg']."' >";
                    echo "<h2>".$busca["titulo"];
                    echo "<br>";
                    echo "<small>".date('M d, Y', strtotime($busca["fecha"]))."</small>";
                    echo "</h2>";
                    echo "<p>".substr($busca["contenido"],0,400).'...'."</p>";
                    echo "<a href=javascript:javascript:llamarasincrono('particulo.php?id=".$busca["id"]."','contenido'); class='btn btn-default btn-lg'>Leer M&aacutes</a>";}
                    echo "<hr>";
            }while ($busca=mysql_fetch_array($buscar));
        ?>

        </div>
        <div class="col-lg-12 text-center">
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Older</a>
                </li>
                <li class="next"><a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>