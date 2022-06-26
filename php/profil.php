<?php
require_once('./bibli_fonc.php');

ini_set('display_errors', true);
error_reporting(E_ALL ^ E_NOTICE);

// bufferisation des sorties
ob_start();

// démarrage de la session
session_start();

// si l'utilisateur est déjà authentifié
if (!isset($_SESSION['user'])){
    header ('location: ../index.html');
    exit();
}

  $pdostatx = $db->query('SELECT * FROM `participant` WHERE `email` LIKE "'.$_SESSION["user"].'"');
  $infoparticipant = $pdostatx->fetchAll(PDO::FETCH_ASSOC);



// génération de la page
DarckAsce_aff_debut("Profil", 'https://darkmagneto.github.io/RUN/img/bgv192svg.svg','https://darkmagneto.github.io/RUN/style.css',"https://darkmagneto.github.io/RUN/index.js");
Darckasce_entete_menu();


//Darckasce_aff_menu($_SESSION['user'], array(true, true));
//the museum markers
foreach ($infoparticipant as $ligne) {
  echo '<div class="container">
  <div class="row g-2">
    <div class="col-6">
      <div class="p-3 border bg-light">Participant: '.$ligne["nom"].'</div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light">Numero : '.$ligne["num"].'</div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light">'.$ligne["longitude"].'</div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light">'.$ligne["latitude"].'</div>
    </div>
  </div>
</div>';
}

Darckasce_aff_menustyle();


DarckAsce_aff_pied();

ob_end_flush(); //FIN DU SCRIPT

?>
