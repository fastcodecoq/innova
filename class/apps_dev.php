<?php

  if(!isset($_SESSION))
    session_start();


/*
   Gomosoft, Creando soluciones en software
 */

class apps_dev
{
   private $secret , $key;
   var $token , $status;

  function __construct( array $params ){

      if(!function_exists("ini_sql")){
             include ("../php/util.php");
      }

      $this->key = $params["key"];
      $this->secret = $params["secret"];

  }

    public static function void_main( array  $func){

        if(!function_exists("ini_sql")){
             include ("../php/util.php");
        }

        foreach($func as $f){

            switch ($f["func"]){

                case "token_val" :



            }

        }

     }

  public function  ini($params){

      $this->key = $params["key"];
      $this->secret = $params["secret"];

      return $this->ini_trans();

  }

  public function fin(array $params){

       $key = $params["key"];
       $secret = $params["secret"];
       $sql = ini_sql("tokens");

       $token = isset($_SESSION["token"]) ? $_SESSION["token"] : false;

       if(!$token)
       {
           echo "/Error de token";
           return false;
           die;
       }

       if( !$this->val_app( array( "key" => $key , "secret" => $secret) ) )
       {

           echo "/Error de app";
           return false;
           die;

       }

      $query = "DELETE FROM `tokens` where `key` = '$key'";

      $sql->obt_query($query) or die( $sql->error() );

      return true;

  }

  public function val_app(array $params){

      $key = $params["key"];
      $secret = $params["secret"];
      $sql = ini_sql("apps_id");

      if(!isset($_SESSION["uid"]))
      {

          $sql->desco();
          $this->status = false;
          return false;
          die;

      }

      $query = "SELECT `apps` FROM `usuarios` where `uid` = '{$_SESSION['uid']}' LIMIT 1";

      $res =  $sql->obt_query($query) or die( $sql->error() );

      $info = mysqli_fetch_assoc($res);

      $apps = explode(";",$info["apps"]);

      if(count($apps) > 1)
      {
          if(! in_array($key,$apps)){


              $sql->desco();
              $this->status = false;
              return false;
              die;

          }

      }elseif( $key != $apps[0] ){

          echo "/Error con app";
          $this->status = false;
          return false;
          die;

      }


      $query = "SELECT `tipo` FROM `apps_id` where `key` = '$key' AND `secret` = '$secret' LIMIT 1";

      $cols = mysqli_num_rows( $sql->obt_query($query) );


      if( $cols < 1 ){

          echo "/Error con app";
          $sql->desco();
          $this->status = false;
          return false;
          die;

      }


      return true;

  }

  private function ini_trans(){



      try{



          $key = $this->key ;
          $secret = $this->secret ;
          $ip = ( is_numeric( str_replace(".","",$_SERVER["REMOTE_ADDR"]) ) )? $_SERVER["REMOTE_ADDR"] : die("Tu ip no es válida");
          $token = md5(nombre_ale(8));


          $keys = array( "e4da3b7fbbce2345d7772b0674a318d5" );

          $time = time();


          $sql = ini_sql("tokens");


          if(! $this->val_app( array("key" => $key , "secret" => $secret)) ){

              echo "Error de app";
              $this->status = false;
              return false;
              die;

          }



         $query = "SELECT `time` AS hora , `token` FROM `tokens` where `key` = '$key' LIMIT 1";

         $cols = mysqli_num_rows( $res = $sql->obt_query($query) ) ;


          if($cols > 0 )
          {


              $datos = mysqli_fetch_assoc($res);


              if( ( time() - $datos["hora"] ) > 1000 && !in_array("e4da3b7fbbce2345d7772b0674a318d5",$keys) )
              {


                  $query = "DELETE FROM `tokens` WHERE `key` = '" .$key. "' AND `ip` = '". $ip ."' LIMIT 1";
                  $sql->obt_query($query);

                  $sql->desco();
                  $this->status = false;

                  echo "El token ha expirado";
                  die;

              }

              $sql->desco();

              $this->status = true;
              return true;

          }


          $sql->obt_query("INSERT INTO {$sql->obt_tabla()} (`token`,`key`,`time`,`ip`) VALUES ('$token','$key','$time','$ip')") or die($sql->error());

          $_SESSION["token"] = $this->token = $token;

          $this->status = true;

          return true;


      }catch(Exception $e){

          echo $e->getMessage() ."  - " .$e->getLine();
          $this->status = false;
          return false;


      }

   }

    public function  act_token(){

    }

    public function val_token( array $params ){

        $key = $params["key"];

        $sql = ini_sql("tokens");

        $query = "SELECT `time` AS hora FROM `tokens` where `key` = '$key'";

        $cols = mysqli_num_rows( $res = $sql->obt_query($query) );


        if($cols > 0 )
        {

           return true;

        }


        return false;

    }


   private function request_transac( array $params){

        $sql = ini_sql("apps_id");

       if ( !$this->val_app( array( "key" => $params["key"], "secret" => $params["secret"]) )){

            $this->status = false;
            return false;


       }


      $t = $_SESSION["token"];
      $ip =  $ip = ( is_numeric( str_replace(".","",$_SERVER["REMOTE_ADDR"])) )? $_SERVER["REMOTE_ADDR"] : die("Tu ip no es válida");;

       //se válida el token a ver si el developer en verdad está haciendo un request y de que máquina lo inició

              $query = "SELECT `time` AS `hora` FROM `tokens` WHERE `token` = '" .$t."' AND `key` = '" .$params["key"]. "' AND `ip` = '". $ip ."' LIMIT 1";
              $res = $sql->obt_query($query);

                     if( mysqli_num_rows($res) < 1 )
                     {
                         echo "error req_trans";

                         $sql->desco();
                         $this->status = false;
                         return false;

                     }



           $datos = mysqli_fetch_assoc($res);

           $key = $params["key"];
           $time = time();

       if( ( $time - $datos["hora"] ) > 1000  ){

          $query = "DELETE FROM `tokens` WHERE `token` = '" .$t."' AND `key` = '" .$params["key"]. "' LIMIT 1";
          $sql->obt_query($query);
          $sql->desco();

          echo " El token ha expirado";
          die;

       }else{

           if( ( $time - $datos["hora"] ) > 1  )
           {

               $query = "DELETE FROM `tokens` WHERE `token` = '" .$t."' AND `key` = '" .$params["key"]. "' AND `ip` = '". $ip ."' LIMIT 1";
               $sql->obt_query($query);

               $t = md5(nombre_ale(7));


               $sql->obt_query("INSERT INTO `tokens` (`token`,`key`,`time`,`ip`) VALUES ('$t','$key','$time','$ip')") or die($sql->error());

               $_SESSION["token"] = $t;

               $sql->desco();
               $this->status = true;
               return true;

           }

       }


              //se genere otro token y se actualiza en la BD , la idea es poner determinado tiempo de vida al token y luego invalidarlo sino ha sido actualizado, entonces el dev debe pedir otro

               $sql->desco();


              $this->status = true;

             return true;

    }

    function obt_info(){

        $params = array( "key"=> $this->key , "secret" => $this->secret );

          if( ! $this->request_transac( $params )){

             return false;

         }

        return true;

    }


}


 class trans_resp{


     var $status,$token,$trans;

    function __construct($st,$to){

        $this->status = $st;
        $this->token = $to;

    }


 }



