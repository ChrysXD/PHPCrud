<?php
session_start();

$conn = mysqli_connect(
  'localhost', //Host
  'root', //Usuario
  '', //Contraseña
  'crud' //Nomre de la base de datos
) or die(mysqli_erro($mysqli));

?>
