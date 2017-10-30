<?php 
require "libreria.php";
//controllo_accesso();
    if (empty($_POST['testo'])) {
      header('Location:inserisci_appunto.php?errore=mancainput');
    }
    else{
        try{  
            $dbconn = connessione();
            $stat = $dbconn->prepare('select nuovi_appunti(?,?,?)');  // si inseriscono i nuovi appunti nel db
            $stat->execute(array($_SESSION['nome_utente'],$_POST['testo'],$_SESSION['idlezione']));
            // si ridirige l'utente alla pagina appunti.
            header('Location:lista_appunti.php?idlezione='.$_SESSION['idlezione']);

        } catch (PDOException $e) { echo $e->getMessage(); }
    }
    
    ?>

