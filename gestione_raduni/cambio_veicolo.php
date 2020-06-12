<!DOCTYPE html>
<html>
<head>
  <title> Cambia veicolo </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["email"] != NULL) { /*mantiene la sessione attiva se sei collegato come utente */
  $sql = "INSERT INTO Auto WHERE email = " . "'" . $_SESSION["email"] . "'";

  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

  if ($result->num_rows > 0) {  /* verifica se ci sono risultati */
    $row = $result->fetch_assoc(); /* legge le righe che escono dalla query per poi creare il menu dropdown */

    echo "Nome: " . $row["nome"] . "<br><br>";
    echo "Cognome: " . $row["cognome"] . "<br><br>";
    echo "Data di Nascita: " . $row["data_nascita"] . "<br><br>";
    echo "Codice Fiscale: " . $row["cf"] . "<br><br>";
    echo "Email: " . $row["email"] . "<br><br>";
  }


  $sql = "SELECT * FROM Auto WHERE id_auto = " . "'" . $row["auto"] . "'";

  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

  if ($result->num_rows > 0) { /* verifica se ci sono risultati */
    $row = $result->fetch_assoc(); /* nelle form crea il menu dropdown */

    echo "Targa Autoveicolo: " . $row["targa"] . "<br><br>";

    ?> <a href="cambio_veicolo.php">Cambia il veicolo</a> <?php
  }
  else {
    ?> <a href="insert_auto.php">Aggiungi un veicolo</a> <?php
  }
}

 ?>
</div>