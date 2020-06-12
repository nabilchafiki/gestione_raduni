<!DOCTYPE html>
<html>
<head>
  <title> Aggiungi raduno </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">

<?php
  include('db.php');
  error_reporting(E_ALL);

  $email = $_POST["email"];
  $password = $_POST["password"];

     if(password_verify($password, "$2y$10$/XKWZlN7iGEEP6QSTCTNhe5lTdLqMPYKeVJTxYYsigjS/qXh8iV2m") && $email == "gestore.raduni@gmail.com") {
       session_start();
       $_SESSION["email"] = "";
       $_SESSION["gestore"] = 1; /* definisco la variabile per verificare se la sessione del gestore è attiva o meno */

       header('Location: home_gestore.php');
     }
     else {
       echo "Password non corretta";
     }

     $conn->close();
?>
</div>
