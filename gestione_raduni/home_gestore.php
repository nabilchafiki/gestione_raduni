<!DOCTYPE html>
<html>
<head>
  <title> Home gestore </title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<?php

error_reporting(E_ALL);

session_start();

if($_SESSION["gestore"] == 1) { /*mantiene la sessione attiva se sei collegato come gestore */

?>


<br>
<br>
<div class="box">
<h3> Menu Azioni </h3>
  <br>
  <br>
  <a href="raduni_disponibili.php">Raduni Disponibili</a>
  <br>
  <br>
  <a href="visualizza_iscrizioni.php"> Iscrizioni </a>
  <br>
  <br>
  <a href="aggiungi_raduno.php">Nuovo Raduno</a>
  <br>
  <br>
  <a href="aggiungi_luogo.php">Nuovo Luogo</a>
  <br>
  <br>
  <a href="caricamento_documento.php"> Carica un documento </a>
  <br>
  <br>
  <a href="logout.php">Esci dall'account</a>
  <br>
  <br>
</div>
<?php } ?>
