<?php

session_start();


if(isset($_SESSION["edit"]))
    echo "<script>cond=true</script>";

/*
 Este documento es desarrollado y es propiedad
 de Gomosoft, prohíbida su distribución, copia sin au-
 torización previa del creador.

 */




?>



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

    <title>Innova Espacios</title>


     <link rel="stylesheet" href="css/html5_reset.css" type="text/css" />
     <link rel="stylesheet" href="css/reset.css" type="text/css" />
     <link rel="stylesheet" href="css/__estilo_ini.css" type="text/css" />
     <link rel="stylesheet" href="css/nosotros.css" type="text/css" />
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


      <figure class="img-nosotros left"  >

          <img src="apps/obt_img.php?p=../img/nosotros.jpg&w=328" alt="innova" />

      </figure>

      <div  class="parrafo-contacto left padre" data-role='[editable:articulo:001:2]' >

          <div class="p-columna left"   >


           <hgroup >
               <h1  data-role='titulo'>NOSOTROS</h1>
           </hgroup>

             <p data-role='col1'>
                 Con más de 15 años de experiencia en el diseño, fabricación y comercialización de las mejores soluciones de espacio para:

                 <br /><br />
                 <span class="num-color">1.</span> Industrias de eventos y de grandes obras.<br /><br />

                   <span class="num-color"> 2. </span>Infraestructuras.<br /><br />

                   <span class="num-color"> 3. </span>Petrolera.<br /><br />

                   <span class="num-color"> 4.</span> Construcción.<br /><br />

                 conocemos las necesidades y tendencias del mercado y a cada cliente ofrecemos atención personalizada con propuestas caracterizadas el diseño y  excelente relación innovación costo-precio-garantía y funcionalidad.
             </p>

          </div>
          
          <p class="left"  data-role='col2' >
              Porque estamos ubicados en Cartagena, en la zona industrial de mamonal, contamos con instalaciones idóneas y talento humano          profesional en constante capacitación para prestar y garantizar un excelente servicio a nuestros clientes. <br /><br />

              Porque somos una empresa con compromiso y responsabilidad social y ambiental.                         Compensamos la fabricación y servicio de los equipos con la reforestación de bosques a través de una alianza estratégica con nuestro operador ambiental.

          </p>
          
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