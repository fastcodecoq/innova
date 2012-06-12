<?php



    include("config.inc.php");




?>

<!DOCTYPE html>

<html lang="es-Co">

<head>

    <title>CMS - Gomosoft Panel</title>

    <link rel="stylesheet"  href="css/html5_reset.css" type="text/css"/>
    <link rel="stylesheet"  href="css/reset.css" type="text/css"/>
    <link rel="stylesheet"  href="css/__estilo_ini.css" type="text/css"/>
    <link rel="stylesheet"  href="css/cms.css" type="text/css"/>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="//rezitech.github.com/syze/syze.min.js"></script>
    <script src="js/html5_ie.js" type="text/javascript"></script>

    <script type="text/javascript">

        html5_ie();

        syze.sizes(320, 480, 768, 1366, 1024, 1920).names({320:"mobile",420:"mobile",768:"tablet"});


    </script>

</head>

<body>


 <div id="contenedor">

<header>
    <hgroup>
        <h1 class="h1-titulo"><span style="color: #90e545; font-style: italic;">CMS</span>Gomosoft</h1>
    </hgroup>
    <span class="rev-cms">Ultima revisión <bold>12 de marzo de 2012</bold> por <bold>Usuario de CMS</bold>.</span>
</header>


<section id= "cont_centro">


     <aside class="ul-cont-porta ul-cola ">




               <ul class="ul-pila menu-porta">

                   <li class="activo">

                       <figure class="icono" >

                         <a href="#!/editar">
                           <span class="icono-cms -ed-web "></span>
                         </a>

                       </figure>

                       <span class="label">Edir</span>
                       <span class="label">Editar</span>

                   </li>

                   <li >

                       <figure class="icono" >

                           <a href="#!/mensajes">
                               <span class="icono-cms -mail"></span>
                           </a>

                       </figure>

                       <span class="label">Mensajes</span>

                   </li>

                   <li>

                       <figure class="icono" >

                           <a href="#!/estadisticas">
                               <span class="icono-cms -esta"></span>
                           </a>

                       </figure>

                       <span class="label">Estadisticas</span>

                   </li>

                   <li>

                       <figure class="icono" >

                           <a href="#!/ayuda">
                               <span class="icono-cms -ayuda"></span>
                           </a>

                       </figure>

                       <span class="label ">Ayuda</span>

                   </li>


               </ul>


     </aside>


    <div class="cont-info">

           <section id="editar" class="act">

               <hgroup id="selec-sec">

                     <h1 class="h1-titulo left ">Selecciona una sección</h1>

                     <select class="front left">

                         <?php


                         foreach($secciones as $key => $val)
                            echo  "<option value='$val'>".  $key ."</option>";

                        ?>

                     </select>

               </hgroup>

           </section>

    </div>



</section>


 </div>

</body>

</html>