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

  $sql = "SELECT password FROM Utenti WHERE email = " . "'" . $email . "'";

   $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

   if ($result->num_rows > 0) { /* verifica se ci sono risultati */
     $row = $result->fetch_assoc();  /* legge le righe che escono dalla query per poi creare il menu dropdown */

     if(password_verify($password, $row["password"])) { /* verifica la password inserita */
       session_start();
       $_SESSION["gestore"] = 0;
       $_SESSION["email"] = $email;

       header('Location: home_utente.php');
     }
     else {
       echo "Password non corretta";
     }

   } else {
       echo "Utente non registrato";
     }

     $conn->close();
?>
</div>