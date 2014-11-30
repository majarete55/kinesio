$(document).ready(function() {
    
    
    
    $(".item1").hover( function(){
        $("#panel1").css("display","block");
        $("#panel2").css("display","none");
        $("#panel3").css("display","none");
        $("#panel4").css("display","none");
        $("#panel5").css("display","none");
    });
    $(".item2").hover( function(){
        $("#panel2").css("display","block");
        $("#panel1").css("display","none");
        $("#panel3").css("display","none");
        $("#panel4").css("display","none");
        $("#panel5").css("display","none");
    });
    $(".item3").hover( function(){
        $("#panel3").css("display","block");
        $("#panel2").css("display","none");
        $("#panel1").css("display","none");
        $("#panel4").css("display","none");
        $("#panel5").css("display","none");
    });
    $(".item4").hover( function(){
        $("#panel4").css("display","block");
        $("#panel2").css("display","none");
        $("#panel3").css("display","none");
        $("#panel1").css("display","none");
        $("#panel5").css("display","none");
    });
    $(".item5").hover( function(){
        $("#panel5").css("display","block");
        $("#panel2").css("display","none");
        $("#panel3").css("display","none");
        $("#panel4").css("display","none");
        $("#panel1").css("display","none");
    });
    

});

function reportem(){
    var d=document.getElementById("desde").value;
    var h=document.getElementById("hasta").value;
    javascript:llamarasincrono('rpmorosas.php?desde='+d+'&hasta='+h,'contenido');
}

function reportemm(){
    var c=document.getElementById("cant").value;
    javascript:llamarasincrono('rpmmorosas.php?cant='+c,'contenido');
}

function reportena(){
    var c=document.getElementById("num").value;
    javascript:llamarasincrono('rpsarticulos.php?num='+c,'contenido');
}

function reportenc(){
    var c=document.getElementById("num").value;
    javascript:llamarasincrono('racoment.php?num='+c,'contenido');
}

function buscaa(){
var id=document.getElementById("buscaa").value;
    llamarasincrono("articulos.php?id="+id,'contenido');
}

function buscan(){
var id=document.getElementById("buscan").value;
    llamarasincrono("noticias.php?id="+id,'contenido');
}

function buscacli(){
var id=document.getElementById("buscacli").value;
    llamarasincrono("clientes.php?id="+id,'contenido');
}

function buscacla(){
var id=document.getElementById("buscacla").value;
    llamarasincrono("clases.php?id="+id,'contenido');
}

function buscaprof(){
var id=document.getElementById("buscaprof").value;
    llamarasincrono("profesores.php?id="+id,'contenido');
}

function buscaplan(){
var id=document.getElementById("buscaplan").value;
    llamarasincrono("planes.php?id="+id,'contenido');
}

function art(id){
    var temp = id;
    document.getElementById("modalid").value=temp;
//            document.getElementById("org").value = temp;
    var elements=document.getElementsByName("titulo");

    for(i=0; i<elements.length; i++){
        if(elements[i].id==temp){
            document.getElementById("modaltitulo").value=elements[i].value;
            i=elements.length  }}


    var elements1=document.getElementsByName("contenido");


    for(i=0; i<elements1.length; i++){
        if(elements1[i].id==temp){
            document.getElementById("modalcontenido").value=elements1[i].value;
            i=elements1.length  }
    }

    var elementsi=document.getElementsByName("idimg");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("modalimg").src= 'mimagen.php?id='+elementsi[i].value;
            document.getElementById("idimg").value= elementsi[i].value;
            i=elementsi.length  
        }
    }
}

function nhor(){
    
    var elements=document.getElementsByName("clase");
    document.getElementById("idclase").value=elements[0].value;
    
}

function hor(id){
    var temp = id;
    var elements=document.getElementsByName("clase");
    document.getElementById("modalidclase").value=elements[0].value;
    document.getElementById("modalidhor").value=temp;
    var elements=document.getElementsByName("dia");

    for(i=0; i<elements.length; i++){
        if(elements[i].id==temp){
            $("#modaldia option[value="+elements[i].value+"]").attr("selected",true);
            i=elements.length  }}


    var elements1=document.getElementsByName("ini");


    for(i=0; i<elements1.length; i++){
        if(elements1[i].id==temp){
            document.getElementById("modalini").value=elements1[i].value;
            i=elements1.length  }
    }

    var elementsi=document.getElementsByName("fin");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("modalfin").value= elementsi[i].value;
            i=elementsi.length  
        }
    }
    
    var elementsp=document.getElementsByName("prof");


    for(i=0; i<elementsp.length; i++){
        if(elementsp[i].id==temp){
            $("#modalprof option[value="+elementsp[i].value+"]").attr("selected",true);
            i=elementsp.length  
        }
    }
}


