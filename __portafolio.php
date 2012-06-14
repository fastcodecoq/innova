<?php
session_start();

  include("cms/config.inc.php");
  include("class/portafolio.php");

  if(!$_GET)
  {

      $cat = 2;

      $car = new portafolio();
      $car->set_met("html");
      $rs = $car->carga($cat);

      echo "<script>act = '$cat'</script>";

  } else
  {

      $car = new portafolio();
      $car->set_met("html");
      $rs = $car->carga($_GET["cat"]);


      echo "<script>act =".$_GET["cat"]."</script>";

  }


  if (isset($_SESSION["edit"]))

      echo "<script>cond=true</script>";

   else

      echo "<script>cond = false</script>";




?>

<!DOCTYPE html>

<html lang="es-Co" id="hijo">

<head>

    <meta charset="utf-8" />

    <title>Portafolio</title>

    <link rel="stylesheet"  href="css/html5_reset.css" type="text/css"/>
    <link rel="stylesheet"  href="css/reset.css" type="text/css"/>
    <link rel="stylesheet"  href="css/__estilo_ini.css" type="text/css"/>
    <link rel="stylesheet"  href="css/__portafolio.css" type="text/css"/>    

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/html5_ie.js" type="text/javascript"></script>
    <script src="js/gomo_uitl.js" type="text/javascript"></script>
    <script src="js/portafolio_core.js" type="text/javascript"></script>


    <script type="text/javascript">

         html5_ie();

        $(document).ready(function(){

            $(".overlay").fadeOut(function(){

                gal_evts();


                var src = $("nav.gal table tr").find("td:first img").attr("src");

                $(".media-show img").attr("src",src);

                var cual ="";

                if(cond){

                    $("#agregar_ima").fadeIn();
                    agregar_ima(1);

                    $("nav.gal table tr td").append("<span class='span-del' title='eliminar'>X</span>");
                    $("span.span-del").core_eliminar();


                }

                switch(act){

                    case "1":
                        cual = "prim";
                     break;

                    case "2":
                        cual = "seg";
                        break;

                    case "3":
                        cual = "ter";
                        break;

                    case "4":
                        cual = "cuar";
                        break;
                }


                $("ul.menu-porta li."+cual).addClass("activo");



            });


         });



    </script>

</head>

<body >


<div class="overlay"></div>

 <header>

       <figure class="left">

           <a href="inicio" >

               <span class="logo-cab"></span>

           </a>

       </figure>

    

  </header>



<section id= "cont_centro">


     <ul class="ul-cont-porta ul-cola ">

          <li >


               <ul class="ul-pila menu-porta">


                <li>
                       <a href="?cat=4" id="4" class="cuar">baños portátiles y<br /> servicios de limpieza.</a>
                   </li>

                   <li>
                       <a href="?cat=1" id="1" class="prim">casetas petroleras <br /> prefabricadas.</a>
                   </li>

                   <li >
                       <a href="?cat=2" id="2" class="seg">contendores  <br /> marítimos.</a>
                   </li>

                   <li>
                       <a href="?cat=3" id="3" class="ter">módulos prefabricados<br /> importados.</a>
                   </li>                   


               </ul>

              <section class="redes-sociales" style="margin: 40px 10px 0 0;">

                  <figure style="right: 115px">
                      <a href="https://www.facebook.com/pages/Innova-Espacios/412693412078869" target="_blank">
                          <span class="icono-fbk"></span>
                      </a>
                  </figure>

                  <figure style="right: 62px">
                      <a href="https://twitter.com/#!/InnovaEspacios" target="_blank">
                          <span class="icono-twitter" ></span>
                      </a>
                  </figure>

                  <figure style="right: 10px">
                      <a href="http://www.youtube.com/innovaespacios" target="_blank">
                          <span class="icono-mail"></span>
                      </a>
                  </figure>

              </section>


          </li>

         <li class="cont-media" >



               <figure class="media-show ">
                   <img id="principal" src="" alt="img" width="444" height="320" />
               </figure>

                <p class="info-media" style='width:410px; max-width:4100px;'>
                    <?php

                         echo  " Aplicaciones, " . $rs[0]["aplicaciones"]."</br></br>";



                         echo    $rs[0]["descripcion"]."" ;

                    ?>
                </p>


         <li class="ult " >


          <section class="apli-porta">

              <a class="boton-gomo verde" style="display:none; margin-left: 10px; color: white"  href="#!" id="agregar_ima">Agregar nueva imagen</a>

              <hgroup>
                  <h1 class="h1-titulo" style="color: #9b9b9b; text-shadow: 1px 1px 1px #f5f5f5">.........</h1>
              </hgroup>


              <nav class="gal">

                 <table>


                     <?php

                     $coun = 0;
                     $salida = "";

                       foreach($rs as $r){

                           if($coun == 3){
                               $salida .= "<tr>";
                               $coun = 0;
                          }

                           $salida .= "<td>
                           <img src='img/portaforlio/{$r['categoria']}/{$r['nombre']}' id='{$r['id']}' alt='' width='100%' height='100%' /></td>";

                           if($coun == 3)
                             $salida .= "</tr>";


                           $coun++;

                        }

                      if($coun < 3){
                          $salida .="</tr>";
                      }

                      echo $salida;

                      ?>



                 </table>

              </nav>

              
          </section>



         <p class="p-nota">
             * Todos los desarrollos y servicios tienen la posibilidad de incluir adicionalmente: | vinilos decorativos y promocionales | parasoles | señalización de seguridad  industrial | diseño de jardines verticales | cubiertas verdes y paisajismo |

         </p>

         </li>

     </ul>



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


</body>

</html>
