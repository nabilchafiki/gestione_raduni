<!DOCTYPE html>
<html>
<head>
  <title> Carica il documento </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="box">

<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) { /*mantiene la sessione attiva se sei collegato come gestore */
  $sql = "SELECT id_utente, email FROM Utenti";
  $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */
  ?>

  <form action="insert_documento.php" method="get">
    Utente
    <select name="utente" id = "utente"> <?php

  if ($result->num_rows > 0) { /* verifica se ci sono risultati */
    while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
              ?> <option value = <?php echo $row["id_utente"]?>> <?php echo $row["email"]  ?> </option> <?php
          }
  }


    ?>
    </select>
    <br><br>
    Percoso documento
    <input placeholder="Documento" name="documento" id="documento" type="text" required>
    <br><br>
    <button type="submit"> Carica </button>
    <button type="reset"> Cancel </button>
</form>

    <a href="home_gestore.php">Indietro</a> <?php
}

 ?>
</div>