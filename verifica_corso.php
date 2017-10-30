<?php 
// questa pagina dinamica controlla che i dati di iscrizione siano corretti; se no ridirige
// alla pagina di iscrizione, se si' alla pagina iniziale del sito (home.php)
require "libreria.php";
// se mancano dati...
if (empty($_POST['nome']) || empty($_POST['descrizione'])) {
  header('Location:inserisci_corso.php?errore=mancainput');
} else
try{  
  $dbconn = connessione();
  // si controlla che il nome utente esista gia' (e si avvisa l'utnte ridirigendolo a iscrizione.php
  // con l'opportuno parametro di errore
  $statement = $dbconn->prepare('select count(*) from corsi where nome = ?');
  $statement->execute(array($_POST['nome']));
  $rec = $statement->fetch();
  if ($rec[0] == 1) {               // utente gia' inserito
    header('Location:inserisci_corso.php?errore=corsoesistente');
  } else {
    $stat = $dbconn->prepare('select nuovo_corso(?,?)');  // si inserisce il nuovo utente nel db
    $stat->execute(array($_POST['nome'],$_POST['descrizione']));
    // si ridirige l'utente alla pagina centrale del sito.
    //ILARIA : SECONDO ME BISOGNA DARE LA CONFERMA CHE IL CORSO ESISTE ORA
    header('Location:homepage.php');
  }
} catch (PDOException $e) { echo $e->getMessage(); }
?>
