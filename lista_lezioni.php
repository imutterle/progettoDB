<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE html>

<html>

<head>

  <title>lezioni</title>
  <link type="text/css" rel="stylesheet" />
  <meta charset="UTF-8">

</head>

<h1> Lezioni</h1>

<body>

<ul>
  <li><a href="inserisci_lezione.php">Inserisci una lezione per questo corso</a></li>
  <!--<li><a href="uscita.php">Esci dal Sito</a></li>-->

</ul>
<h1>Elenco Lezioni <?php echo $_GET['corso']?></h1>
<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  try {
        $dbconn = connessione() ;
        /* si salva il nome del corso nella sessione, per permettere di riconoscere il corso nello script chiamato*/
         $_SESSION['corso'] = $_GET['corso'];
      echo "<table > <tr><th>data lezione</th> <th>argomento</th></tr> ";
    
     $stat = $dbconn->prepare('select * from lezioni where corso = ? order by datalezione');
     $stat->execute(array($_GET['corso']));
    
    foreach($stat as $record) { 
      echo "<tr>";
      echo "<td>  <a href=\"lista_appunti.php?idlezione=$record[id] \">$record[datalezione] </a></td> " ;
      echo "<td>  $record[argomento] </td> " ;        
      echo "</tr>";      
  } 
  echo "</table>";
} catch (PDOException $e) { echo $e -> getMessage(); }

?>

<a class="button" href="homepage.php">torna alla home</a> 
</body>



</html>
