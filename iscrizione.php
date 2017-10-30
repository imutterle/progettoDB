<?php require "libreria.php"
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Iscrizione al sito</title>
    </head>
    
    <body>
        <h1>Iscrizione al sito</h1>
        <p> Per iscriversi &egrave; necessario fornire un nome utente
        e una password</p>
        <p>
        <?php
            if ($_GET['errore'] == 'utenteesistente') {
              echo "<font color=red>Spiacente, il nome utente inserito &egrave; gi&agrave; in uso</font>";
            } elseif ($_GET['errore'] == 'mancainput') {  // ci sono tutti i dati obbligatori?
              echo "<font color=red>Devi dare sia login che password!</font>";
            } ; ?>        
        </p>
        
        <form action="verifica_iscrizione.php" method="post">
            <table><tr><td>Login:</td><td><input type="text" name="login"></td></tr>
                   <tr><td>Password:</td><td><input type="password" name="password"></td></tr>
            </table>
            <input type="submit" value="Iscrivimi">
        </form>
    </body>
</html>

