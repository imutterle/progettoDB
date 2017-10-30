<?php require "libreria.php";
  // pagina sostanzialmente statica, a parte il controllo dell'accesso iniziale
  
  controllo_accesso();?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ricerca</title>
  </head>
  <body>
  <h3>Ricerca per corso </h3>
    <form action="esegui_ricerca.php" method="post">
      <p>Scrivi il nome del corso:</p> 
      <input type="text" name="parola">
      <p>
      <input type="submit" value="Cerca">
      </p>
    </form>
  <h3>Ricerca per testo all'interno dell'appunto</h3>
    <form action="esegui_ricerca.php" method="post">
      <p>Scrivi la parola che deve essere ricercata nel testo:</p> 
      <input type="text" name="parola">
      <p>
      <input type="submit" value="Cerca">
      </p>
    </form>
  
  
  
  
    <h1>Ricerca per AUTORE oppure per TESTO</h1>

    <fieldset>

    <form action="esegui_ricerca.php" method="post">
      <p >Per Autore:</p>
      <input type="text" name="nome" value="">
      <br>
      <p >Per Testo:</p>
       <textarea type="text" name="testo" rows="20" cols="30"> </textarea>
       <br>
      <br><br>
      <input type="submit" value="Cerca">
    </form>
      <br>
<!-- Guardare qui che qualcosa non va -->
       <?php 
            if($_GET['errore']==mancainput)
                    echo "<font color=F0E68C>dati mancanti mancante!</font>";
      ?>

    </fieldset>
  </body>
</html>

