<?php


header("Content-type : application/json , charset = 'utf-8'");

    $correo = "info@innovaespacios.co";



  $datos = array(
  
    "de" => (!empty($_POST["mail"]) and isset($_POST["mail"]) ) ? $_POST["mail"] : false,
	"msg" => (!empty($_POST["msg"]) and isset($_POST["msg"]) ) ? $_POST["msg"] : false,
	"nombre" => (!empty($_POST["nombre"]) and isset($_POST["nombre"]) ) ? $_POST["nombre"] : false
  
  );
  
  if( !filter_var($datos["de"],FILTER_VALIDATE_EMAIL) )
           $datos["de"] = false;
		   
  
   foreach($datos as $val){
   
       if(!$val){

           echo json_encode(array(

               "estado" => "0",
               "detalle" => $key

           ));

       }

   }


$subject = "InnovaWeb sugerencias ({$datos['de']})";

$headers = "From: " . $datos['de'] . "\r\n";
$headers = 'Content-type: text/plain; charset=utf-8' . "\r\n";
$headers = 'Reply-To: '. $datos['de'] . "\r\n";
$headers =  'X-Mailer: PHP/' . phpversion();

if(mail($correo,$subject,$datos["msg"],$headers))

  echo json_encode(array(
      "estado" => "1"
  ));

else
    echo json_encode(array(

        "estado" => "0",
        "detalle" => "no se pudo hacer mail"

    ));
