<!DOCTYPE html>
<html>
<head>
  <title> Inserisci luogo </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) {  /*mantiene la sessione attiva se sei collegato come gestore */

  $via = $_GET["via"];
  $civico = $_GET["civico"];
  $comune = $_GET["comune"];
  $provincia = $_GET["provincia"]; /*prende i dati dalla form */
  $regione = $_GET["regione"];
  $nazione = $_GET["nazione"];

  $sql = "INSERT INTO Luoghi (via, civico, comune, provincia, regione, nazione) VALUES ('$via', '$civico', '$comune', '$provincia', '$regione', '$nazione')";
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
