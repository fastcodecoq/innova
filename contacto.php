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
     <link rel="stylesheet" href="css/contacto.css" type="text/css" />
     <link rel="stylesheet" href="css/botones.css" type="text/css" />

     <link rel="shortcut icon" href="favicon.png" type="image/png" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>
      <script type="text/javascript" src="js/slide_media.js"></script>
      <script type="text/javascript" src="js/gomo_uitl.js"></script>
      <script type="text/javascript" src="js/msg.js"></script>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script type="text/javascript" src="js/mapa.js"></script>

    <script type="text/javascript">

                html5_ie();

               $(document).ready(function(){

                   $.slide_mediaf();

                   $("#msg").msg();

                   $("#mapa").ini_mapa({lat:10.354514276965059,lng:-75.49167827584915,zoom : 16 , mark : {image : "img/mark_innova.png" , size : new google.maps.Size(140,120) , point_or: new google.maps.Point(2,0)  } });

                   if(cond)
                     clos_se();


               });




    </script>

</head>

<body>

<header>

    <figure >

        <a href="inicio" >

            <span class="logo-cab"></span>

        </a>

    </figure>

    <section class="redes-sociales" >

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


      <div class="contacto-cont padre" data-role='[editable:ul:1]'>

           <aside class="info-cont left">

             <ul class="contacto-lista">

             <li>
                 <hgroup>
                   <h1>Para mayor información y cotizaciones favor escribir a:</h1>
               </hgroup>

                   info@innovaespacios.co
              </li>


                 </li>

                 <li>  <hgroup>
                     <h1>  Campamento y Exhibición.</h1>
                 </hgroup>

                     Calle 3 No.7-22.<br/>
                     Mamonal,Sector Arroz Barato.<br />
                     Cartagena, D.T. y C.

                 </li>

                 </li>

                 <li>  <hgroup>
                     <h1>Móvil.</h1>
                 </hgroup>

                     57 + 316-875-29-79

                     <br />
                 </li>

                 <li>  <hgroup>
                     <h1>Teléfono.</h1>
                 </hgroup>

                     5+ 690-38-10

                     <br />

                     <button class="boton-gomo verde" id="msg" style="margin-top: 20px;">Enviar un mensaje.</button>

                    <div class="msg">
                                                                       
                        <form action="javascript:void(0)" method="post" name="msg" >
                        
                             <table>
                                 
                                 <tr>
                                     <td>Nombre</td><td><input type="text" name="nombre" class="%s" value="" /></td>
                                 </tr>

                                 <tr>
                                     <td>Email</td><td><input type="text" name="mail" class="%mail" value="" /></td>
                                 </tr>

                                 <tr>
                                     <td>Mensaje</td>
                                 </tr>

                                 <tr class="ta">
                                     <td><textarea cols="10" rows="5" name="msg" class="%mix" value="" ></textarea></td>
                                 </tr>

                                 
                             </table>

                            <span class="msg-cerra" title="Cerrar" onclick="cerrar()">X</span>

                            <nav  style="position: absolute; right: 10px; bottom: 10px;">
                              <button class="boton-gomo red"  type="submit" onclick="cerrar()" >Cancelar</button>
                              <button class="boton-gomo verde" id="env_bu" type="submit" >Enviar</button>
                          </nav>
                            
                        </form>
                        
                    </div>

                 </li>


             </ul>

           </aside>

          <div id="mapa" class="mapa-cont">

          </div>


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
               <span class="icono-nav-porta"> PRODUCTOS</span>
           </a>
       </figure>

      </div>

  </section>

 </body>

</html>