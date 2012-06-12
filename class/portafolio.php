<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gomosoft
 * Date: 3/05/12
 * Time: 12:51 PM
 * To change this template use File | Settings | File Templates.
 */



class portafolio
{

    private $sql,$carga,$met;


    function __construct()
    {

        if(!function_exists("test_config_inc"))
            include("../cms/config.inc.php");

        if(!function_exists("carga"))
             include("carga.php");

        if(!function_exists("app_sql"))
             include("sql.php");


        $this->sql = new app_sql("portafolio");
        $this->carga = new carga("image");
        $this->met = "json";


    }

    function set_met($met){
        $this->met = $met;
    }


    function subir($params){

       $file = $params["file"];
       $params = $params["text"];

        $this->carga->ini($file);

        if(!$this->carga->validar())
               die($this->resp_json(array(
                   "case" => 2,
                   "detalle" => "formato invalido",
               )));

        if(!isset($params["fecha"]))
            $params["fecha"] = date("Y-m-d");

        if($this->carga->lanzar("../img/portaforlio/{$params['cate']}")){

            $this->sql->_mysqli->query("INSERT INTO `". $this->sql->obt_tabla() ."` (`nombre`,`categoria`,`aplicaciones`,`descripcion`,`fecha`)
                  VALUES ('".$this->carga->obt_p_nombre()."',{$params['cate']},'{$params['apli']}','{$params['desc']}',{$params['fecha']})")
                  or die($this->resp_json(array("case" => 2 , "detalle" => $this->sql->error())));

            $this->sql->desc();

            if($this->met != "html")
            $this->resp_json(array("case" => 1 ));
            else
                return $this->resp_json(array("case" => 1 ));

        }


    }


    function carga($cat){

        $sql = $this->sql;

       $rs = $sql->_query("*","WHERE `categoria` = {$cat} ORDER BY `id` DESC")
            or die($this->resp_json(array("case" => 2 , "detalle" => "Error seleccionando de la BD")));

        $this->sql->desc();

        if($this->met != "html")
          $this->resp_json(array("case"=>3 ,"result" => $rs));
        else
            return $this->resp_json(array("case"=>3 ,"result" => $rs));

     }

    function carga_por_id($id){

        $sql = $this->sql;

        $rs = $sql->_query("*","WHERE `id` = {$id} LIMIT 1")
            or die($this->resp_json(array("case" => 2 , "detalle" => "Error seleccionando de la BD")));

        $this->sql->desc();

        if($this->met != "html")
            $this->resp_json(array("case"=>3 ,"result" => $rs));
        else
            return $this->resp_json(array("case"=>3 ,"result" => $rs));

    }


    function del($id){


         $rows = $this->sql->borrar("WHERE id = ".$id);

         $this->resp_json(array("case" => 3 , "result" => $rows));

    }


    private function resp_json($info){


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



 if($_GET and isset($_GET["action"])){

     $app = new portafolio();

     switch($_GET["action"]){


         case 1:

           break;

         case 2:

             $app->carga_por_id($_GET["id"]);

           break;

         case 3:

             $app->del($_GET["id"]);

              echo json_encode(array("estado" => "1"));
             die;

          break;


     }

 }

