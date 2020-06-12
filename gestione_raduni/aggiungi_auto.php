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
  ?>

  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
      <h3>Inserisci Nuovo Veicolo</h3>
      <br>
        <form action="auto_insert.php" method="get">
              Targa
              <input placeholder="Targa" name="targa" id="targa" type="text" required>
              <br><br>
              Marca
              <input placeholder="Marca" name="marca" id="marca" type="text" required>
              <br><br>
              Modello
              <input placeholder="Modello" name="modello" id="modello" type="text" required>
              <br><br>
              Anno
              <input placeholder="Anno" name="anno" id="anno" type="number" required>
              <br><br>
              Tipologia
              <select name="tipologia" id = "tipologia">

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

  <?php



}




?>
</div>