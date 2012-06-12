<?php


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

  <form action="test_p.php" method="post" enctype="multipart/form-data">

      <table>
          <tr><td>imagen</td><td><input type="file" name="file"/> </td></tr>
          <tr><td>categoria</td><td><select  name="cate">
              <option value="1">Casetas petroleras prefabricadas</option>
              <option value="2">Contenedores marítimos</option>
              <option value="3">Módulos prefabricados importados</option>
              <option value="4">Baños portátiles y servicios de limpieza</option>
          </select> </td></tr>
          <tr>
              <td>Aplicaciones</td>
              <td>
                  <textarea name="apli" cols="30" rows="5">
                  </textarea>
              </td>
          </tr>
          <tr>
              <td>Descripción</td>
              <td>
                  <textarea name="desc" cols="30" rows="7">
                  </textarea>
              </td>
          </tr>

      </table>

      <input type="submit" value="Cargar" class="boton-gomo verde" style="position:fixed; right:0; bottom:0;" />

  </form>

</body>
</html>