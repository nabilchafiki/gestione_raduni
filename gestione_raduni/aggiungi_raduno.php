<!DOCTYPE html>
<html>
<head>
  <title> Aggiungi raduno </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">

<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1 || $_SESSION["email"] != NULL) { /* verifica se il gestore o l'utente sono loggati */
  ?>

  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
      <h3>Inserisci Nuovo Raduno</h3>
      <br>
        <form action="raduno_insert.php" method="get">
              Nome
              <input placeholder="Nome" name="nome" id="nome" type="text" required>
              <br><br>
              Descrizione
              <input placeholder="descrizione" name="descrizione" id="descrizione" type="text" required>
              <br><br>
              Data
              <input placeholder="Data" name="data" id="data" type="date" required>
              <br><br>
              Ora
              <input placeholder="Ora" name="ora" id="ora" type="time" required>
              <br><br>
              Luogo

              <select id = "luogo" name="luogo">

                <?php

                $sql = "SELECT id_luogo, via, civico, comune, provincia, regione, nazione FROM Luoghi ORDER BY id_luogo";
                $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

                if ($result->num_rows > 0) { /* verifica se ci sono risultati */
                  while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
                            ?> <option value = <?php echo $row["id_luogo"]?>> <?php echo $row["via"]." ".$row["civico"].", ".$row["comune"].", ".$row["provincia"].", ".$row["regione"].", ".$row["nazione"]  ?> </option> <?php
                        }  /* menu a scelta multipla creato prendendo i dati direttamente dal database */
                }

                 ?>

             </select>
             <br><br>

              Tipologia
              <select id = "tipologia" name="tipologia">

                <?php

                $sql = "SELECT id_tipologia, nome FROM Tipologia ORDER BY id_tipologia";
                $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */


                if ($result->num_rows > 0) { /* verifica se ci sono risultati */
                  while($row = $result->fetch_assoc()) { /* legge le righe che escono dalla query per poi creare il menu dropdown */
                            ?> <option value = <?php echo $row["id_tipologia"]?>> <?php echo $row["nome"]  ?> </option> <?php
                        } /* menu a scelta multipla creato prendendo i dati direttamente dal database */
                }

                 ?>

             </select>
             <br><br>
            <button type="submit"> Aggiungi </button>
            <button type="reset"> Cancella </button>
        </form>
  </body>
  </html>

  <a href="home_gestore.php">Indietro</a>

  <?php

}




?>
</div>