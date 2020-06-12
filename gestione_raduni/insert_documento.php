<!DOCTYPE html>
<html>
<head>
  <title> Inserisci il documento </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) { /*mantiene la sessione attiva se sei collegato come gestore */

  $utente = $_GET["utente"];
  $documento = $_GET["documento"];

  $sql = "UPDATE Utenti SET documento = '$documento' WHERE id_utente = $utente";
  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

  if($result) {
    echo "Inserimento avvenuto con successo";
    ?> <br><br><a href="home_gestore.php"> Indietro </a> <?php
  }
  else {
    echo "Errore";
  }

  $conn->close();

}

?>
</div>