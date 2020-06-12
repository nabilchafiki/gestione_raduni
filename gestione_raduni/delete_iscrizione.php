<!DOCTYPE html>
<html>
<head>
  <title> Cancella l'iscrizione </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="box">

<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["email"] != NULL) { /*mantiene la sessione attiva se sei collegato come utente */
  $sql = "SELECT id_utente FROM Utenti WHERE email = '" . $_SESSION["email"] ."'";
  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */
  $row = $result->fetch_assoc(); /* nelle form crea il menu dropdown */

  $id_utente = $row["id_utente"];
  $id_raduno = $_GET["raduno"];

  if($id_raduno != "" && $id_raduno != NULL) {
    $sql = "DELETE FROM Iscrizioni WHERE $id_utente = utente AND $id_raduno = raduno";
    $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

    if($result) {
      echo "Cancellazione avvenuta con successo";
    }
    else {
      echo "Errore";
    }
  } else {
    echo "Non sei iscritto ad alcun raduno";
  }




  ?>

  <br><br>
  <a href="home_utente.php">Indietro</a> <?php


}
