<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gomosoft
 * Date: 30/03/12
 * Time: 03:08 AM
 * To change this template use File | Settings | File Templates.
 */


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

