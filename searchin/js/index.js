// Funciones ejecutadas

    function toggleCategorias(){

        let botones = $("#formularioNormal");
        let flecha = $(".categorias>#flecha");

        if (botones.is(":visible")){
            botones.fadeOut("1000");
            flecha.css("transform","scaleX(-1)");
        }else{
            botones.fadeIn("1000");
            flecha.css("transform","scaleX(1)");
        }
    }

    function toggleMarcadores(){

        let botones = $(".marcadoresNormal>.boton");
        let editar = $(".marcadoresNormal>#editarMarcadores");
        let flecha = $(".marcadoresNormal>#flecha");

        if (botones.is(":visible")){
            botones.fadeOut("1000");
            editar.fadeOut("1000");
            flecha.css("transform","scaleX(1)");
        }else{
            botones.fadeIn("1000");
            editar.fadeIn("1000");
            flecha.css("transform","scaleX(-1)");
        }
    }

    function irA(e){
        if(e == "inicio"){
            location.href = "./index.php";
        }
        if(e == "login"){
            location.href = "./login.php";
        }
        if(e == "registro"){
            location.href = "./registro.php";
        }
        if(e == "formUsuarios"){
            location.href = "./formUsuarios.php";
        }
    }

// DOM totalmente cargado:
$( document ).ready(function() {

    window.onbeforeunload = function () {
        var scrollPos;
        if (typeof window.pageYOffset != 'undefined') {
            scrollPos = window.pageYOffset;
        }
        else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') {
            scrollPos = document.documentElement.scrollTop;
        }
        else if (typeof document.body != 'undefined') {
            scrollPos = document.body.scrollTop;
        }
        document.cookie = "scrollTop=" + scrollPos + "URL=" + window.location.href;
    }

    window.onload = function () {
        if (document.cookie.includes(window.location.href)) {
            if (document.cookie.match(/scrollTop=([^;]+)(;|$)/) != null) {
                var arr = document.cookie.match(/scrollTop=([^;]+)(;|$)/);
                document.documentElement.scrollTop = parseInt(arr[1]);
                document.body.scrollTop = parseInt(arr[1]);
            }
        }
    }
 
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }




    // ---------------------------------

    $(".categorias>#flecha").click(function (e) { 
        e.preventDefault();
        toggleCategorias();
    })

    $(".marcadoresNormal>#flecha").click(function (e) { 
        e.preventDefault();
        toggleMarcadores();
    })
    $(".nav>.boton").click(function (e){
        irA(this.id);
    })

    $("#editarMarcadores").click(function () {
        location.href = "./marcadores.php";
    })
    $("#editarMarcadoresFantasma").click(function () {
        location.href = ".marcadores.php";
    })
    $("#contacto").click(function(){
        location.href = "./contacto.php";
    })

    $("#campoBusqueda").click(function () {  
        $(this).val("");
    })

    $("#flechaAbsolutaBuscar").click(function(){
        if($("#campoBusqueda").val() != ""){
            $("#google").submit();
        }
    })

