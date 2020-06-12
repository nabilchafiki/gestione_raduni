<!DOCTYPE html>
<html>
<head>
  <title> Rimuovi un veicolo </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["email"] != NULL) { /*mantiene la sessione attiva se sei collegato come utente */
  $sql = "SELECT auto FROM Utenti WHERE email = " . "'" . $_SESSION["email"] . "'";

  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

  if ($result->num_rows > 0) { /* verifica se ci sono risultati */
    $row = $result->fetch_assoc(); /* legge le righe che escono dalla query per poi creare il menu dropdown */

    $id_auto = $row["auto"];

    $sql = "UPDATE Utenti SET auto = NULL WHERE email = " . "'" . $_SESSION["email"] . "'";
    $conn->query($sql);

    $sql = "DELETE FROM Auto WHERE id_auto = " . $id_auto;
    $conn->query($sql);

    header('Location: informazioni_utente.php');
  }
}

 ?>
