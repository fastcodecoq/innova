

  var validar = function() {

        this.campos = {

            val_cont : function(elemento){

                alert("hola")

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

        };



  };


  (function($){

      var  cond = false , el_temp ;

     var alt_text = function(obj){


          obj.find("input,textarea").bind("focus" , function(){

                    evento($(this));

          });


      } ,

     evento = function (obj){

        if(cond)
        {

            if( el_temp.val().indexOf("*") != -1 || !/[A-Za-zñÑ\s]/.test(el_temp.val()) )
                el_temp.val( el_temp.attr("id") )
        }

        if(obj.val().indexOf("*") != -1 ) {

            obj.val("");
            cond = true;

        }


        el_temp = obj;

    };

     $.fn.val_form = function(){

         alt_text($(this));


     };

  })(jQuery);