<?php

  if(!isset($_SESSION))
    session_start();

class slider
{

    private $sql,$con,$r_json,$id_sl,$up,$ses;

    function __construct()
    {


        if(!function_exists("test_config_inc"))
              include("config.inc.php");



        $sql = new app_sql("sliders");

        $this->sql = $sql;

        $this->con = $this->sql->_mysqli;

        $this->r_json = new resp_json();


        $this->up = new carga("image");

        $this->ses();



    }


    private function ses(){

        if(!isset($_SESSION["edit"])){

             $this->ses = false;

        }
        else
            $this->ses = true;

    }


    function carga($params){


        if(isset($params["id_sl"]))
            $this->id_sl = $params["id_sl"];



       $rs = $this->sql->_query("src,id,id_slider","WHERE id_slider = {$this->id_sl}");



        if($rs){

          if(!isset($params["html"]))
            $this->r_json->r_json(
                array(
                    "case" => 3,
                    "result" => $rs
                )
            );
            else
                return $rs;

        }else{

            if(!isset($params["id_sl"]))
            $this->r_json->r_json(
                array(
                    "case" => 2,
                    "result" => $this->sql->error()
                )
            );

        }


     }


    function eliminar(){

        $this->id_sl = $_REQUEST["id_slider"];

       $id = $_REQUEST["id"];

       $this->con->query("DELETE FROM `sliders` WHERE id = {$id} AND id_slider = {$this->id_sl}") or die(
           $this->r_json->r_json(
               array(
                   "case" => 2,
                   "detalle" => $this->con->error
               )
           )
        );

        if($this->con->affected_rows > 0){

              $this->r_json->r_json(
                  array(
                      "case" => 1
                  )
              );

        }else{

             $this->r_json->r_json(
                 array(
                     "case" => 2,
                     "detalle" => $this->con->error
                 )
             );

        }

    }


    function agre_sl(){

        $file = $_FILES["slide"];

        $this->up->ini($file);

        $this->id_sl = $_REQUEST["id_slider"];

       if(!$this->up->validar()){

           if(!isset($_REQUEST["dialog"]))
           die($this->r_json->r_json(
               array(
                   "case" => 2,
                   "detalle" => "archivo inválido"
               )
           ));
           else
               echo "
                   <div class='resp' style='overflow: auto; width:200px; margin-top: 100px'>
                   <span>No has seleccionado un archivo válido.</span>
                   <button class='boton-gomo verde' onclick='history.back()' >Volver</button>
                   </div>
                 ";
       }

        if($this->up->lanzar("../img/slider")){

            $src = $this->up->obt_p_nombre();


        $this->con->query("INSERT INTO `sliders` (id_slider,src) VALUES ({$this->id_sl},'$src')") or die(
        $this->r_json->r_json(
            array(
                "case" => 2,
                "detalle" => $this->con->error
            )
        )
        );


            if($this->con->affected_rows > 0 && !isset($_REQUEST["dialog"]))
                $this->r_json->r_json(
                    array(
                        "case" => 1
                    )
                );
            else if(isset($_REQUEST["dialog"]))
                 echo "
                   <div class='resp' style='overflow: auto; width:200px; margin-top: 100px'>
                   <span>Se ha cargado el slide correctamente, actualiza la web.</span>
                   <button class='boton-gomo verde' onclick='history.back()'>Cargar más</button>
                   </div>
                 ";



        }else if(!isset($_REQUEST["dialog"]))

            $this->r_json->r_json(
                array(
                    "case" => 2,
                    "detalle" => $this->con->error
                )
            );

    }

}

  if($_REQUEST){


      $ini = new slider();

      switch($_REQUEST["action"]){

          case 1:

              $ini->carga($_REQUEST["id_slider"]);

           break;

          case 2:

              $ini->eliminar();

            break;


          case 3:

              $ini->agre_sl();

              break;

      }


  }




class app_sql
{

    private $_tabla;

    var $_mysqli;

