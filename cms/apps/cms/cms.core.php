<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gomosoft
 * Date: 23/04/12
 * Time: 06:44 PM
 * To change this template use File | Settings | File Templates.
 */


if(!function_exists("extend"))
      include("functions.php");

  header("Content-type : text/html , charset = 'utf-8'");

class cms_core
{

    var $params,$canal,$elemens;

    function __construct($params)
    {

        if(!valida_act()){

            return false;
             die;

            }

           $this->params = array(
               "section" => $GLOBALS["secciones"]["home"],
               "proceso" => "cargar",
               "path" => "class/",
               "ini" => false ,
               "key" => "",
               "secret" => ""
            );


        if(!function_exists("simple_html_dom"))
            include( $this->params["path"] . "simple_html_dom.php");

          if(count($params) > 0)
          {

                 $this->params = extend($this->params,$params);

          }


        if($this->params["ini"])
            include("../../config.inc.php");


        if(!function_exists("app_sql"))
             include($this->params["path"] . "sql.php");

        $sql = new app_sql("elems");

        $this->elemens = $sql->_count("");


        if( $this->elemens == 0){

            $this->ini();

        }


           $el = $this->obt_el($this->params["section"]);


        if($params["proceso"] == "editar")
           $this->route(
               array(
                   "tipo" => $el->attr["data-role"],
                   "el" => $el,
                   "proceso"=> 1
               )
           );
        else {
          $can = $this->route(
                array(
                    "tipo" => $el->attr["data-role"],
                    "el" => $el,
                    "proceso"=> 0
                )
            );

            $this->canal = $can;

        }




    }


    protected  function route($params){

        if($params["proceso"] == 1)

        switch($params["tipo"][1] ){

            case "articulo":

                if($params["tipo"][3] == 2)
                {
                     $this->edita_art("doble",$params["el"]);
                }
                else{
                     $this->edita_art("simple",$params["el"]);
                }

            break;


            default:

                return false;


        }

        else

            switch($params["tipo"][1] ){

                case "articulo":

                    if($params["tipo"][3] == 2)
                    {
                        return $this->carga_art("doble",$params["el"]);
                    }
                    else{
                        return $this->carga_art("simple",$params["el"]);
                    }

                    break;


                case "galeria":

                    return $this->carga_gal($params["el"]);

                break;

                case "album":

                    return $this->carga_album($params["el"]);

                break;

                case "image":

                    return $this->carga_img($params["el"]);

                break;


                default:

                    return false;


            }

    }


    protected  function obt_el($seccion){

        $html = new simple_html_dom();

        $html->load_file( path . "/" . $seccion );

        $el = $html->find("[class=padre]",0);
        $el->attr["data-role"]= explode(":",str_replace(array("[","]"),"",$el->attr["data-role"]));

        return $el;


    }


   protected function edita_art($cual,$el){


       if($cual == "doble")
       {



       }
       else if($cual == "simple"){



       }

       return false;

    }

    protected function carga_art($cual,$el){


        if($cual == "doble")
        {

            return array(
                "titulo" => $el->find("h1[data-role='titulo']",0),
                "columnas" => array(
                    $el->find("p[data-role='col1']",0),
                    $el->find("p[data-role='col2']",0)
                )
            );


        }

        else if($cual == "simple"){



        }

        return false;

    }


    protected function carga_gal($el){

        return $el->find("img[data-role='gal']");


    }


    protected function carga_album($el){

        return $el->find("img[data-role = 'hoja']");

    }


    protected function carga_img($el){


        return $el;

    }


    protected function ini(){


        try{

      foreach($GLOBALS["secciones"] as $key =>  $val){


          $el = $this->obt_el($val);

          echo  $key ." -> " . count($el) . "||";


        }

        }catch(Exception $e){

            $e->getMessage();

        }

    }

}



 if($_REQUEST){

     echo "me voy por aca";

         include("../../config.inc.php");

     $cms = new cms_core(

         array(
             "section"=> $secciones["nosotros"],
             "proceso"=> "carga"
         )

     );

     var_dump($cms);

 }







