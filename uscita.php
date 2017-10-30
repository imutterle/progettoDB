<?php 
  // questa pagina dinamica distrugge la sessione corrente (logout) e ritorna alla pagina di accesso
  session_start();    // attenzione: e' necessaria, altrimenti la sessione non viene distrutta
  session_destroy();
  header('Location:index.php');
?>