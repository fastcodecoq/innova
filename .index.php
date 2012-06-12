<?php
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
     <link rel="stylesheet" href="css/estilo_ini.css" type="text/css" />
     <link rel="shortcut icon" href="favicon.png" type="image/png" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>

    <script type="text/javascript">

                html5_ie();

        if(!$.browser.msie){

            window.addEventListener("online",function(){

                alert("estamos online");

            });

            window.addEventListener("offline",function(){

                alert("estamos ofline");

            });

        }

    </script>

</head>

<body>

  <span class="cab_path"></span>

  <header>

       <figure >

           <a href="#" >

               <span class="logo-cab"></span>

           </a>

       </figure>

       <nav id="cab_menu" class="right">

           <ul >

               <li>
                   <a href="#">
                       Inicio
                   </a>
               </li>

               <li>
                   <a href="#">
                      Nosotros
                   </a>
               </li>

               <li>
                   <a href="#">
                       Productos
                   </a>
               </li>

               <li>
                   <a href="#">
                       Aplicaciones
                   </a>
               </li>

               <li>
                   <a href="#">
                       Contacto
                   </a>
               </li>

           </ul>

       </nav>

  </header>


  <section id= "cont_centro">
    
    <div id = "slider">

        Slider

    </div>


  </section>

  <footer class="contact-porta-redes">

      <div class="cont-cola">

      <section class='contacto left'>


              <article>

                  <hgroup>

                      <h1>Contáctanos.</h1>

                  </hgroup>

                  <p>


                      <span class="icono-mail -grand i-sombra"></span>

                  </p>

              </article>

        </section>


          <section class="portafolio left">

              <article>

                  <hgroup>

                      <h1>Portafolio 2012.</h1>

                  </hgroup>

                  <p>


                      <span class="icono-portafolio -grand i-sombra"></span>


                  </p>

              </article>

          </section>

          <section class="redes left">

              <article>

                  <hgroup>

                      <h1>Contáctanos.</h1>

                  </hgroup>

                  <p>

                      redes
                  </p>



              </article>

          </section>

      </div>

  </footer>


   <footer id="pie">

       <div class="cont-cola">

       <section class="dis-pro left">


           <span class="icono-mkkk left"></span>

               <hgroup class="left">

              <h1> Diseñado por Markakalinka & Programado por Gomosoft.</h1>

               </hgroup>



       </section>

           <section class="copyrights right">

               <hgroup class="left">

                   <h1> Todos los derechos reservados Innova &copy; 2012.</h1>

               </hgroup>

           </section>

       </div>

   </footer>

 </body>

</html>