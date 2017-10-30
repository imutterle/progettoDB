<?php
// Questo file viene sempre incluso all'inizio dei files .php

// da eseguire per produrre stampe di errore visibili nelle pagine di risposta
error_reporting(E_ALL & ~E_NOTICE);

// alcune funzioni di utilita' comune alle varie pagine
  // verifica se esiste una sessione attiva (l'utente si e' autenticato)
  // altrimenti ri-indirizza alla pagina di "ingresso" (index.php)
  function controllo_accesso() {
    session_start();
    if (empty($_SESSION['nome_utente'])) {
      header('Location:index.php');
    }
  }
  // crea una connessione al database
  function connessione() {
     $dbconn = new PDO('pgsql:host=dblab.dsi.unive.it;port=5432;dbname=a2016u79','a2016u79','Ud0NkC8p');
     $dbconn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $dbconn;
  }


?>

