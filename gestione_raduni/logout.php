<?php

session_start();

$_SESSION["email"] = NULL;
$_SESSION["gestore"] = 0;

header('Location: index.html');

 ?>
