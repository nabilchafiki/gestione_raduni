<!DOCTYPE html>
<html>
<head>
  <title> Iscrizione raduno </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["email"] != NULL) { /*mantiene la sessione attiva se sei collegato come utente */

  ?>

  <h3>Raduni Disponibili all'Iscrizione</h3>
  <br>
    <form action="insert_iscrizione.php" method="get">
      Raduno
      <select name="raduno" id = "raduno">

        <?php

        $sql = "SELECT id_raduno, Raduni.nome, Raduni.data, Raduni.ora, Luoghi.via, Luoghi.civico, Luoghi.comune, Luoghi.provincia, Luoghi.regione, Luoghi.nazione FROM Raduni, Luoghi WHERE Raduni.luogo = id_luogo AND Raduni.id_raduno NOT IN (SELECT id_raduno FROM Iscrizioni, Utenti, Raduni WHERE iscrizioni.utente = id_utente AND Iscrizioni.raduno = id_raduno AND email = '".$_SESSION["email"]."')";
        $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

        if ($result->num_rows > 0) { /* verifica se ci sono risultati */
          while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
                    ?> <option value = <?php echo $row["id_raduno"]?>> <?php echo $row["nome"] . " " . $row["data"] . " " . $row["ora"] . " (Via " . $row["via"] . " " . $row["civico"] . ", " . $row["comune"] . ", " . $row["provincia"] . ", " . $row["regione"] . ", " . $row["nazione"] . ")" ?> </option> <?php
                }
        }

         ?>

     </select>
        <br><br>
        <button type="submit"> Registrati </button>
    </form>


  <br><br>
  <a href="home_utente.php">Indietro</a> <?php


}
