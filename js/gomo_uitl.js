/*
 Gomosoft, Creando soluciones en software
 */

  var slide = 1010;

 var gomo = {

   asy_util : {

     gJSON : function ( params ){


          this.params = {

              url : "php/json_sql.php" ,
              data : { req : "nombre--usuarios-select-"},
              callback : function(json){

                  var opts = {

                                          mensaje : "Se ha realizado el request éxitosamente",
                                          tipo : "dialog",
                                          info : ""

                                      };

                              gomo.dialog.ini(opts)

              }

          };

        $.extend(this.params,params);


         $.getJSON(

              this.params.url+"?req="+this.params.data ,
              this.params.data,
              this.params.callback(json)

          );


     } ,

     ajax : function( params , call){

         if(!call)
             call = function(){}

         this.params = {

                     url : "php/json_sql.php" ,
                     data : { req : "nombre--usarios-select-"},
                     callback : function(json){

                        alert(json.result.length)

                     },
                     cache: false,
                     async : true,
                     dataType : "json",
                     type : "GET",
                     success: function(json){

                       var opts = {

                           mensaje : "Genial se han actualizado de manera correcta ( "+json.total+" Registros afectados )",
                           tipo : "dialog",
                           info : ""

                       };

                         gomo.dialog.ini(opts,call)

                     },
                     error: function(json){

                         var opts = {

                                                   mensaje : "Ha ocurrido un error ( HTTP "+json.status+" ).",
                                                   tipo : "dialog",
                                                   info : "",
                                                   color: "red",
                                                   titulo:"Innova Espacios"

                                               };

                                                 gomo.dialog.ini(opts)

                     }

                 };

         $.extend(this.params,params);


         $.ajax(this.params);


     }

   }

     ,


     dialog : {

         ini : function (params,callback){

       var  dialog = gomo.dialog;

         if( dialog.act )
            return;

               this.params = {
                
                   titulo : "AP Montelibano." ,
                   mensaje : "Hello world",
                   info : "<p style='padding-left: 15px'>Prueba</p>",
                   boton :{

                       cancelar :"Cancelar",
                       si : "Si",
                       no : "No",
                       aceptar :"Aceptar",
                       cerrar : "Cerrar"


                   } ,
                   tipo :  "dialog" ,

                   callback : function(){ } ,
                   onload : function() {},
                   top : "50%" ,
                   color : "rgb(139,180,68)"

               };


         $.extend(this.params , params);

             if(!callback)
                  callback = function(){};


                this.params.callback =
                                function(){
                                   dialog.callback( callback );
                                  } ;



          this.botones = "";

            switch(this.params.tipo){


                case "dialog" :

                    this.botones += '<button class="boton"  style="float:right; margin:10px 10px 0 0;   padding:10px;" onclick="gomo.dialog.params.callback()">'+this.params.boton.cerrar+'</button>';

                break;

                case "preg" :

                    this.botones += '<button class="boton"  style="float:right; margin:10px 10px 0 0;   padding:10px;" onclick="gomo.dialog.params.callback()">'+this.params.boton.si+'</button>'
                                      + '<button class="boton"  style="float:right; margin:10px 10px 0 0;   padding:10px;" onclick="gomo.dialog.cerrar()">'+this.params.boton.no+'</button>';

                    break;

                case "form" :

                    this.botones += '<button class="boton"  style="float:right; margin:10px 10px 0 0;   padding:10px;" onclick="gomo.dialog.params.callback()">'+this.params.boton.aceptar+'</button>'
                                      + '<button class="boton"  style="float:right; margin:10px 10px 0 0;   padding:10px;" onclick="gomo.dialog.cerrar()">'+this.params.boton.cancelar+'</button>';

                    this.params.top = "220px";

                    break;

            }


         	$("body").append('<div class="superp" style="display:none; top : '+this.params.top+'"><ul> <li class="pri" style="background: '+this.params.color+' "><div class="title">'+this.params.titulo+'</div><font class="bot_cerrar" onclick="gomo.dialog.cerrar()">X</font></li><li class="med"><p class="msg"">'+this.params.mensaje+'</p><div class="s_conte">'+this.params.info+' </div></li><li class="ult">' +
               this.botones +  '</li></ul><div class="clear"></div> </div>');

         	$(".superp").fadeIn("fast",function(){

                  dialog.act = true;

                 if(dialog.params.onload)
                     dialog.params.onload();

         		});

         } ,

        cerrar : function(call){

            if(gomo.dialog.act){

                $(".superp").fadeOut("fast",function(){

                    if(call)
                         call();

                    $(this).remove();

                    gomo.dialog.act = false;

                });

            }

        }

     ,

      act : false,

        callback : function(call){

                   gomo.dialog.cerrar(call);

           }

      }

  };

