<?php

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



