<?php
require_once('./bibli_fonc.php');
// bufferisation des sorties
ob_start();
// démarrage de la session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $x = $_POST['x'];
  $y = $_POST['y'];
  $z = $_SESSION["user"];

    $bd = DarckAsce_bd_connecter();
  $sql = 'UPDATE `participant` SET `longitude`='.$y.',`latitude`='.$x.' WHERE `email` = "'. $z.'"';
  DarckAsce_run_sql($sql,$bd);

      // Libération de la mémoire associée au résultat de la requête
      mysqli_free_result($res);

      // Fermeture bdd
      mysqli_close($bd);  
  }


?>