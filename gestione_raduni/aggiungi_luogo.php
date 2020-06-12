<!DOCTYPE html>
<html>
<head>
  <title> Aggiungi luogo </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="contenitore">

<?php

include('db.php');
error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) { /* mantiene la sessione attiva se sei collegato come gestore */
  ?>

  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
      <h3>Inserisci Nuovo Luogo</h3>
      <br>
        <form action="luogo_insert.php" method="get">
              Via
              <input placeholder="Via" name="via" id="via" type="text" required>
              <br><br>
              Civico
              <input placeholder="Civico" name="civico" id="civico" type="text" required>
              <br><br>
              Comune
              <input placeholder="Comune" name="comune" id="comune" type="text" required>
              <br><br>
              Provincia
              <input placeholder="Provincia" name="provincia" id="provincia" type="text" required>
              <br><br>
              Regione
              <input placeholder="Regione" name="regione" id="regione" type="text" required>
              <br><br>
              Nazione
              <input placeholder="Nazione" name="nazione" id="nazione" type="text" required>
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