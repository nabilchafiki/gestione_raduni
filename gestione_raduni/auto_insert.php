<!DOCTYPE html>
<html>
<head>
  <title> Aggiungi auto </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">

<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["email"] != NULL) { /*mantiene la sessione attiva se sei collegato come utente */

  $targa = $_GET["targa"];
  $marca = $_GET["marca"];
  $modello = $_GET["modello"]; /*prende i dati dalla form */
  $anno = $_GET["anno"];
  $tipologia = $_GET["tipologia"];

  $sql = "INSERT INTO Auto (targa, marca, modello, anno, tipologia) VALUES ('$targa', '$marca', '$modello', '$anno', '$tipologia')";
  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

  if($result) {
    $sql = "SELECT id_auto FROM Auto WHERE targa = " . "'" . $targa . "'";
    $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

    if ($result->num_rows > 0) { /* verifica se ci sono risultati */
      $row = $result->fetch_assoc(); /* legge le righe che escono dalla query per poi creare il menu dropdown */

      $sql = "UPDATE Utenti SET Auto = " . $row["id_auto"] . " WHERE Utenti.email = " . "'" . $_SESSION["email"] . "'";
      $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */
    }
  }

  if($result) {
    echo "Inserimento avvenuto con successo";
    ?> <br><br><a href="informazioni_utente.php"> Indietro </a> <?php
  }
  else {
    echo "Errore";
  }

  $conn->close();

}

?>
</div>