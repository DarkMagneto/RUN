<?php
  /*****************************************
  *  importation des bibliotheque utilisé
  *****************************************/
  require_once('./bibli_fonc.php');
  // bufferisation des sorties
ob_start();

// démarrage de la session
session_start();

$_SESSION["user"] = $_POST["logemail"]; 
$_SESSION["pass"] = $_POST["logpass"];  

// si l'utilisateur est déjà authentifié
if (!isset($_SESSION["user"])){
  header ('location: ../index.html');
  exit();
}
//
$pdostatb = $db->query('SELECT * FROM `course`');
$lines_course = $pdostatb->fetchAll(PDO::FETCH_ASSOC);
  
// génération de la page
DarckAsce_aff_debut("Utilisateur", 'https://darkmagneto.github.io/RUN/img/bgv192svg.svg','https://darkmagneto.github.io/RUN/style.css',"https://darkmagneto.github.io/RUN/js/mapCourse.js");

//
Darckasce_entete_menu();

// 
DarckAsce_aff_erreur_connexion();
?>
<form class="row g-3">
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>

    <select id="inputState" class="form-select">
      <option selected>Choix...</option>

      <?php  foreach ($lines_course as $ligne) { 

      echo '<option>"'.$ligne["nomcourse"].'" </option>';

      }?>

    </select>

  </div>



  <div class="col-12">
    <button type="submit" class="btn btn-primary">Validé</button>
  </div>

</form>
<?php
Darckasce_aff_maps();
//
Darckasce_aff_menustyle();
//
DarckAsce_aff_pied();

DarckAsce_aff_fondecrant();
ob_end_flush(); //FIN DU SCRIPT
?>
