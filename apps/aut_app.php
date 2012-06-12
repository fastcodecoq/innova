<?php

if(!isset($_SESSION))
    session_start();


class aut_app
{

    public static function void_main()
    {


    if( !isset($_SESSION["token"]) ) {

        $app = new apps_dev(array(
            "key" => key,
            "secret" => secret
        ));


       if ( !$app->ini(  array(
            "key" => key,
            "secret" => secret
        )) )
       {
           return false;

       }else

         return true;


      }else{


        $app = new apps_dev(array(
            "key" => key,
            "secret" => secret
        ));

        if($app->val_token(
          array( "key" => key )
        ))
        {

           return true;

        }
         else
             return false;

      }


    }
}





