<?php 
  /*  Pagina dinamica che mostra il risultato di una ricerca per parola. La parola ricercata
   *  viene passata come parametro attraverso l'url. Si esegue la query di ricerca (con la
   *  funzione php domande dentro libreria.php e si stampano i risultati con un foreach
   */
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Lista dei trovati</title>
</head>
<body>
  <h1>Elenco dei corsi trovati</h1>
  <p>La ricerca della parola <?php echo $_GET['corso']?> nella lista dei corsi ha prodotto la seguente lista:</p>
<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  try {
        $dbconn = connessione() ;
     echo "<table > <tr><th>autore</th><th>testo</th></tr> ";
    if (empty($_POST['nome'])){
 
          $stat = $dbconn->prepare('select * from appunti where testo LIKE ? order by datapublicazione');
          $stat->execute(array('%'.$_POST['testo'].'%'));

    }else{
          $stat = $dbconn->prepare('select * from appunti where autore= ? order by datapublicazione');
          $stat->execute(array($_POST['nome']));
    }
    
    
    foreach($stat as $record) { 
      echo "<tr>";
      echo "<td> $record[autore] </br> publicato il </br> $record[datapublicazione] </a></td> " ;
      echo "<td>  <p></p> $record[testo] </p></td> " ;          
      echo "</tr>";      
  } 
  echo "</table>";
} catch (PDOException $e) { echo $e -> getMessage(); }

?>
<p> <a href="homepage.php">Ritorna alla pagina principale</a> </p>
</body>
</html>
