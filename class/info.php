<?php

   define("key","9c0ae6ecce8339b15bb1a9f3d91d3dcf");
   define("secret","36370c9efcd11b18d23439a8164969e3");
   define("uid","1fe9d5138463606cde96942f3ec304a0");


  if($_SERVER["SERVER_NAME"] == "localhost"){

      define("db_server","localhost");
      define("db_user","root");
      define("db_pass","2857811");
      define("db_bd","innova");
      define("domain","localhost/innova");

   }else{

      define("db_server","localhost");
      define("db_user","gomosoft");
      define("db_pass","Chester.1612");
      define("db_bd","innovainfo");
      define("domain","innovaespacios.co");


  }



