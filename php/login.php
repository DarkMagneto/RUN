<?php
require_once('./bibli_fonc.php');
// bufferisation des sorties
ob_start();

// démarrage de la session
session_start();

if (!isset($_SESSION['user'])){
    header ('location: ../index.html');
    exit();
  }   
// génération de la page
DarckAsce_aff_debut("Connexion/Inscription", 'http://localhost/PWA/img/bgv192svg.svg','http://localhost/PWA/style.css',"http://localhost/PWA/index.js");

DarckAsce_aff_maps();

DarckAsce_aff_pied();

ob_end_flush(); //FIN DU SCRIPT

// fin du script
ob_end_flush();



?>
