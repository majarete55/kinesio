<?php 
    include("conexion.php");
     if(session_start()){
        session_destroy(); 
     }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kinesio Studio</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
<!--    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" >
    <!-- Fonts -->
    <link href="css/font2.css" rel="stylesheet" type="text/css">
    <link href="css/font1.css" rel="stylesheet" type="text/css">
    <script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php $alerta=$_GET['msg']; ?>
</head>

<body>
  <?php 
    if($alerta!=""){
        
        switch($alerta){
            case 1:echo "<script>"; echo "alert('Usuario o Password invalidos');"; echo"</script>"; break;
            case 2:echo "<script>"; echo "alert('No tienes permisos suficientes para entrar');"; echo"</script>"; break;
            default: break;
        
        }
        
    }
    
    ?>
    <a  data-toggle="modal" data-target="#sesion" style="float: right;margin-right:120px; margin-top: 15px;text-decoration: none;" >
   <span id='glyplus' class='glyphicon glyphicon-user'></span>
    Iniciar Sesion
    </a>
    <div class="container" id="img">
        <div class="row">
            <div class="box" style="background-color:#FEFCFD">
                <div class="col-lg-12 text-center" style="background-color:#FEFCFD">
                   <img  src="img/kinesioch.fw.png" alt="">    
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed barra peque;a -->
                <a class="navbar-brand" href="index.php">Kinesio Studio &nbsp; <a data-toggle="modal" data-target="#sesion">Iniciar Sesion</a></a>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a  href="index.php">Principal</a>
                    </li>
                    <li>
                        <a href="javascript:llamarasincrono('galeria.php', 'contenido');">Galeria</a>
                    </li>
                    <li>
                        <a href="javascript:llamarasincrono('particulos.php', 'contenido');">Articulos</a>
                    </li>
                    <li>
                        <a href="javascript:llamarasincrono('servicios.php', 'contenido');">Servicios</a>
                    </li>
                    <li>
                        <a href="javascript:llamarasincrono('about.php', 'contenido');">Acerca de</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div id="contenido" class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Noticias</h2>
                    <hr>
                    
                    <ul class="list-group">
					<?php $buscar=mysql_query("SELECT * FROM noticia order by fecha DESC limit 0,3") or die(mysql_error());
							$busca=mysql_fetch_array($buscar); 

						do {		
	   						
								 
							if($busca[0]!=""){
								echo "<li class='list-group-item'>";
								echo "<p>". date('M d, Y', strtotime($busca["fecha"]))."</p>";
								echo "<p>".$busca["titulo"]."</p>";
								echo "<p>".$busca["contenido"]."</p>";
								echo "</li>";}
							

						}while ($busca=mysql_fetch_array($buscar)); ?>	

                    </ul>
                    <h5><a class="flechita" href="#"> Mas &rarr;</a></h5>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center" >
                    <p id='dire'>Boulevard 5 de julio con calle Rodulfo, Edif. Las Gradillas Pb, 6311 La Asunción | 0412-6193040</p>
                
                </div>
<!--
                <div id='interno' class="col-md-4" >
                    <a class="face" >
                      <i class="fa fa-facebook fa-2x"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a class="insta" >
                        <i class="fa fa-instagram fa-2x" ></i>
                    </a>
                    &nbsp;&nbsp;
                    <a class="tw" >
                      <i class="fa fa-twitter fa-2x"></i>
                    </a>
                
                </div>
-->

            </div>
        </div>
    </footer>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 3500 //changes the speed
    })
    </script>

</body>
    
<div class="modal fade" id="sesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 style="margin-left: 200px;" class="modal-title" id="myModalLabel">Iniciar Sesion</h4>
      </div>
      <div id="modal" class="modal-body">
        <form action="cod_login.php" class="form-signin" role="form" method="POST">
            <div style="margin-left: 100px;" class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input style="width: 300px;" id="usr" name="usr" type="text" class="form-control" placeholder="Usuario" value="">
            </div>
            <br>
            <div style="margin-left: 100px;" class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input style="width: 300px;" id="pw" name="pw" type="password" class="form-control" placeholder="Contraseña" value=""> 
            </div>
            <br>
            <button style="width: 400px;margin-left: 75px;" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
        </form>
      </div>
<!--
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
-->
    </div>
  </div>
</div>

</html>
