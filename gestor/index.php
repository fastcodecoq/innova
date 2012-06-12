<?php
  session_start();

   if(isset($_SESSION["edit"])){
       header("location:../index.php");
   }




?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

    <title>Innova Espacios</title>


    <link rel="stylesheet" href="../css/html5_reset.css" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css" type="text/css" />
    <link rel="stylesheet" href="../css/__estilo_ini.css" type="text/css" />
    <link rel="stylesheet" href="../css/botones.css" type="text/css" />
    <link rel="stylesheet" href="../css/dialogs.css" type="text/css" />

    <link rel="shortcut icon" href="favicon.png" type="image/png" />

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/modernizr.js"></script>
    <script type="text/javascript" src="../js/html5_ie.js"></script>
    <script type="text/javascript" src="../js/gomo_uitl.js"></script>
    <script type="text/javascript" src="../js/slide_media.js"></script>

    <script type="text/javascript">

        html5_ie();

        $(document).ready(function(){

            $.slide_mediaf();


             $("input.red").click(function(){

                     opts = {

                         info:"",
                         mensaje:"<form action='javascript:void(0)' name='cambio'>" +
                             "<table>" +
                             "<tr><td>Usuario</td><td><input class='%s' type='text' name='usuario'/></td></tr>" +
                             "<tr><td>Clave antigua</td><td><input class='%mix' type='password' name='pwd'/></td></tr>" +
                             "<tr><td>Clave nueva</td><td><input class='%mix' type='password' name='pwdn1'/></td></tr>"+
                             "<tr><td>Repetir la nueva</td><td><input class='%mix' type='password' name='pwdn2'/></td></tr>" +
                             "<table>" +
                             "</form>",
                         top:"30%",
                         boton:{
                             cerrar:"Cambiar"
                         },
                         titulo:"Innova Espacios"
                     }

                     gomo.dialog.ini(opts,function(){

                         var cond = true;

                         $("form[name='cambio'] input").each(function(){

                             if(!validar($(this))){
                                 $(this).css({border:"1px solid red"});
                                 cond = false;
                                 gomo.dialog.ini(opts);
                             }


                         });

                         var user = $("inpu[name='usuario']").val(),
                              pwd = $("inpu[name='pwd']").val(),
                              pwdn1 = $("inpu[name='pwdn1']").val(),
                              pwdn2 = $("inpu[name='pwdn2']").val();


                       if(cond)
                         gomo.asy_util.ajax({

                             url:"../class/ingr_sis.php",
                             data:{action:2,usuario:user,pwd:pwd,pwdn1:pwdn1,pwdn2:pwdn2},
                             type:"get",
                             success:function(json){

                                 alert(json.estado);

                             }

                         });





                         $("form[name='cambio'] input").click(function(){

                             $(this).css({border:"1px solid #666"});

                         });

                     });

                });

        });

        function dialog(msg){

            var opts = {

                tipo:'dialog',
                mensaje: msg,
                info:''

            };

            gomo.dialog.ini(opts);

        }



    </script>

 

    <style type="text/css">

        form{
            width: 400px;
            margin: 0 auto;
            padding-top: 30px;
        }

        form table {
            margin-left: -20px;

        }

        form table tr td{
            padding: 10px;
        }

        form table tr td label{
            font-size: 1em;
            line-height: 2.5;
        }

        form table tr input[type='text'],form table tr input[type='password']{

            padding: 10px 20px;
            width:300px;
            font: bold 1.5em sans-serif;
            border-radius: 4px;
            box-shadow: inset 2px 2px 5px #999999;
            border: 1px solid #666;
            text-shadow: 0 1px 2px #ededed;


        }

        .boton-gomo{
            margin-left: 10px;
        }

        .verde,.red{
            color: white !important;
            text-shadow: 0  1px 2px #000;
        }

        span.error{
            padding: 5px;
            text-align: center;
            display: block;
            width: 80%;
            color: red;
            margin-top: -8px;
        }

    </style>




</head>

<body>

<header>

    <figure class="center">

        <a href="inicio" >

            <span class="logo-cab"></span>

        </a>

    </figure>



</header>


<section id= "cont_centro">


    <div id = "slider" style="border: none; box-shadow: none">

  <form action="../class/ingr_sis.php" method="post" >
         <table>

             <tr>
                 <td><label>Usuario</label></td>
                 <td><label><input type="text" name="usuario" /></label></td>
             </tr>

             <tr>
                 <td><label>Contraseña</label></td>
                 <td><label><input type="password" name="pwd" /></label></td>
                 <input type="hidden"  name="action" value="1" />
             </tr>

         </table>
      
      <span class="error">   <?php

          if(isset($_GET["e"])){


              switch($_GET["e"]){

                  case "n":

                      echo "Usuario o Contraseña incorrecto.";

                      break;



              }

          }

          ?></span>

        <input class="boton-gomo verde" type="submit" value="Iniciar sesión" />

  </form>


    </div>


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