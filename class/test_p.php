<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gomosoft
 * Date: 3/05/12
 * Time: 01:46 PM
 * To change this template use File | Settings | File Templates.
 */
class tes_p
{

    function __construct($params)
    {

        $cond = true;

        foreach($params["text"] as $key => $prs){

            if(empty($prs) or !isset($prs) or !preg_match('/\w/',$prs)){

                $cond = false;

                if(!isset($_SESSION))
                 session_start();

                $_SESSION["error"] = json_encode(array("el" => $key));


                die("error");

                header("location:".$_SERVER["HTTP_REFERER"]);

            }

        }


        if($cond and $params["file"]["size"] > 0)
        {

            if(!function_exists("portafolio()"))
                 include("portafolio.php");

            $carga = new portafolio();

            $carga->subir($params);

        }


    }


}

if($_POST)

  $ini = new tes_p(array( "text" => $_POST,"file" => $_FILES["file"]));


