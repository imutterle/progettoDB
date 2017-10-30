<?php
  require "libreria.php";
  controllo_accesso();?>
<!DOCTYPE html>

<html>

<head>

  <title>Lista degli appunti</title>
  <link type="text/css" rel="stylesheet"/>
  <meta charset="UTF-8">

</head>


<body>

<ul>
 
  <li><a href="inserisci_appunto.php">Inserisci appunti per questa lezione</a></li>
  <!--<li><a href="uscita.php">Esci dal Sito</a></li>-->

</ul>

<h1>Elenco Appunti Lezione Selezionata</h1>
<?php 
  error_reporting(E_ALL & ~E_NOTICE);
  try {
        $dbconn = connessione() ;
       /* si salva l'id della lezione nella sessione, per permettere di riconoscere la lezione a cui si riverisce l'appunto*/
       $_SESSION['idlezione'] = $_GET['idlezione']; 
    echo "<table > <tr><th>AUTORE</th><th>TESTO</th></tr> ";
    
     $stat = $dbconn->prepare('select autore,testo,datapublicazione from appunti where idlezione = ? order by datapublicazione');
     $stat->execute(array($_GET['idlezione']));
    
    foreach($stat as $record) { 
      echo "<tr>";
      echo "<td> $record[autore] </br> publicato il: </br> $record[datapublicazione] </td> " ;
      echo "<td> $record[testo] </td>";          
      echo "</tr>";      
  } 
  echo "</table>";
} catch (PDOException $e) { echo $e -> getMessage(); }

?>

<a class="button" style="font-size:200%;" href="home.php">torna alla home</a> 
</body>



</body>

</html>

