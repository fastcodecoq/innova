<?php

   $id = $_GET["id"];
   $id_slider = $_GET["id_slider"];


?>

<!DOCTYPE html>
<html lang='es-CO'>
<head>

    <title>test port</title>


    <style type="text/css" >

        @import "../css/botones.css";

        input[type='text'],select{

            height: 35px;
            padding: 3px;
            box-shadow: inset 0 0 5px #666;
            border:1px solid #888;
            font-size: .8em;

        }

    </style>

</head>
<body>

  <form action="slider.php" method="post" enctype="multipart/form-data">

      <table style='height: 200px'>
          <tr style="position:fixed; right:30; bottom:10px; z-index: 0"><td>Imagen</td><td><input type="file" name="slide" style="color:white"/> </td></tr>
          <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <input type="hidden" name="id_slider" value="<?php echo $id_slider; ?>" />
          <input type="hidden" name="action" value="3" />
          <input type="hidden" name="dialog" value="3" />
      </table>

      <input type="submit" value="Cargar" class="boton-gomo verde" style="position:fixed; right:10px; bottom:10px; z-index: 100000;" />

  </form>

</body>
</html>