<?php
  require "libreria.php";
  //controllo_accesso();?>
<!DOCTYPE html>

<html>

<head>

  <title>Inserire Appunti</title>
  <link type="text/css" rel="stylesheet"/> 
  <meta charset="UTF-8">

</head>

<body>

<p>Compila il form per inserire gli appunti:</p>

<fieldset>
 
    <form action="verifica_appunto.php?" method="post">
  
        <p>Testo:</p>
        <textarea type="text" name="testo" rows="20" cols="30" ></textarea>
        <br> 
 
        <?php 
            if($_GET['errore']==mancainput)
            echo "<font color=F0E68C>casella vuota!</font>";
  
        ?>
  
    <input type="submit" value="INSERISCI">

</form>
</fieldset>


<a class="button" href="homepage.php">torna alla home</a> 


</body>

</html>

