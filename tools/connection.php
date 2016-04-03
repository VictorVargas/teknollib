<?php
$mysqli = new mysqli('localhost', 'teknol', '123456', 'teknoltest');
/* comprobar la conexión */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

?>
