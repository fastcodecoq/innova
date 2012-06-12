
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

