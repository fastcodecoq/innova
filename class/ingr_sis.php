<?php
session_id("innova");
session_start();



class ingr_sis
{

    private $params,$sql,$users,$con,$met;

    function __construct()
    {

        if(!function_exists("test_config_inc"))
            include("../cms/config.inc.php");

         if(!function_exists("app_sql"))
             include("sql.php");

        $this->sql = new app_sql("users");

        $this->con = $this->sql->_mysqli;

        $this->met = "asa";


        $this->con->query("select id from users") or die($this->resp_json(
            array(
                "case" => 2,
                "detalle"=>$this->sql->error()
            )
        ));


        $this->users = $this->con->affected_rows;

    }


    function validar(){


        $user = $_REQUEST["usuario"];
        $pwd = md5($_REQUEST["pwd"]);



        if($this->users == 0){

                header("location:".$_SERVER["HTTP_REFERER"]);
                die;

        }

        $rs = $this->con->query("SELECT * FROM users WHERE usuario= '$user' AND pwd = '$pwd'") or die($this->resp_json(
            array(
                "case" => 2,
                "detalle"=>$this->sql->error()
            )
        ));

        if($rs){


            setcookie("ses", 1, time()+3600);

            $_SESSION["edit"] = 1;
            $_SESSION["user"] = $user;


            header("location:../index.php");


        }else{

            header("location:".$_SERVER["HTTP_REFERER"]."?e=n");

        }


    }



    function camb_pwd(){


        $user = $_REQUEST["usuario"];
        $pwd = md5($_REQUEST["pwd"]);
        $pwdn1 = md5($_REQUEST["pwdn1"]);
        $pwdn2 = md5($_REQUEST["pwdn2"]);

        if($this->users == 0){

            header("location:".$_SERVER["HTTP_REFERER"]);
            die;

        }

       $this->sql->_query("id","WHERE usuario= '$user' AND pwd = '$pwd'");

        if($this->con->affected_rows > 0){

         if( $pwdn1 == $pwdn2 ){
            $this->con->query("UPDATE `users` SET `pwd` = '$pwdn1' WHERE usuario= '$user' AND pwd = '$pwd'") or die($this->resp_json(
                array(
                    "case" => 2,
                    "detalle"=>$this->sql->error()
                )
            ));

             $this->resp_json(array(
                 "case" => 1
             ));


         }
         else
             die( $this->resp_json(
                 array(
                     "case" => 2,
                     "detalle"=> "Las claves no coinciden"
                 )
             ) );




        }


        if($this->con->affected_rows > 0)
            $this->resp_json(array("case"=>1));


    }


    function new_user(){

          $user = $_REQUEST["usuario"];
          $pwd = $_REQUEST["pwd"];
          $pwd1 = $_REQUEST["pwd1"];


         $this->sql->_query("id","WHERE  usuario = '$user'") or die($this->resp_json(
            array(
                "case" => 2,
                "detalle" => $this->sql->error()
            )
        ));

        if($this->con->affecter_rows > 0){

            $this->resp_json(
                array(
                    "case" => 2,
                     "detalle" => "ya el usuario existe"
                )
            );

        }else{


            if($pwd == $pwd1)
            $this->con->query("INSERT INTO users (usuario,pwd) VALUES ('$user','$pwd')") or die($this->resp_json(
                array(
                    "case" => 2,
                    "detalle" => $this->sql->error()

                )
            ));
            else
                $this->resp_json(
                    array(
                        "case" => 2,
                        "detalle" => "las claves no coinciden"

                    )
                );




        }

    }

    function close(){

        session_destroy();

        header("location:../index.php");

        die;

    }


    private function resp_json($info){

        $this->sql->desc();

        switch($info["case"]){

            case 1:

                if($this->met != "html"){

                    echo json_encode(array(
                        "estado" => "1"
                    ));

                    die;

                }
                else
                    return true;

                break;

            case 2:

                if($this->met != "html")
                {

                    echo json_encode(array(
                        "estado" => "0",
                        "detalle" => $info["detalle"]
                    ));

                    die;
                }
                else
                    return false;

                break;

            case 3:



                if($this->met != "html"){
                    echo json_encode(array(
                        "estado" => "1",
                        "result" => $info["result"]
                    ));


                    die;
                }
                else{

                    return $info["result"];

                }


                break;



        }


    }


}


      $app = new ingr_sis();

    switch($_REQUEST["action"]){

        case 1:

            $app->validar();

         break;

        case 2:

            $app->camb_pwd();

          break;

        case 3:

            $app->new_user();

            break;


        case 4:

            $app->close();

            break;

    }