$(window).resize(function(){location.reload();});

    if ($(window).width() > 1080 ){

                $("#flechaAbsoluta1").click(function () { 
                    if($("#formularioFantasma").is(":visible")){
                        $("#formularioFantasma").fadeOut(200);
                        $("#flechaAbsoluta1").css({"transform":"rotate(270deg)"});
                    }else{
                        $("#formularioFantasma").css("display","flex");
                        $("#formularioFantasma").hide(1);
                        $("#formularioFantasma").fadeIn(200);
                        $("#flechaAbsoluta1").css({"transform":"rotate(90deg)"});
                    }
                })
                $("#flechaAbsoluta2").click(function () { 
                    if($(".marcadoresFantasma").is(":visible")){
                        $(".marcadoresFantasma").fadeOut(200);
                        $("#flechaAbsoluta2").css({"transform":"rotate(270deg)"});
                    }else{
                        $(".marcadoresFantasma").css("display","flex");
                        $(".marcadoresFantasma").hide(1);
                        $(".marcadoresFantasma").fadeIn(200);
                        $("#flechaAbsoluta2").css({"transform":"rotate(90deg)"});
                    }
                })

                $("#textoLogo").click(function () {  
                    $("html").animate({ scrollTop: 0 }, 250);
                })


                $(window).scroll(function() {

                    var scroll = $(document).scrollTop();

                    if(scroll > 30){
                        $(".header>.busqueda").css({"margin-right":"2rem"})
                        $(".header>.nav").css({"margin-left":"2rem"})
                        $("#flechaAbsoluta1").fadeIn(400);
                        $("#flechaAbsoluta2").fadeIn(400);
                        $("#flecha").css("opacity","0");
                        $("#formularioNormal").fadeOut();
                        $(".categorias>#flecha").css("transform","scaleX(-1)");
                        $(".marcadoresNormal").fadeOut();
                        $(".marcadoresNormal>#flecha").css("transform","scaleX(1)");
                        $("#flechaAbsolutaBuscar").fadeIn(400);
                        $(".temperatura").fadeOut(400);


                    }else{
                        $(".header>.busqueda").css({"margin-right":"0"})
                        $(".header>.nav").css({"margin-left":"0"})
                        $("#flechaAbsoluta1").fadeOut(200);
                        $("#flechaAbsoluta2").fadeOut(200);
                        $("#flecha").css("opacity","0.75");
                        $("#flechaAbsoluta1").css({"transform":"rotate(270deg)"});
                        $("#formularioFantasma").fadeOut();
                        $("#formularioNormal").fadeIn();
                        $(".categorias>#flecha").css("transform","scaleX(1)");
                        $(".marcadoresNormal").fadeIn();
                        $(".marcadoresFantasma").fadeOut();
                        $(".marcadoresNormal>#flecha").css("transform","scaleX(-1)");
                        $("#flechaAbsolutaBuscar").fadeOut(5);
                        $(".temperatura").fadeIn(400);
                    }
                });
    }else{
        
        $(window).scroll(function() {

            var scroll = $(document).scrollTop();

            if(scroll > 30){
                $(".temperatura").fadeOut(400);
            }else{
                $(".temperatura").fadeIn(400);
            };
        });

        $("#flechaAbsoluta1").click(function () { 
                if($("#formularioFantasma").is(":visible")){
                    $("#formularioFantasma").fadeOut(200);
                    $("#flechaAbsoluta1").css({"transform":"rotate(270deg)"});
                }else{
                    $("#flechaAbsoluta1").css({"transform":"rotate(90deg)"});
                    $("#formularioFantasma").css("display","flex");
                    $("#formularioFantasma").hide(1);
                    $("#formularioFantasma").fadeIn(200);
                }    
        });
        $("#flechaAbsoluta2").click(function () { 
            if($(".marcadoresFantasma").is(":visible")){
                $(".marcadoresFantasma").fadeOut(200);
                $("#flechaAbsoluta2").css({"transform":"rotate(270deg)"});
            }else{
                $(".marcadoresFantasma").css("display","flex");
                $(".marcadoresFantasma").hide(1);
                $(".marcadoresFantasma").fadeIn(200);
                $("#flechaAbsoluta2").css({"transform":"rotate(90deg)"});
            }
        })
        $("#textoLogo").text("Search-In ▼");
        $("#textoLogo").css({"font-size":"1.4rem","padding-top":"0.65rem"});
        $("#textoLogo").click(function () 
        {
            if($(".header>.nav").is(":visible")){
                $(".header>.nav").fadeOut(200);
                $("#textoLogo").text("Search-In ▼");
            }else{
                $(".header>.nav").css("display","flex");
                $(".header>.nav").hide(1);
                $("#textoLogo").text("Search-In ▲");
                $(".header>.nav").fadeIn(200);
            }
        })
    }



    $(".boton").click(function(e){
        if(($(this).text()) == "Favorito"){
            e.preventDefault;
            alert("Es necesario registrarse y editar los favoritos para hacer uso de estos.");
            return false;
        }
    });
    $(".boton1").click(function(e){
        if(($(this).text()) == "Favorito"){
            e.preventDefault;
            alert("Es necesario registrarse y editar los favoritos para hacer uso de estos.");
            return false;
        }
    });

});