function cla(id){
    var temp = id;
    document.getElementById("modalid").value=temp;
//            document.getElementById("org").value = temp;
    var elements=document.getElementsByName("nombre");

    for(i=0; i<elements.length; i++){
        if(elements[i].id==temp){
            document.getElementById("modalnombre").value=elements[i].value;
            i=elements.length  }}


    var elements1=document.getElementsByName("desc");


    for(i=0; i<elements1.length; i++){
        if(elements1[i].id==temp){
            document.getElementById("modaldesc").value=elements1[i].value;
            i=elements1.length  }
    }

    var elementsi=document.getElementsByName("img");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("modalimg").src= 'mimagen.php?id='+elementsi[i].value;
            document.getElementById("idimg").value= elementsi[i].value;
            i=elementsi.length  
        }
    }
}

function prof(id){
    var temp = id;
//            document.getElementById("org").value = temp;
    document.getElementById("modalcedula").value=temp;
    var elements=document.getElementsByName("nombre");

    for(i=0; i<elements.length; i++){
        if(elements[i].id==temp){
            document.getElementById("modalnombre").value=elements[i].value;
            i=elements.length  }}


    var elements1=document.getElementsByName("desc");


    for(i=0; i<elements1.length; i++){
        if(elements1[i].id==temp){
            document.getElementById("modaldesc").value=elements1[i].value;
            i=elements1.length  }
    }
    
    var elementsc=document.getElementsByName("correo");

    for(i=0; i<elementsc.length; i++){
        if(elementsc[i].id==temp){
            document.getElementById("modalcorreo").value=elementsc[i].value;
            i=elementsc.length  }}

    var elementsi=document.getElementsByName("img");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("id").value= elementsi[i].value;
            document.getElementById("modalimg").src= 'mimagen.php?id='+elementsi[i].value;
            i=elements1.length  
        }
    }
}

function img(id){
    var temp = id;
    document.getElementById("modalid").value=temp;
//            document.getElementById("org").value = temp;
    var elementsi=document.getElementsByName("id_img");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("modalimg").src= 'mimagen.php?id='+elementsi[i].value;
            i=elementsi.length  
        }
    }
}



function noti(id){
    var temp = id;
    document.getElementById("modalid").value=temp;
//            document.getElementById("org").value = temp;
    var elements=document.getElementsByName("titulo");

    for(i=0; i<elements.length; i++){
        if(elements[i].id==temp){
            document.getElementById("modaltitulo").value=elements[i].value;
            i=elements.length  }}


    var elements1=document.getElementsByName("contenido");


    for(i=0; i<elements1.length; i++){
        if(elements1[i].id==temp){
            document.getElementById("modalcontenido").value=elements1[i].value;
            i=elements1.length  }
    }

}

function plan(id){
    var temp = id;
    document.getElementById("modalid").value=temp;
//            document.getElementById("org").value = temp;
    var elements=document.getElementsByName("nombre");

    for(i=0; i<elements.length; i++){
        if(elements[i].id==temp){
            document.getElementById("modalnombre").value=elements[i].value;
            i=elements.length  }}


    var elements1=document.getElementsByName("desc");


    for(i=0; i<elements1.length; i++){
        if(elements1[i].id==temp){
            document.getElementById("modaldesc").value=elements1[i].value;
            i=elements1.length  }
    }
    
    var elementsi=document.getElementsByName("monto");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("modalmonto").value= elementsi[i].value;
            i=elementsi.length  
        }
    }

}

function cli(id){
    var temp = id;
    document.getElementById("modalcedula").value=temp;
//            document.getElementById("org").value = temp;
//    var elements=document.getElementsByName("cedula");
//
//    for(i=0; i<elements.length; i++){
//        if(elements[i].id==temp){
//            document.getElementById("modalcedula").value=elements[i].value;
//            i=elements.length  }}


    var elements1=document.getElementsByName("nombre");


    for(i=0; i<elements1.length; i++){
        if(elements1[i].id==temp){
            document.getElementById("modalnombre").value=elements1[i].value;
            i=elements1.length  }
    }

    var elementsi=document.getElementsByName("telefono");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("modaltelefono").value= elementsi[i].value;
            i=elementsi.length  
        }
    }

    var elementsc=document.getElementsByName("correo");


    for(i=0; i<elementsc.length; i++){
        if(elementsc[i].id==temp){
            document.getElementById("modalcorreo").value= elementsc[i].value;
            i=elementsc.length  
        }
    }

    var elementsp=document.getElementsByName("plan");


    for(i=0; i<elementsp.length; i++){
        if(elementsp[i].id==temp){
            $("#modalplan option[value="+elementsp[i].value+"]").attr("selected",true);
            i=elementsp.length  
        }
    }
    
}