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
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    
<!--    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <style>
    #panel1{display:none;}
    #panel2{display:none;}
    #panel3{display:none;}
    #panel4{display:none;}
    #panel5{display:none;}
    
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
        $(".item1").hover( function(){
            $("#panel1").css("display","block");
            $("#panel2").css("display","none");
            $("#panel3").css("display","none");
            $("#panel4").css("display","none");
            $("#panel5").css("display","none");}
        );
        $(".item2").hover( function(){
            $("#panel2").css("display","block");
            $("#panel1").css("display","none");
            $("#panel3").css("display","none");
            $("#panel4").css("display","none");
            $("#panel5").css("display","none");
    
        }
                    );
        $(".item3").hover( function(){
            $("#panel3").css("display","block");
            $("#panel2").css("display","none");
            $("#panel1").css("display","none");
            $("#panel4").css("display","none");
            $("#panel5").css("display","none");}
        );
        $(".item4").hover( function(){
            $("#panel4").css("display","block");
            $("#panel2").css("display","none");
            $("#panel3").css("display","none");
            $("#panel1").css("display","none");
            $("#panel5").css("display","none");}
        );
        $(".item5").hover( function(){
            $("#panel5").css("display","block");
            $("#panel2").css("display","none");
            $("#panel3").css("display","none");
            $("#panel4").css("display","none");
            $("#panel1").css("display","none");}
        );
    
    
    });
</script>
    
    
    <div id="wrapper">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed barra peque;a -->
                    <a class="navbar-brand" id='kine' href="#">Kinesio Studio</a>
                </div>
                <!-- Sidebar -->
                <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" style="height: 1px;">
                    <div id="sidebar-wrapper" class='sidebar-wrapper navbar collapse in'>
                    <ul class="sidebar-nav">
                        <br>
                        <li class="sidebar-brand">
                            <img  src="img/kinesiominmin.fw.png" alt=""> 
                        </li>

                        <br>
                        <li id='litem'>
                            <a id='item' class="item1" href="">Pagina</a>
                        </li>
                        <ul style='list-style: none;' id="panel1">
                            <li id='litem'>
                                <a id='item' class="item1" href="javascript:llamarasincrono('articulos.php', 'contenido');">articulos</a>
                            </li>
                            <li id='litem'>
                                <a id='item' class="item1" href="javascript:llamarasincrono('noticias.php', 'contenido');">noticias</a>
                            </li>
                            <li id='litem'>
                                <a id='item' class="item1" href="javascript:llamarasincrono('admingaleria.php', 'contenido');">galeria</a>
                            </li>
                            
                        </ul>
                        <li id='litem'>
                            <a id='item' href="javascript:llamarasincrono('clientes.php', 'contenido');">Afiliaciones</a>
                        </li>
                        
                        <li id='litem'>
                            <a id='item' class="item2" href="">Clases</a>
                        </li>
                        <ul style='list-style: none;' id="panel2">
                            <li id='litem'>
                                <a id='item' class="item2" href="javascript:llamarasincrono('clases.php', 'contenido');">clases</a>
                            </li>
                            <li id='litem'>
                                <a id='item' class="item2" href="javascript:llamarasincrono('profesores.php', 'contenido');">profesores</a>
                            </li>                            
                        </ul>
                        <li id='litem'>
                            <a id='item' href="javascript:llamarasincrono('planes.php', 'contenido');">Planes</a>
                        </li>
                        <li id='litem'>
                            <a id='item' href="">Pagos</a>
                        </li>

                    </ul>
                </div>    
                    
                </nav>
                
            </div>
        </nav>
        <div id="page-content-wrapper">
            <div class="container-fluid" id='contenido'>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
<!--                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!--
    <div id='cabecera'>
        <a style='margin-top: 50px;' href="#menu-toggle" class="btn btn-default" id="menu-toggle">Ocultar</a>
    </div>
-->
    
<!--
    <div style="margin-left:346px; float:right; width: 1120px;" id="contenido" class="container">
        
    </div>
-->
    
    <script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
    <!-- jQuery Version 1.11.0 -->
    
<!--
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
-->


</body>

</html>
