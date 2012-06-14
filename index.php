<?php
  session_start();

   include("class/slider.php");


    if(isset($_SESSION["edit"])){
        echo "<script>cond=true</script>";
    }
    else{
        echo "<script>cond=false</script>";

    }


$slide = new slider();


$rs = $slide->carga(array("id_sl"=>1,"html"=>1));


?>



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

    <title>Innova Espacios</title>


     <link rel="stylesheet" href="css/html5_reset.css" type="text/css" />
     <link rel="stylesheet" href="css/reset.css" type="text/css" />
     <link rel="stylesheet" href="css/__estilo_ini.css" type="text/css" />
     <link rel="stylesheet" href="css/botones.css" type="text/css" />
     <link rel="stylesheet" href="css/dialogs.css" type="text/css" />

     <link rel="shortcut icon" href="favicon.png" type="image/png" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>
      <script type="text/javascript" src="js/slide_media.js"></script>
      <script type="text/javascript" src="js/gomo_uitl.js"></script>
      <script type="text/javascript" src="js/slide.js"></script>



    <script type="text/javascript">

                html5_ie();

               $(document).ready(function(){

                   $.slide_mediaf();

                    if(cond )
                       clos_se();

                       $(".cont-slider").gomo_slider({delay:7000,width:956,height:323});

                         agregar_ima_sl();
                         elimi();


               });




    </script>

    <style type="text/css">
        span.span-del{

            position: absolute !important;
            width: 17px;
            right: 0;
            padding: 4px 4px;
            border-radius: 45px;
            font: bold 14px sans-serif;
            background: rgb(200,0,0);
            color: white;
            z-index:2000;
            box-shadow:inset 0 2px 3px #f5f5f5;
            cursor: pointer;
            border: 1px solid #333;

        }

        span.span-del:hover,span.span-del:focus{

            box-shadow:inset 0 2px 3px white;
            background: red;

        }

        span.span-del:active{

            background: rgb(200,0,0);
            box-shadow: none;

        }
    </style>


</head>

<body>

  <header>

       <figure class="left">

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


    <div id = "slider">

        <?php
        if(isset($_SESSION["edit"]))
            echo "
                 <span class='span-del' id='dele' >X</span>
                 <button class='boton-gomo verde' id='agrega' style='position: absolute; top:80px'>Agregar Slide</button>
                 ";


           if(count($rs) > 0) {

               echo "<figure class='cont-slider' id='{$rs[0]['id_slider']}' >";

             foreach($rs as $r){

                 if(!isset($_SESSION["edit"]))
                 echo "
                 <img src='img/slider/{$r["src"]}' alt=''  style='display:none' />

                 ";
                 else
                     echo "

                 <img src='img/slider/{$r["src"]}' id='{$r['id']}'     style='display:none' />

                 ";

             }
           }else{
               echo  '<figure class="cont-slider" id="1" >';
            }

            ?>

        </figure>

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





  </section>

 </body>

</html>