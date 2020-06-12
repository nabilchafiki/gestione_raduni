<?php
  include('db.php');
  error_reporting(E_ALL);

  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT); /* invia in modalità POST la password criptata */
  $nome = $_POST["nome"];
  $cognome = $_POST["cognome"];
  $data_nascita = $_POST["data_nascita"];
  $cf = $_POST["cf"];
  $via = $_POST["via"]; /*prende i dati dalla form */
  $civico = $_POST["civico"];
  $comune = $_POST["comune"];
  $provincia = $_POST["provincia"];
  $regione = $_POST["regione"];
  $nazione = $_POST["nazione"];

  if($email != NULL && $email != "") { /*se mail non è inserita o vuota */

     $sql = "SELECT id_utente FROM Utenti WHERE email = " . "'" . $email . "'";

     $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

     if ($result->num_rows <= 0) { /* verifica se il risultato è vuoto altrimenti non ti fa registrare */
       $sql = "SELECT id_luogo FROM Luoghi WHERE via = " . "'" . $via . "' AND civico = "  . "'" . $civico . "' AND comune = " . "'" . $comune . "' AND provincia = " . "'" . $provincia . "' AND regione = " . "'" . $regione . "' AND nazione = " . "'" . $nazione . "'";

       $result = $conn->query($sql);

       if($result->num_rows > 0) { /* verifica se ci sono risultati */
         $row = $result->fetch_assoc(); /* legge le righe che escono dalla query per poi creare il menu dropdown */
         $id_luogo = $row["id_luogo"];
       }
       else {
         $sql = "INSERT INTO Luoghi (via, civico, comune, provincia, regione, nazione) VALUES ('$via', '$civico', '$comune', '$provincia', '$regione', '$nazione')";

         $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

         $sql = "SELECT id_luogo FROM Luoghi WHERE via = " . "'" . $via . "' AND civico = "  . "'" . $civico . "' AND comune = " . "'" . $comune . "' AND provincia = " . "'" . $provincia . "' AND regione = " . "'" . $regione . "' AND nazione = " . "'" . $nazione . "'";

         $result = $conn->query($sql); /* esegue la query richiesta e ottiene il risultato */

         $row = $result->fetch_assoc(); /* legge le righe che escono dalla query per poi creare il menu dropdown */
         $id_luogo = $row["id_luogo"];
       }

       $sql = "INSERT INTO Utenti (nome, cognome, data_nascita, cf, email, password, residenza) VALUES ('$nome', '$cognome', '$data_nascita', '$cf', '$email', '$password', '$id_luogo')";
       $result = $conn->query($sql);

       if($result) {
         echo "Registrazione avvenuta con successo";
         ?>  <br><br> <a href="index.html">Indietro</a> <?php
       }

     }
     else {
       echo "Utente già in uso";
       ?> <br><br> <a href="registrazione.html">Indietro</a> <?php
     }
  }




?>
