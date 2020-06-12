<!DOCTYPE html>
<html>
<head>
  <title> Raduni disponibili </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="box">

<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1 || $_SESSION["email"] != NULL) {
  $sql = "SELECT nome, descrizione, data, ora, via, civico, comune, provincia, regione, nazione FROM Raduni, Luoghi WHERE Raduni.luogo = id_luogo ORDER BY data DESC, ora DESC";

  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

  echo "
        <table>
          <thead>
            <tr>
              <th>NOME</th>
              <th>DESCRIZIONE</th>
              <th>DATA</th>
              <th>ORA</th>
              <th>VIA</th>
            </tr>
          </thead>
      ";


  if ($result->num_rows > 0) { /* verifica se ci sono risultati */
    while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
              echo "<tr>"
              . "<td>" . $row["nome"] . "</td>"
              . "<td>" . $row["descrizione"] . "</td>"
              . "<td>" . $row["data"] . "</td>"
              . "<td>" . $row["ora"] . "</td>"
              . "<td>" . $row["via"] . ", " . $row["civico"] . ", " . $row["comune"] . ", " . $row["provincia"] . ", " . $row["regione"] . ", " . $row["nazione"] . "</td>"
              . "</tr>";
          }

  }

  echo "</table>";

  if($_SESSION["email"] != NULL) { /*mantiene la sessione attiva se sei collegato come utente */


    ?> 
    <br></br>
    <h3> Iscrizioni effettuate </h3>
    <br></br>

    <?php

    echo "
          <table>
            <thead>
              <tr>
                <th>NOME</th>
                <th>DESCRIZIONE</th>
                <th>DATA</th>
                <th>ORA</th>
                <th>VIA</th>
              </tr>
            </thead>
        ";

    $sql = "SELECT id_raduno, Raduni.nome, Raduni.descrizione, Raduni.data, Raduni.ora, via, civico, comune, provincia, regione, nazione FROM Raduni, Iscrizioni, Utenti, Luoghi WHERE id_raduno = Iscrizioni.raduno AND Iscrizioni.utente = id_utente AND id_luogo = Raduni.luogo AND Utenti.email = '".$_SESSION["email"]."' ORDER BY data DESC, ora DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) { /* verifica se ci sono risultati */

      while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
                echo "<tr>"
                . "<td>" . $row["nome"] . "</td>"
                . "<td>" . $row["descrizione"] . "</td>"
                . "<td>" . $row["data"] . "</td>"
                . "<td>" . $row["ora"] . "</td>"
                . "<td>" . $row["via"] . ", " . $row["civico"] . ", " . $row["comune"] . ", " . $row["provincia"] . ", " . $row["regione"] . ", " . $row["nazione"] . "</td>"
                . "</tr>";
            }

      echo "</table>";



    }

    ?>
    <br>
    <br>
    <a href="iscrizione_raduno.php">Aggiungi Iscrizione</a>
    <br><br>
    <a href="cancellazione_iscrizione.php">Cancella Iscrizione</a>
    <br><br>
    <a href="home_utente.php">Indietro</a> <?php


  }
  else if($_SESSION["gestore"] == 1) {
    ?> <a href="home_gestore.php">Indietro</a> <?php
  }
}

 ?>
</div>