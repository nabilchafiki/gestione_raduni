<!DOCTYPE html>
<html>
<head>
  <title> Home utente</title>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
</head>

<div class="box">

<?php

error_reporting(E_ALL);

session_start();

if($_SESSION["email"] != NULL) { /*mantiene la sessione attiva se sei collegato come utente */

  ?>
<h3> Menu Azioni </h3>

<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<br>
<br>

<a href="informazioni_utente.php">Informazioni Utente</a>
<br>
<br>
<a href="raduni_disponibili.php">Raduni Disponibili</a>
<br>
<br>
<a href="logout.php">Esci dall'account</a>
<br>
<br>

<?php } ?>
</div>