    public function __construct ($tabla){

        $mysqli = new mysqli(db_server, db_user, db_pass,db_bd);

        if ( mysqli_connect_errno ()) {

            $this->_error = "No se pudo conectar con la base de datos";
            return false;

        }else{

            $this->_mysqli = $mysqli;
            $this->_tabla = $tabla;
            return true;

        }


    }

    function _query ($que,$como){

        $con = $this->_mysqli;
        $query = "SELECT $que FROM `{$this->_tabla}` $como ";

        $result = array();

        $rss = array();

        if ($fil = $con->query($query)){

            while($rs = $fil->fetch_assoc()){


                $result[] = $rs;

            }

        }

        return $result;

    }

    function _count ( $what ){

        $conexion = $this->_mysqli;

        $query = "SELECT `id` FROM `{$this->_tabla}` $what";

        $conexion->query($query);

        return $conexion->affected_rows;

    }

    function _update ($who, $what, $newVal){
        $conexion = $this->_mysqli;

        $query = "UPDATE `{$this->_tabla}` SET `{$what}` = ? WHERE {$who}";

        $up = $conexion->prepare($query);
        $up->bind_param ( 'd', $newVal );
        $upd = $up->execute();

        if ( !$upd ) {
            $this->_error = "No se pudo actualizar";
            return false;
        }else{
            return true;
        }


    }

    function borrar($como){

        $con = $this->_mysqli;

        $query = "DELETE FROM ".$this->obt_tabla()." ".$como;

        $con->query($query);

        return $con->affected_rows;

    }

    function camb_tabla($tabla){

        $this->_tabla = $tabla;

    }


    function desc(){

        $this->_mysqli->close();

    }


    function error(){

        return $this->_mysqli->error;

    }

    function obt_tabla(){

        return $this->_tabla;

    }


}


class resp_json
{

    private $met;

    function __construct()
    {

        $this->met = "adsad";

    }

    function r_json($info){


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



class carga{

    private $arr,$ar_filtro,$mime;

    function __construct($mi){
        $this->arr = false;
        $this->mime = $mi;
    }

    function ini($ar){


        $this->ar_filtro = $this->set_mime($this->mime);

        $this->arr = array(
            "arr" => $ar,
            "tmp" => $ar["tmp_name"],
            "error" => $ar["error"],
            "size" => $ar["size"],
            "name" => $ar["name"],
        );

        $n=explode(".",$this->arr["name"]);
        $this->arr["ext"] = trim(end($n));
        $this->arr["pat_nombre"] = trim(nombre_ale(8).".".$this->arr["ext"]);
    }

    function set_filtro($filtro){

        $this->ar_parche = $filtro;

    }

    function lanzar($path){

        if (empty($this->arr) or !$this->validar()) return false;

        if(!is_dir($path)) mkdir($path,"0755",true);

        $path = "$path/{$this->arr['pat_nombre']}";

        if(move_uploaded_file($this->arr["tmp"],$path)) return true; else return false;

    }

    function validar(){

        foreach( $this->ar_filtro as $filtro){

            $c = 0;
            if(strcasecmp($filtro,$this->arr["ext"]) == 0 or $this->arr["ext"] == "jpg" or $this->arr["ext"] == "JPG"){
                $c++;
            }

            if($c == 0)return false; else return true;

        }

    }

    function set_mime($mime){

        switch($mime){

            case "image" :

                return array("png","jpg","jpeg","gif");

                break;

            case "texto" :

                return array("doc","docx","txt");

                break;

        }
    }

    public function obt_ar_fil(){
        return $this->ar_filtro;
    }

    public function set_ar_fil($filtro){
        $this->ar_filtro = $filtro;
    }

    public function obt_arr()
    {
        return $this->arr;
    }

    public function set_arr($arr)
    {
        $this->arr = $arr;
    }

    public  function obt_p_nombre(){

        return $this->arr["pat_nombre"];

    }

}


function nombre_ale($x){
    $randomCaracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUWXYZ";
    $ranum = "1234567890";
    $nombre = "";
    for ( $i = 0; $i < $x; $i++ ){
        if( ($i % 2) == 0 )
            $nombre .= $randomCaracteres{ rand(0,49) };
        else
            $nombre .= $ranum{ rand(0,9) };
    }
    return $nombre;
}


