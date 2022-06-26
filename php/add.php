<?php
  /*****************************************
  *  importation des bibliotheque utilisé
  *****************************************/
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
DarckAsce_aff_debut("ajouter course", 'https://darkmagneto.github.io/RUN/img/bgv192svg.svg','https://darkmagneto.github.io/RUN/style.css',"https://darkmagneto.github.io/RUN/index.js");
//Darckasce_entete_menu();

echo '<form class="row g-3">

  <div class="col-md-6">
    <label for="inputCity" class="form-label">nomcourse</label>
    <input type="text" class="form-control" id="nomcourse">
  </div>
  
  <div class="col-md-6">
    <label for="inputCity" class="form-label">ville</label>
    <input type="text" class="form-control" id="ville">
  </div>
  
  <div class="col-md-6">
    <label for="inputCity" class="form-label">latitudecourse </label>
    <input type="text" class="form-control" id="latitudecourse ">
  </div>
  
  <div class="col-md-6">
    <label for="inputCity" class="form-label">logitudecourse</label>
    <input type="text" class="form-control" id="logitudecourse">
  </div>


  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>';


//Darckasce_aff_maps();
Darckasce_aff_menustyle();
//DarckAsce_aff_pied();
ob_end_flush(); //FIN DU SCRIPT
?>
