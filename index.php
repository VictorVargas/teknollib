<?php
  include('tools/connection.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Teknol lip</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="text-center">
        <img src="img/logo-teknol-grande.png"/>
        <h1>
          Bienvenido a la libreria de tekno
        </h1>
      </div>

      <?php
      $str = "";
      $sql = 'SELECT name, email, comment FROM contact;';

      if ($result = $mysqli->query($sql)) {
        while ($obj = $result->fetch_object()) {
          $str .= "<tr>
            <td>
            $obj->name
            </td>
            <td>
            $obj->email
            </td>
            <td>
            $obj->comment
            </td>";
        }
      }

      $result->close();
      unset($obj);
      unset($sql);
      unset($query);
      ?>

      <h2>Comentarios registrados</h2>
      <table class="table">
        <tr>
          <th>
            Nombres
          </th>
          <th>
            Correo
          </th>
          <th>
            Comentario
          </th>
          <?php echo $str ?>
        </tr>
    </table>
  </div>
  </body>
</html>
