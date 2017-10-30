<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
        <title>Sito per lo scambio di appunti di lezioni</title>
    </head>
    <body>
        <h1>Sito per lo scambio di appunti di lezioni</h1>
        <p>Questo sito è stato pensato per scambiarsi e consultare gli appunti delle lezioni</p>

        <p>Se non sei iscritto <a href="iscrizione.php">ISCRIVITI QUI</a>
        oppure entra nel sito facendo il LOG-IN:</p>
        
        <!--CODICE DA CAMBIARE UTILIZZATO PER FARE LE PROVE -->
        
        <!--TERMINA QUI IL MATERIALE DI PROVA -->
        <?php 
            if ($_GET['errore'] == 'utenteesistente') {
            echo "<p><font color=red>Nome utente gi&agrave utilizzato!</font></p>";
          } elseif ($_GET['errore'] == 'mancainput') {
            echo "<p><font color=red>Nome utente o password mancante!</font>i</p>";
          } 
            
        ?>
  <form action="login.php" method="post">
    <table><tr><td>Login:</td><td><input type="text" name="login"></td></tr>
           <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
    </table>
    <input type="submit" value="Login">
  </form>
        
    </body>
</html>
