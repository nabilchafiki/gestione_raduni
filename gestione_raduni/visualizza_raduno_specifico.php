<!DOCTYPE html>
<html>
<head>
  <title> Visualizza raduno </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) { /*mantiene la sessione attiva se sei collegato come gestore */
  $id_raduno = $_GET["raduno"];

  $sql = "SELECT id_raduno, nome, descrizione, Luoghi.via, Luoghi.civico, Luoghi.comune, Luoghi.provincia, Luoghi.regione, Luoghi.nazione, Raduni.data, Raduni.ora FROM Raduni, Luoghi WHERE id_luogo = Raduni.luogo AND id_raduno = $id_raduno";
  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */
  $row = $result->fetch_assoc(); /* legge le righe che escono dalla query per poi creare il menu dropdown */

  echo "Id Raduno: " . $row["id_raduno"] . "<br>";
  echo "Nome: " . $row["nome"] . "<br>";
  echo "Descrizione: " . $row["descrizione"] . "<br>";
  echo "Luogo: Via " . $row["via"] . " " . $row["civico"] . ", " . $row["comune"] . ", " . $row["provincia"] . ", " . $row["regione"] . ", " . $row["nazione"] . "<br>";
  echo "Data e ora: " . $row["data"] . " " . $row["ora"];

  $sql = "SELECT id_iscrizione, Utenti.nome, Utenti.cognome, Utenti.email, id_raduno, Luoghi.via, Luoghi.civico, Luoghi.comune, Luoghi.provincia, Luoghi.regione, Luoghi.nazione, Raduni.data, Raduni.ora FROM Iscrizioni, Utenti, Luoghi, Raduni WHERE Iscrizioni.raduno = id_raduno AND Raduni.luogo = id_luogo AND id_utente = Iscrizioni.utente AND id_raduno = $id_raduno ORDER BY data DESC, ora DESC";

  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

  echo "<br><br>
        <table>
          <thead>
            <tr>
              <th>CODICE ISCRIZIONE</th>
              <th>NOME</th>
              <th>COGNOME</th>
              <th>EMAIL</th>
            </tr>
          </thead>
      ";


  if ($result->num_rows > 0) { /* verifica se ci sono risultati */

    while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
              echo "<tr>"
              . "<td>" . $row["id_iscrizione"] . "</td>"
              . "<td>" . $row["nome"] . "</td>"
              . "<td>" . $row["cognome"] . "</td>"
              . "<td>" . $row["email"] . "</td>"
              . "</tr>";
          }

  }

  echo "</table>"; ?>



    <br><br>
    <a href="visualizza_iscrizioni.php">Indietro</a> <?php
}

 ?>
