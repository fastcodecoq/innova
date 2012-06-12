<?php
/**
 * Desarrolado por Gomosoft, Creando soluciones en software.
 * 
 *
 * este documento es propiedad intelectual de Gomosoft y 
 * Compañeros de trabajos implicados... Prohíbida la implementación
 * Arbitraria de este mismo... 
 */
 
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