/**
 * Created by JetBrains PhpStorm.
 * User: Gomosoft
 * Date: 3/05/12
 * Time: 04:04 PM
 * To change this template use File | Settings | File Templates.
 */



 function gal_evts(){


   $(".gal img").click(function(){

        obj = $(this);

        $("img#principal").fadeOut(

            function(){

                $(this).attr("src",obj.attr("src"));
                var id = obj.attr("id");

                var opts = {

                    url : "class/portafolio.php",
                    data: {action : "2" ,id : id},
                    type:"get",
                    success:function(json){

                        var rs = json.result[0],
                            texto = rs.aplicaciones + "<br /><br />" + rs.descripcion;



                        $(".info-media").html(texto);


                    }

                }

                gomo.asy_util.ajax(opts);

                $(this).fadeIn(function(){

                    $(this).jqzoom();



                });

            }

        );

   });


}





  (function($){

        $.fn.core_eliminar =function(params){

            obj = $(this);




            $(this).click(function(){


                var padre = $(this).parent(),
                    id = padre.find("img").attr("id");



                var opt = {
                    mensaje: "Seguro que deseas eliminar este item? <br /> " +
                        "<div style='width:500px;margin-top: 7px; max-height:100px; overflow: auto; '> <img src='" + padre.find("img").attr("src") + "' alt='' width:'80' height='60' />" +
                        "<p style='margin-left: 7px'>" +
                        $(".info-media").text() +
                        "</p></div>",
                    titulo:"Innova Espacios.",
                    info:"",
                    tipo:"preg"

                }

                gomo.dialog.ini(opt,function(){

                    var opts = {

                        url:"class/portafolio.php",
                        data:{action:"3",id:id},
                        type:"get",
                        success:function(json){

                            if(json.estado == "1"){

                                var opt = {

                                    mensaje: "Se ha eliminado el item... " ,
                                    titulo:"Innova Espacios.",
                                    info:"",
                                    tipo:"dialog"

                                }


                                    gomo.dialog.ini(opt,function(){

                                        $("section.portafolio-slide").load("__portafolio.php",function(){

                                            menu_porta();

                                        });

                                    });

                            }

                        }

                      };

                     gomo.asy_util.ajax(opts);

                });


            });


        };

  })(jQuery);



function menu_porta(){

    $(".menu-porta a").click(function(){

        var id = $(this).attr("id");

        recarga(id);

    });

}

  function recarga(id){


      $(".portafolio-slide").load("__portafolio.php?cat="+id,function(){

          menu_porta();

      });

  }

 function agregar_ima(){

    $("#agregar_ima").click(function(){

     var opts ={

         color:"#898989",
         info:"",
         mensaje:"<iframe src='class/test_por.php?action=' border='0' style='border:1px solid white; width: 450px; height: 300px;'></iframe>",
         top:"25%"

     };

     gomo.dialog.ini(opts,function(){

            recarga(act);

          });

     });


  }





