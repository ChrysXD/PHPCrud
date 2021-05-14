<?php

include('db.php');

if (isset($_POST['save_data'])) {
  $nombre = $_POST['name'];
  $telefono = $_POST['phone'];
  $email = $_POST['mail'];
  $query = "INSERT INTO registro(nombre, telefono, mail) VALUES ('$nombre', '$telefono', '$email')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Los datos han sido guardados satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
