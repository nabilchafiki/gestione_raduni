<!DOCTYPE html>
<html>
<head>
  <title> Visualizza le iscrizioni </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">
<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) { /*mantiene la sessione attiva se sei collegato come gestore */

  $sql = "SELECT id_iscrizione, Utenti.nome, Utenti.cognome, Utenti.email, id_raduno, Luoghi.via, Luoghi.civico, Luoghi.comune, Luoghi.provincia, Luoghi.regione, Luoghi.nazione, Raduni.data, Raduni.ora FROM Iscrizioni, Utenti, Luoghi, Raduni WHERE Iscrizioni.raduno = id_raduno AND Raduni.luogo = id_luogo AND id_utente = Iscrizioni.utente ORDER BY data DESC, ora DESC";

  $result = $conn->query($sql);  /* esegue la query richiesta e ottiene il risultato */

  echo "
        <table>
          <thead>
            <tr>
              <th>CODICE ISCRIZIONE</th>
              <th>NOME</th>
              <th>COGNOME</th>
              <th>EMAIL</th>
              <th>CODICE RADUNO</th>
              <th>LUOGO RADUNO</th>
              <th>DATA</th>
              <th>ORA</th>
            </tr>
          </thead>
      ";


  if ($result->num_rows > 0) { /* verifica se ci sono risultati */
    while($row = $result->fetch_assoc()) {  /* legge le righe che escono dalla query per poi creare il menu dropdown */
              echo "<tr>"
              . "<td>" . $row["id_iscrizione"] . "</td>"
              . "<td>" . $row["nome"] . "</td>"
              . "<td>" . $row["cognome"] . "</td>"
              . "<td>" . $row["email"] . "</td>"
              . "<td>" . $row["id_raduno"] . "</td>"
              . "<td>" . $row["via"] . ", " . $row["civico"] . ", " . $row["comune"] . ", " . $row["provincia"] . ", " . $row["regione"] . ", " . $row["nazione"] . "</td>"
              . "<td>" . $row["data"] . "</td>"
              . "<td>" . $row["ora"] . "</td>"
              . "</tr>";
          }

  }

  echo "</table>";

  $sql = "SELECT id_raduno, nome FROM Raduni ";
  $result = $conn->query($sql);

  ?> <br><br><form action="visualizza_raduno_specifico.php" method="get">
    Raduno
    <select name="raduno" id = "raduno"> <?php

  if ($result->num_rows > 0) { /* verifica se ci sono risultati */
    while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
              ?> <option value = <?php echo $row["id_raduno"]?>> <?php echo $row["nome"]  ?> </option> <?php
          }
  }

    ?>

  </select>
     <br><br>
     <button type="submit"> Visualizza Partecipanti   Raduno </button>
 </form>



    <br><br>
    <a href="home_gestore.php">Indietro</a> <?php
}

 ?>
</div>