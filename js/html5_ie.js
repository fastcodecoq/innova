
 var html5_ie = function( params ){


     if(!$.browser.msie)
           return;

          this.params = {
              elemens : ["header","footer","nav","section","aside","article","figure"]
          };

         if(params){

          var vector = {
               elemens : params
          };

            $.extend(this.params,vector);

         }


        for( var i = 0 ; i < this.params.elemens.length ; i++)
            document.createElement(this.params.elemens[i]);

     };

   function clos_se(){

 $(document).ready(function(){


        $(".nav-porta").append("<a href='class/ingr_sis.php?action=4' class='boton-gomo red' style='position:absolute; right: 10px; '>Cerrar sesión</a>");

     });

       }

