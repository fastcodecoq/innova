<?php

session_start();


if(isset($_SESSION["edit"]))
    echo "<script>cond=true</script>";

/*
 Este documento es desarrollado y es propiedad
 de Gomosoft, prohíbida su distribución, copia sin au-
 torización previa del creador.
 */?>



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

    <title>Innova Espacios</title>


     <link rel="stylesheet" href="css/html5_reset.css" type="text/css" />
     <link rel="stylesheet" href="css/reset.css" type="text/css" />
     <link rel="stylesheet" href="css/__estilo_ini.css" type="text/css" />
     <link rel="stylesheet" href="css/clientes.css" type="text/css" />
    <link rel="stylesheet" href="css/botones.css" type="text/css" />
     <link rel="shortcut icon" href="favicon.png" type="image/png" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>
      <script type="text/javascript" src="js/slide_media.js"></script>

    <script type="text/javascript">

                html5_ie();

               $(document).ready(function(){

                   $.slide_mediaf();

                   if(cond)
                     clos_se();

               });




    </script>

</head>

<body>

<header>

    <figure class="center">

        <a href="inicio" >

            <span class="logo-cab"></span>

        </a>

    </figure>

   <section class="redes-sociales">

          <figure style="right: 35px">
                <a href="https://www.facebook.com/pages/Innova-Espacios/412693412078869" target="_blank">
                    <span class="icono-fbk"></span>
                </a>
          </figure>

          <figure style="right: -10px; top: 30px">
              <a href="https://twitter.com/#!/InnovaEspacios" target="_blank">
                  <span class="icono-twitter" ></span>
              </a>
          </figure>

          <figure style="bottom: 0; right: 40px">
              <a href="http://www.youtube.com/innovaespacios" target="_blank">
                  <span class="icono-mail"></span>
              </a>
          </figure>

      </section>

</header>


  <section id= "cont_centro">



      <div  class="parrafo-contacto left">

          <ul class="cola">

          <li >

          <div class="p-columna left padre" data-role='editable:ul'  >

           <hgroup >
               <h1>CLIENTES</h1>
           </hgroup>


              <ul class="clientes" data-role='editable'>
                 <li>ARPRO ZONA FRANCA SAS .</li>
              <li>BEDOYA  JESUS.</li>
              <li>C.H. PEREIRA Y CIA LTDA.</li>
              <li>CABALLERO ACEVEDO SAS.</li>
              <li>CARLOS A DE LEON A.</li>
              <li> CENTRO ACEROS SA.</li>
              <li>CONSORCIO  MAS-ALFA.</li>
              <li>CONSORCIO C&G.</li>
              <li>CONSORCIO BODEGAS ZONA FRANCA MAMONAL.	</li>
              <li>CONSORCIO CARTAGENA 2010.</li>
              <li>CONSTRUCTORA ACH SAS.</li>
              <li>CONSTRUCTORA EMMA LTDA.</li>
              <li>DESARROLLADORA DE ZONAS FRANCAS SA.</li>
              <li>DINACOL.</li>
              <li>MEZU CONSTRUCTORA  S.A.S.</li>
              <li>MIGUEL GARCIA MULFORD & CIA LTDA.</li>
              </ul>

          </div>

          </li>

              <li style="border-right: 1px solid #cfcfcf">

             <ul class="clientes" data-role='editable' >
        <li>  ECOFLUIDS LTDA.</li>
          <li>   FERNANDO DE LA VEGA Y CIA SA.</li>
          <li>GEMA TOURS SA.</li>
          <li>GRUPO TRIANGULO S.A.</li>
          <li>ICARO COLOMBIA SAS.</li>
          <li>HOTEL SOFITEL SANTA CLARA.</li>
          <li>IGLESIA CRISTIANA FAMILIAR RIOS DE VIDA.</li>
          <li>IMEINT LTDA.</li>
          <li>INCET LTDA.</li>
          <li>INVERSIONES SAN LAZARO S.A.</li>
          <li>KMA CONSTRUCCIONES S.A. - PROYECTO.</li>
          <li>L&M PRODUCCIONES Y BTL LTDA.</li>
          <li>LAGUNA MORANTE.</li>
          <li>MEJIA VILLEGAS CONSTRUCTORES S.A.</li>
          <li>MOMPRESA LTDA.</li>
          <li>OLEOSERVICES SAS.</li>
         </ul>



              </li>

              <li>

          <ul class="clientes" data-role='editable' >
              <li>  ECOFLUIDS LTDA.</li>
              <li>   FERNANDO DE LA VEGA Y CIA SA.</li>
              <li>GEMA TOURS SA.</li>
              <li>GRUPO TRIANGULO S.A.</li>
              <li>ICARO COLOMBIA SAS.</li>
              <li>HOTEL SOFITEL SANTA CLARA.</li>
              <li>IGLESIA CRISTIANA FAMILIAR RIOS DE VIDA.</li>
              <li>IMEINT LTDA.</li>
              <li>INCET LTDA.</li>
              <li>INVERSIONES SAN LAZARO S.A.</li>
              <li>KMA CONSTRUCCIONES S.A. - PROYECTO.</li>
              <li>L&M PRODUCCIONES Y BTL LTDA.</li>
              <li>LAGUNA MORANTE.</li>
              <li>MEJIA VILLEGAS CONSTRUCTORES S.A.</li>
              <li>MOMPRESA LTDA.</li>
              <li>OLEOSERVICES SAS.</li>
          </ul>

              </li>

          
      </div>

  </section>

  <section id="menu">

      <nav id="cab_menu" >

          <ul >

              <li>
                  <a href="inicio" class="left">
                      Inicio
                  </a>
              </li>

              <li>
                  <a href="nosotros"  class="left">
                      Nosotros
                  </a>
              </li>


              <li>
                  <a href="clientes"  class="left">
                      Clientes
                  </a>
              </li>



              <li>
                  <a href="contacto"  class="left">
                      Contacto
                  </a>
              </li>

          </ul>

      </nav>

  </section>



   <footer id="pie">

       <div class="cont-cola">

       <section class="dis-pro left">

       
               <hgroup class="left">

              <h1> Diseñado por Markakalinka & Programado por Gomosoft.</h1>

               </hgroup>



       </section>

           <section class="copyrights right">

               <hgroup class="left">

                   <h1> INNOVA ESPACIOS &copy; 2012. Cartagena - Colombia.</h1>

               </hgroup>

           </section>

       </div>

   </footer>

  <section class="cont-nav-porta " >



  <div class="nav-porta">

      <figure class="left">
          <a href="#nav-volver">
              <span class="icono-nav-volver" >volver</span>
          </a>
      </figure>

       <figure class="center">
           <a href="#nav-portafolio">
               <span class="icono-nav-porta"> PORTAFOLIO</span>
           </a>
       </figure>

      </div>

  </section>

 </body>

</html>