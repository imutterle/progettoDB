<?php
  require "libreria.php";
  //controllo_accesso();
  ?>
<!DOCTYPE html>

<html>

<head>

  <title>Inserire una lezione</title>
  <link type="text/css" rel="stylesheet"/> 
  <meta charset="UTF-8">

</head>

    <body>
    <fieldset>

    <form action="verifica_lezione.php?corso= <?php echo $_SESSION['corso']; ?>" method="post">
    <p>Data formato mm/gg/aaaa:  </p>
    <input type="date" name="data" value="">
    <br>
    <p>Argomento Lezione:</p>
       <textarea type="text" name="argomento" rows="20" cols="30"> </textarea>
       <br>

        <?php 
            if($_GET['errore']==lezioneesistente)
            echo "<font color=F0E68C>Lezione gia presente nel database</font>";
     
            if($_GET['errore']==mancainput)
            echo "<font color=F0E68C>Manca qualche dato!</font>";           
        ?>

      <br>
      <br>

      <input type="submit" value="Salva">

    </form>

    </fieldset>
    <a class="button" href="homepage.php">torna alla home</a>


    </body>

</html>

