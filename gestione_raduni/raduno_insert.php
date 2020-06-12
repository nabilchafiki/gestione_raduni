<!DOCTYPE html>
<html>
<head>
  <title> Inserisci raduno </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) { /*mantiene la sessione attiva se sei collegato come gestore */

  $nome = $_GET["nome"];
  $descrizione = $_GET["descrizione"];
  $data = $_GET["data"];
  $ora = $_GET["ora"];
  $luogo = $_GET["luogo"];
  $tipologia = $_GET["tipologia"];

  $sql = "INSERT INTO Raduni (nome, descrizione, data, ora, luogo, tipologia) VALUES ('$nome', '$descrizione', '$data', '$ora', '$luogo', '$tipologia')";
  $result = $conn->query($sql);  /* esegue la query richiesta e ottiene il risultato */

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
