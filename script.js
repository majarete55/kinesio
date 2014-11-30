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

$(document).ready(function () {

    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });

});

function art(id){
    var temp = id;
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

    var elementsi=document.getElementsByName("id_img");


    for(i=0; i<elementsi.length; i++){
        if(elementsi[i].id==temp){
            document.getElementById("modalimg").src= 'mimagen.php?id='+elementsi[i].value;
            i=elements1.length  
        }
    }
}

function img(id){
    var temp = id;
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

function cli(id){
    var temp = id;
//            document.getElementById("org").value = temp;
    var elements=document.getElementsByName("cedula");

    for(i=0; i<elements.length; i++){
        if(elements[i].id==temp){
            document.getElementById("modalcedula").value=elements[i].value;
            i=elements.length  }}


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
            document.getElementById("modalplan").value= elementsp[i].value;
            i=elementsp.length  
        }
    }
}