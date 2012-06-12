

jQuery.extend({

  slide_mediaf :  function(params){


    this.params = {

         cuerpo : $("body"),
         barra : $(".cont-nav-porta  .nav-porta"),
         boton_ini : $("a[href='#nav-portafolio']"),
         boton_volver : $("a[href='#nav-volver']")

    };


      
      if(params)
         $.extend(this.params,params);


      var params = this.params, cond = true; ;



    this.params.boton_volver.bind("click",function(e){

        e.preventDefault();

        $("section.portafolio-slide").remove();

        var barra = params.barra , este = $(this), dist = $(window).height() * -1 ;

        params.cuerpo.animate({top :   "0px"});

        barra.animate({ bottom : "0px"},function(){

            $(".nav-porta span.icono-nav-volver").css({display : "none"});
            cond = true;

            $("html").css({overflow : "auto"});

            $("section.portafolio-ls")

        });



    });


    this.params.boton_ini.bind("click",function(e){

        e.preventDefault();

        if(!cond)
           return;

     var barra = params.barra , este = $(this), dist = $(window).height() * -1 ;

        $("html").css({overflow : "hidden"});

    params.cuerpo.animate({top :   "20px"},300);

     barra.animate({bottom : "-20px"},300,function(){

         params.cuerpo.animate({top :   "-600px"});

          barra.animate({bottom: (dist * -1) - 50 + "px" },function(){


            $(".nav-porta span.icono-nav-volver").css({display : "block"});

            $("body").append("<section class='portafolio-slide'>  </section> ");


            $("section.portafolio-slide").load("__portafolio.php");

            cond = false;

            });

        });


        });

      }

    });


 $(document).ready(function(){

     $("body").append("<section id='load' style='display: none'></section>");
     $("section.load").load("__portafolio.php");


 })