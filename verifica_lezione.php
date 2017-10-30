<?php 
    require "libreria.php";
    //controllo_accesso();
// se mancano dati...
    if (empty($_POST['data'])) {
      header('Location:inserisci_lezione.php?corso='.$_GET['corso']);
    } else{
    try{  
      $dbconn = connessione();
      // si controlla che la lezione esista gia' (e si avvisa l'utente ridirigendolo a iscrizione.php
      // con l'opportuno parametro di errore
      $statement = $dbconn->prepare('select count(*) from lezioni where corso = ? and datalezione = ?');
      $statement->execute(array($_GET['corso'],$_POST['data']));
      $rec = $statement->fetch();
      if ($rec[0] > 0) {               // lezione gia' inserito
        header('Location:inserisci_lezione.php?errore=lezioneesistente');
      } else{
        $stat = $dbconn->prepare('select nuova_lezione(?,?,?)');  // si inserisce la nuova lezione nel db
        $stat->execute(array($_GET['corso'],$_POST['data'],$_POST['argomento']));
        // si ridirige l'utente alla pagina centrale del sito.
        header('Location:lista_lezioni.php?corso='.$_GET['corso']);
      }
    } catch (PDOException $e) { echo $e->getMessage(); }
}
?>
