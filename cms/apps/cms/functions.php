<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gomosoft
 * Date: 23/04/12
 * Time: 09:11 PM
 * To change this template use File | Settings | File Templates.
 */


function extend($a, $b) {
    foreach($b as $k=>$v) {
        if( is_array($v) ) {
            if( !isset($a[$k]) ) {
                $a[$k] = $v;
            } else {
                $a[$k] = array_extend($a[$k], $v);
            }
        } else {
            $a[$k] = $v;
        }
    }
    return $a;
}


function valida_act(){

    return true;

}

