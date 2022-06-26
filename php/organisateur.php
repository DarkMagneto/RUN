<?php
require_once('./bibli_fonc.php');

ini_set('display_errors', true);
error_reporting(E_ALL ^ E_NOTICE);

// bufferisation des sorties
ob_start();

// démarrage de la session
session_start();

  $pdostatx = $db->query('SELECT DISTINCT `nomcourse`  FROM `course` ');
  $lines_course = $pdostatx->fetchAll(PDO::FETCH_ASSOC);

  $pdostatb = $db->query('SELECT * FROM `participant`');
  $lines_participant = $pdostatb->fetchAll(PDO::FETCH_ASSOC);

// génération de la page
DarckAsce_aff_debut("Organisateur", 'https://darkmagneto.github.io/RUN/img/bgv192svg.svg','https://darkmagneto.github.io/RUN/style.css',"https://darkmagneto.github.io/RUN/js/geoloc.js");
Darckasce_entete_menu();

?>
<div id="container" style="display:none">
<?php echo json_encode($lines_participant); ?>
</div> 

<?php
DarckAsce_aff_maps();
Darckasce_aff_menustyle();
DarckAsce_aff_pied();
ob_end_flush(); //FIN DU SCRIPT

?>
