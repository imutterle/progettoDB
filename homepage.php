<?php 
/*  Pagina principale dell'applicazione. Accoglie l'utente.
 */
  require "libreria.php";
  controllo_accesso();?>   
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Homepage</title>
</head>
<body>
  <h1>Benvenuto nel sito di scambio appunti</h1>
  Benvenuto <b><?php echo $_SESSION['nome_utente']?></b>!
  Queste sono le operazioni che puoi fare:</h1>
  <ul>
    <li> <a href="inserisci_corso.php">Inserire un corso</a> </li>
    <li> <a href="inserisci_appunto.php">Inserire gli appunti</a></li>
    <!--<li> <a href="inserisci_lezione.php">Inserire la lezione</a>-->
    <li> <a href="ricerca.php">Ricercare appunti </a> </li>
    <li> <a href="uscita.php">Uscire dal sito</a></li>
  </ul>

  
<h2>Ecco la lista dei corsi attualmente a disposizione</h2>   
  <?php 
  try {
    $dbconn = connessione();    
    // i dati sono formattati come una tabella HTML
    echo "<table><tr><th>NOME</th><th>DESCRIZIONE</th></tr>";
    $stat = $dbconn->prepare('select nome,descrizione from corsi');
    $stat->execute();
    
    foreach ($stat as $record) {
       echo "<tr><td><a href=\"lista_lezioni.php?corso=$record[nome]\">$record[nome]</a></td><td>$record[descrizione]</td></tr>";
    }
    echo "</table>";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>

<h2>Ecco la lista delle lezioni attualmente a disposizione</h2>   
  <?php 
  try {
    $dbconn = connessione();    
    // i dati sono formattati come una tabella HTML
    echo "<table><tr><th>NOME del CORSO</th><th>DATA DELLA LEZIONE</th><th>ARGOMENTO</th></tr>";
    $stat = $dbconn->prepare('select corso,datalezione,argomento from lezioni');
    $stat->execute();
    
    foreach ($stat as $record) {
       echo "<tr><td><a href=\"lista_lezioni.php?corso=$record[nome]\">$record[corso]</a></td><td>$record[datalezione]</td><td>$record[argomento]</td></tr>";
    }
    echo "</table>";
  } catch (PDOException $e) { echo $e->getMessage(); }
  ?>


</body>
</html>

