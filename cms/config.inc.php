<?php


     if($_SERVER["SERVER_NAME"] == 'localhost') {

         define("system_os","linux");
         define("charset","utf-8");

         define("tag_sel","data-role");

         define("zona_horaria","America/Bogota");
         define("errores","true");

      define("db_server","localhost");
      define("db_user","root");
      define("db_pass","2857811");
      define("db_bd","innova");

      define("serv_key","");
      define("serv_secret","");

      define("path","http://localhost/innova");

     }

   else {

       define("system_os","linux");
       define("charset","utf-8");

       define("tag_sel","data-role");

       define("zona_horaria","America/Bogota");
       define("errores","true");

   define("db_server","innovagomo.db.8948492.hostedresource.com");
   define("db_user","innovagomo");
   define("db_pass","Chester.16");
   define("db_bd","innovagomo");

   define("serv_key","");
   define("serv_secret","");

   define("path","http://home/etc/public html");


   }




  // datos de CMS

     $secciones = array(

         "nosotros" => 'nosotros.php',
         "contacto" => 'contacto.php',
         "home" => 'index.php',
         "clientes" => 'clientes.php'

     );

  function test_config_inc(){}


putenv("charset=".charset);




