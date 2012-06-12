


(function($){


      $.fn.msg = function(params){

          obj = $(this);

         this.params = {

              cont_msg : "div.msg",
              form : "form[name='msg']",
              env_but: "#env_bu"

          };

          if(params)
             $.extend(this.params,params);

          params = this.params;


          obj.bind("click",function(event){


              if(event)
                event.preventDefault();

              msg = $(params.cont_msg);

              abrir();

          });

          cerrar = function(){

              msg.fadeOut(function(){
                  quit_evento();
              });




           };

          abrir = function(){

              msg.fadeIn(function(){
                  add_evento();
                  form_action();
                  click_form_els();
              });

          };

          click_form_els = function(){

              $(params.form + " input," + params.form + " textarea").click(function(){

                  $(this).css({border:"1px solid #ababab"});

              });

          };

          add_evento = function(){

              $(document).bind("keyup",function(key){

                  if(key.keyCode == 27)
                     cerrar();


              });

          };

          quit_evento = function(){

              $(document).unbind("keyup");

          };

          form_action = function(){

              $(params.env_but).click(function(){


                  var cond = true;

                  $(params.form + " input ," + params.form + " textarea").each(function(){

                            if(!valida($(this)))
                            {
                                cond = false;
                                $(this).css({border : "1px solid red"});
                            }


                  });




                  if(cond){

                      this.params = {

                          url:"php/contacto.php",
                          data : {
                              nombre : $("input[name='nombre']").val(),
                              mail : $("input[name='mail']").val(),
                              msg : $("textarea[name='msg']").val()
                          },
                          type : "post",
                          dataType : "json",
                          success : function(json){

                              if(json.estado == "1"){

                                  cerrar();

                                  var opt = {
                                      titulo: "Innova Espacios.",
                                      mensaje: "Gracias hemos recibido tu mensaje, en breve te responderemos.",
                                      info: "",
                                      tipo:"dialog"
                                  }

                                      gomo.dialog.ini(opt);

                              }

                          }

                      }

                      gomo.asy_util.ajax(this.params);


                  }

              });



          };

          valida =  function(elemento){


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

                  };




      }

})(jQuery);






