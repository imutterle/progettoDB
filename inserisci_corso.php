<?php
  require "libreria.php";
  //controllo_accesso();
  ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
        <title>Inserire un corso</title>
    </head>

<h1>Inserisci corso:</h1>

<fieldset>
<form action="verifica_corso.php" method="post">
  <p >Nome:</p>
  <input type="text" name="nome" value="">
  <br>

   <?php 
	if($_GET['errore']==corsoesistente)
	echo "<font color=F0E68C>corso gia presente nel database</font>";
  
        if($_GET['errore']==mancainput)
        echo "<font color=F0E68C>dato mancante!</font>";
        ?>

  <p >Descrizione:</p>

   <textarea type="text" name="descrizione" rows="20" cols="30"> </textarea>
   <br>
  <br><br>
  <input type="submit" value="Salva">

</form>
  <br>
<a class="button" href="homepage.php">torna alla home</a> 


</body>

</html>
