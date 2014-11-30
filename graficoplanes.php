<style type="text/css">
body { font-family: Verdana, Arial, sans-serif; font-size: 12px; }
#placeholder { width: 300px; height: 200px; }

</style>
 
<!--[if lte IE 8]><script type="text/javascript" language="javascript" src="excanvas.min.js"></script><![endif]-->
<script type="text/javascript" language="javascript" src="js/jquery-1.11.0.js"></script>
<script type="text/javascript" language="javascript" src="highcharts/js/highcharts.js"></script>
<script type="text/javascript" language="javascript" src="highcharts/js/modules/exporting.js"></script>
 <?php 
            include("conexion.php");
            
            $buscar=mysql_query("SELECT p.nombre AS label, COUNT( c.cedula ) AS data
                                FROM plan AS p, cliente AS c
                                WHERE c.idplan = p.id
                                GROUP BY p.id") or die(mysql_error());
            $rows=array();


        while($r = mysql_fetch_array($buscar)) {
            $rows[] = array($r[0],(int)$r[1]);
            } 
      
  
        
 
        ?>   


<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: ''
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: <?php echo json_encode($rows);?>
        }]
    });
});


		</script>
</head>
 
<body>
<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>