function validar(elemento){



    var val = elemento.attr("class"),
        tipo = "";

    if( val.indexOf("%s") != -1  )
        tipo = "s";
    else if( val.indexOf("%d") != -1 )
        tipo = "d";
    else if ( val.indexOf("%mix") != -1 )
        tipo = "m";
    else if( val.indexOf("%mail") != -1 )
        tipo = "mail";
    else if( val.indexOf("%tel") != -1 )
        tipo = "tel";
    else if( val.indexOf("%nick") != -1 )
        tipo = "user";
    else if( val.indexOf("%f") != -1 )
        tipo = "float";
    else if( val.indexOf("%url") != -1 )
        tipo = "url";
    else if( val.indexOf("%tcredito") != -1 )
        tipo = "tc";


    var   valor = elemento.val();

    switch( tipo ){


        case "s" :

            var patron =/\w/;

            return patron.test(valor);

            break;

        case "d" :

            return /^(?:\+|-)?\d+$/.test(valor);

            break;

        case "mail" :

            return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/.test(valor);

            break;

        case "float" :

            alert("float");

            break;

        case "tel" :

            valor.toString().trim();
            valor.replace(/\d/,valor);


            return /(^[0-9\s\+\-])+$/.test(valor) && valor.split("").length < 16;

            break;

        case "user" :

            alert("user");

            break;

        case "url" :

            return /^(ht|f)tp(s?)\:\/\/[0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*(:(0-9)*)*(\/?)( [a-zA-Z0-9\-\.\?\,\'\/\\\+&%\$#_]*)?$/.tes(valor);

            break;

        case "tc" :

            return /^((67\d{2})|(4\d{3})|(5[1-5]\d{2})|(6011))(-?\s?\d{4}){3}|(3[4,7])\ d{2}-?\s?\d{6}-?\s?\d{5}$/.tes(valor);

            break;

        case "m":

            return /\w/.test(valor);

    }

}

function getCookie(c_name)
{
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++)
    {
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name)
        {
            return unescape(y);
        }
    }
}


(function($){

    $.fn.gomo_slider = function(params){


        this.params = {

            delay : 6000,
            width : 800,
            height : 400,
            leng_efecto: 1800,
            el : "img"

        };

        if(params)
        {
            $.extend(this.params,params);
        }



        params = this.params;

        ef1 = params.leng_efecto/3;
        ef2 = params.leng_efecto/1.5;



        img = $(this).find(params.el).css({display:"none",width:params.width+"px",height:params.height+"px"});


        $(img[0]).fadeIn(function(){

            slide =$(this);

        });

        coun = 0;

        setInterval(function(){

            $(img[coun]).fadeOut(ef1,function(){

                if(coun < img.length-1 )
                    coun++;
                else
                    coun=0;


                $(img[coun]).fadeIn(ef2,function(){

                    slide =$(this);


                });


            })

        },params.delay);


    }

})(jQuery);


function agregar_ima_sl(){

    $("#agrega").click(function(){

        if(slide == 1010)
          id = 1
        else
          id = slide.attr("id");


        var id = id,
            id_sl = $(".cont-slider").attr("id");



       var con = "class/_test_por.php?id="+id+"&id_slider="+id_sl;

        var opts ={

            color:"#898989",
            info:"",
            mensaje:"<iframe src='"+con+"' border='0' style='border:1px solid white; margin-top:30px; width: 450px; height: 300px;'></iframe>",
            top:"-20%"

        };

        gomo.dialog.ini(opts,function(){

            document.location.reload();

        });

    });


}


  function elimi(){

       $("#dele").click(function(){

            var id = slide.attr("id"),
                id_sl = $(".cont-slider").attr("id");


             gomo.asy_util.ajax
               ({

                   url:"class/slider.php",
                   data:{id:id,id_slider:id_sl,action:2},
                   type:"get",
                   success:function(json){

                       if(json.estado==1)
                       {
                           var opts ={

                               color:"#898989",
                               info:"",
                               mensaje:"Se ha eliminado el slide correctamente"

                           }

                               gomo.dialog.ini(opts,function(){

                                   document.location.reload();

                               });
                       }

                   }

               })

       });

}
