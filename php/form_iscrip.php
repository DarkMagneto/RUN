<?php
  /*****************************************
  *  importation des bibliotheque utilisé
  *****************************************/
  require_once('./bibli_fonc.php');

// bufferisation des sorties
ob_start();


$nom = $_POST['logname'];
$email = $_POST['logemail'];
$mdp = $_POST['logpass'];
$numcourse = 0;
$status = 0;
$longitude = 0;
$latitude = 0;
// démarrage de la session
session_start();

$bd = DarckAsce_bd_connecter();
$sql = "INSERT INTO `participant` (`nom`,`email`, `mdp`,`numcourse`, `status`,`longitude`, `latitude`)
VALUES  ('{$nom}','{$email}', '{$mdp}', '{$numcourse}', {$status}, '$longitude', $latitude)";
DarckAsce_run_sql($sql,$bd);
  

// si l'utilisateur est déjà authentifié
if (isset($_SESSION['user'])){
  header ('location: ./form_valid.php');
  exit();
}
// génération de la page
DarckAsce_aff_debut("Utilisateur", 'http://localhost/PWA/img/bgv192svg.svg','http://localhost/PWA/style.css',"http://localhost/PWA/js/mapCourse.js");
Darckasce_entete_menu();
//
//
Darckasce_aff_menustyle();
//
DarckAsce_aff_pied();

DarckAsce_aff_fondecrant();
ob_end_flush(); //FIN DU SCRIPT


?>
