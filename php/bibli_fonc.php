<?php
/*********************************************************
 *        Bibliothèque de fonctions spécifiques          *
 *        à l'application M O N U M                      *
 *********************************************************/


/** Constantes : les paramètres de connexion au serveur MySQL */

const BD_USER = 'ffvelo';
const BD_PASS = 'hinata152791+';
const BD_NAME = 'ffvelo_run';
const BD_SERVER = 'mysql-ffvelo.alwaysdata.net';
const BD_CHARSET = 'utf8';


$db = new PDO('mysql:host='.BD_SERVER.';dbname='.BD_NAME.';charset='.BD_CHARSET,BD_USER,BD_PASS);


//_______________________________________________________________
/**
 *  Affichage init map
 *
 */
function Darckasce_aff_maps() {
    echo 
    '<div class="container" id="maCarte"></div>';
}


//_______________________________________________________________
/**
 *  Affiche le code du menu de navigation.
 *
 *  @param  string  $pseudo     chaine vide quand l'utilisateur n'est pas authentifié
 *  @param  array   $droits     Droits rédacteur à l'indice 0, et administrateur à l'indice 1
 *  @param  String  $prefix     le préfix du chemin relatif vers la racine du site
 */
function Darck_aff_menu($pseudo='', $droits = array(false, false), $prefix = '..') {

    echo ' <div class="section" style="background:url(../img/bg.png)" >

    <div class="container">

      <div class="row full-height justify-content-center">

        <div class="col-12 text-center align-self-center py-5">

          <div class="section pb-5 pt-5 pt-sm-2 text-center">

            <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>

                  <input class="checkbox" type="checkbox" id="reg-log" name="reg-log">
                  <label for="reg-log"></label>

            <div class="card-3d-wrap mx-auto">

              <div class="card-3d-wrapper">

                <div class="card-front">

                  <div class="center-wrap">

                    <form enctype="multipart/form-data" action="form_valid.php" method="post">
                    <div class="section text-center">

                      <h4 class="mb-4 pb-3">Log In</h4>
                      <div class="form-group">
                        <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
                        <i class="input-icon uil uil-at"></i>
                      </div>	
                      <div class="form-group mt-2">
                        <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <input type="submit" class="btn mt-4" name="submit" value="submit" />
                      <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
                        
                    </div>
                    </form>
                                </div>
                   
                              </div>

                <div class="card-back">

                  <div class="center-wrap">
                    <form enctype="multipart/form-data" action="form_iscrip.php" method="post">
                    <div class="section text-center">

                      <h4 class="mb-4 pb-3">Sign Up</h4>
                      <div class="form-group">
                        <input type="text" name="logname" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="off">
                        <i class="input-icon uil uil-user"></i>
                      </div>	
                      <div class="form-group mt-2">
                        <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
                        <i class="input-icon uil uil-at"></i>
                      </div>	
                      <div class="form-group mt-2">
                        <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <input type="submit" class="btn mt-4" name="submit" value="Sign Up" />
                      
                        </div>
                      </form>
                      </div>
                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>';

   
}

//_______________________________________________________________
/**
 *  Affichage de l'élément header
 *
 *  @param  string  $titre        Le titre dans le bandeau (<header>)
 *  @param  string  $cheminImage     Le chemin relatif vers le répertoire racine du site
 */
function DarckAsce_aff_debut($titre, $cheminImage='..',$css = '../style.css', $js ="../index.js"){
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>    

    <link rel="icon" href="',$cheminImage,'" type="image/svg" sizes="192x192">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Simple Progressive Web App  By Bos Naufal Built With Vue Js">
    <meta name="black">
    <title>',$titre,'</title>
  <!-- MANIFEST -->
    <link rel="manifest" href="../manifest.json">
  <!-- ADD TO HOMESCREEN SAFARI ON IOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Simple PWA">
    <link rel="apple-touch-icon" href="../img/bgv192svg.svg.png">
  <!-- ADD TO HOMESCREEN WINDOWS -->
    <meta name="msapplicatoin-TileImage" content="../img/bgv192svg.svg.png">
    <meta name="msapplicatoin-TileColor" content="#3d5165">
  <!-- CSS --> 
    <link href="',$css, '" rel="stylesheet">
    <link href="http://localhost/PWA/index.css" rel="stylesheet">
    <link href="http://localhost/PWA/navbarr.css" rel="stylesheet">
    
    <style>#maCarte{ height: 400px;width: 400px;}</style>
    <!-- Link OpenStreetMap / leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">


<!-- js -->
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
  <!-- Boostrap --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <!-- JS -->
    <script src="',$js,'" defer></script>  
    <script src="https://localhost/PWA/index.js" defer></script> 
    </head><body>';
}


//_______________________________________________________________
/**
 *  Affichage du pied de page du document.
 */
function DarckAsce_aff_pied() {
    echo    '<footer>&copy; Comite Departementale de Cyclotourisme de Haute Soane - 2022 - Tous droits réservés</footer>',
        '</body>',
    '</html>';
}
//_______________________________________________________________
/**
 *  Affichage fond d'ecrant
 *
 */
function DarckAsce_aff_fondecrant(){
  echo '<script>
  let text = document.getElementById("text");
  let bird1 = document.getElementById("bird1");
  let bird2 = document.getElementById("bird2");
  let btn = document.getElementById("btn");
  let rocks = document.getElementById("rocks");
  let forest = document.getElementById("forest");
  let water = document.getElementById("water");
  let header = document.getElementById("header");
  
  window.addEventListener("scroll", function() {
      let value = window.scrollY;
      text.style.top = 50 + value * -.1 + "%";
      btn.style.marginTop = value * 1.5 + "px";
      rocks.style.top = value * -.12 + "px";
      forest.style.top = value * .25 + "px";
      header.style.top = value * .5 + "px";
  })
  </script>';
}


//_______________________________________________________________
/**
 *  Affichage Animation
 *
 */
function DarckAsce_aff_divAnim(){
    echo '<div id="anim">',
    '<input type="checkbox">',
    '<div>',
        '<h1>M<span><b>O</b></span><span><b>N</b></span><span>ONUM</span></h1>',
    '</div>',
'</div>',
'<style>',
'#anim input:checked {',
'transition-delay: 0.5s;',
'display: none;',
'}',
'#anim {hight:32vh; max-height:32vh; background:none;}',
'#anim input:before {content:none;}',
'<style/>';
}

//_______________________________________________________________
/**
 *  Génère l'URL de l'image d'illustration d'un article en fonction de son ID
 *  - si l'image ou la photo existe dans le répertoire /upload, on renvoie son url
 *  - sinon on renvoie l'url d'une image générique
 *  @param  int     $id         l'identifiant de l'article
 *  @param  String  $prefix     le chDarckAscein relatif vers la racine du site
 */
function DarckAsce_url_image_illustration($id, $prefix='..') {

    $url = "{$prefix}/upload/{$id}.jpg";

    if (! file_exists($url)) {
        return "{$prefix}/upload/none.jpg" ;
    }

    return $url;
}

//_______________________________________________________________
/**
* Vérifie si l'utilisateur est authentifié.
*
* Termine la session et redirige l'utilisateur
* sur la page connexion.php s'il n'est pas authentifié.
*
* @global array   $_SESSION
*/
function DarckAsce_verifie_authentification() {
    if (! isset($_SESSION['user'])) {
        DarckAsce_session_exit('./connexion.php');
    }
}


//_______________________________________________________________
/**
 * Permet de récupérer data dans la bdd
 *
 * @return 	int	 $t['COUNT(arID)'] Nombre d'articles
 */
function DarckAsce_bdd_sqlToData($sql) {

    // ouverture de la connexion à la base de données
    $bd = DarckAsce_bd_connecter();
  
    $res = mysqli_query($bd, $sql) or DarckAsce_bd_erreur($bd, $sql);
    $t = mysqli_fetch_assoc($res);
  
    return $t;
  
    // Libération de la mémoire associée au résultat de la requête
    mysqli_free_result($res);
  
    // Fermeture de la bdd
    mysqli_close($bd);
  
  }

  //_______________________________________________________________
/**
 * Permet de récupérer data dans la bdd
 *
 */
function DarckAsce_js_map() {

    echo '<div id="map">',
    '</div>',
    '<!-- Async script executes immediately and must be after any DOM elDarckAsceents used in callback. -->',
    '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8NXZ5RSDDHwvUfTMY1wB6iQ6VQxxmFas&callback=initMap&v=weekly" async>',
    '</script>';
  }
  

//____________________________________________________________________________
/** 
 *  Ouverture de la connexion à la base de données
 *  En cas d'erreur de connexion le script est arrêté.
 *
 *  @return objet   connecteur à la base de données
 */
function DarckAsce_bd_connecter() {
    $conn = mysqli_connect(BD_SERVER, BD_USER, BD_PASS, BD_NAME);
    if ($conn !== FALSE) {
        //mysqli_set_charset() définit le jeu de caractères par défaut à utiliser lors de l'envoi
        //de données depuis et vers le serveur de base de données.
        mysqli_set_charset($conn, 'utf8') 
        or DarckAsce_bd_erreur_exit('<h4>Erreur lors du chargDarckAsceent du jeu de caractères utf8</h4>');
        return $conn;     // ===> Sortie connexion OK
    }
    // Erreur de connexion
    // Collecte des informations facilitant le debugage
    $msg = '<h4>Erreur de connexion base MySQL</h4>'
            .'<div style="margin: 20px auto; width: 350px;">'
            .'BD_SERVER : '. BD_SERVER
            .'<br>BD_USER : '. BD_USER
            .'<br>BD_PASS : '. BD_PASS
            .'<br>BD_NAME : '. BD_NAME
            .'<p>Erreur MySQL numéro : '.mysqli_connect_errno()
            //appel de htmlentities() pour que les éventuels accents s'affiche correctDarckAsceent
            .'<br>'.htmlentities(mysqli_connect_error(), ENT_QUOTES, 'ISO-8859-1')  
            .'</div>';
    DarckAsce_bd_erreur_exit($msg);
}

//____________________________________________________________________________
/**
 * Arrêt du script si erreur base de données 
 *
 * Affichage d'un message d'erreur, puis arrêt du script
 * Fonction appelée quand une erreur 'base de données' se produit :
 *      - lors de la phase de connexion au serveur MySQL
 *      - ou indirectDarckAsceent lorsque l'envoi d'une requête échoue
 *
 * @param string    $msg    Message d'erreur à afficher
 */
function DarckAsce_bd_erreur_exit($msg) {
    ob_end_clean(); // Suppression de tout ce qui a pu être déja généré

    echo    '<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8">',
            '<title>Erreur base de données</title>',
            '<style>',
                'table{border-collapse: collapse;}td{border: 1px solid black;padding: 4px 10px;}',
            '</style>',
            '</head><body>',
            $msg,
            '</body></html>';
    exit(1);        // ==> ARRET DU SCRIPT
}

//____________________________________________________________________________
/**
 * Gestion d'une erreur de requête à la base de données.
 *
 * A appeler impérativDarckAsceent quand un appel de mysqli_query() échoue 
 * Appelle la fonction DarckAsce_bd_erreurExit() qui affiche un message d'erreur puis termine le script
 *
 * @param objet     $bd     Connecteur sur la bd ouverte
 * @param string    $sql    requête SQL provoquant l'erreur
 */
function DarckAsce_bd_erreur($bd, $sql) {
    $errNum = mysqli_errno($bd);
    $errTxt = mysqli_error($bd);

    // Collecte des informations facilitant le debugage
    $msg =  '<h4>Erreur de requête</h4>'
            ."<pre><b>Erreur mysql :</b> $errNum"
            ."<br> $errTxt"
            ."<br><br><b>Requête :</b><br> $sql"
            .'<br><br><b>Pile des appels de fonction</b></pre>';

    // Récupération de la pile des appels de fonction
    $msg .= '<table>'
            .'<tr><td>Fonction</td><td>Appelée ligne</td>'
            .'<td>Fichier</td></tr>';

    $appels = debug_backtrace();
    for ($i = 0, $iMax = count($appels); $i < $iMax; $i++) {
        $msg .= '<tr style="text-align: center;"><td>'
                .$appels[$i]['function'].'</td><td>'
                .$appels[$i]['line'].'</td><td>'
                .$appels[$i]['file'].'</td></tr>';
    }

    $msg .= '</table>';

    DarckAsce_bd_erreur_exit($msg);    // ==> ARRET DU SCRIPT
}



/** 
 *  Protection des sorties (code HTML généré à destination du client).
 *
 *  Fonction à appeler pour toutes les chaines provenant de :
 *      - de saisies de l'utilisateur (formulaires)
 *      - de la bdD
 *  Permet de se protéger contre les attaques XSS (Cross site scripting)
 *  Convertit tous les caractères éligibles en entités HTML, notamment :
 *      - les caractères ayant une signification spéciales en HTML (<, >, ", ', ...)
 *      - les caractères accentués
 * 
 *  Si on lui transmet un tableau, la fonction renvoie un tableau où toutes les chaines
 *  qu'il contient sont protégées, les autres données du tableau ne sont pas modifiées. 
 *
 *  @param  mixed  $content   la chaine à protéger ou un tableau contenant des chaines à protéger 
 *  @return mixed             la chaîne protégée ou le tableau
 */
function DarckAsce_html_proteger_sortie($content) {
    if (is_array($content)) {
        foreach ($content as &$value) {
            $value = DarckAsce_html_proteger_sortie($value);   
        }
        unset ($value); // à ne pas oublier (de façon générale)
        return $content;
    }
    if (is_string($content)){
        return htmlentities($content, ENT_QUOTES, 'UTF-8');
    }
    return $content;
}

//___________________________________________________________________
/**
 * Teste si une valeur est une valeur entière
 *
 * @param mixed     $x  valeur à tester
 * @return boolean  TRUE si entier, FALSE sinon
 */
function DarckAsce_est_entier($x) {
    return is_numeric($x) && ($x == (int) $x);
}

//___________________________________________________________________
/**
 * Teste si un nombre est compris entre 2 autres
 *
 * @param integer   $x  nombre ‡ tester
 * @return boolean  TRUE si ok, FALSE sinon
 */
function DarckAsce_est_entre($x, $min, $max) {
    return ($x >= $min) && ($x <= $max);
}


//___________________________________________________________________
/**
 * Renvoie un tableau contenant le nom des mois (utile pour certains affichages)
 *
 * @return array    Tableau à indices numériques contenant les noms des mois
 */
function DarckAsce_get_tableau_mois(){
    return array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'SeptDarckAscebre', 'Octobre', 'NovDarckAscebre', 'DécDarckAscebre');
}

//___________________________________________________________________
/**
 * Contrôle des clés présentes dans les tableaux $_GET ou $_POST - piratage ?
 *
 * Cette fonction renvoie false en présence d'une suspicion de piratage 
 * et true quand il n'y a pas de problème détecté.
 *
 * Soit $x l'ensDarckAsceble des clés contenues dans $_GET ou $_POST 
 * L'ensDarckAsceble des clés obligatoires doit être inclus dans $x.
 * De même $x doit être inclus dans l'ensDarckAsceble des clés autorisées, formé par l'union de l'ensDarckAsceble 
 * des clés facultatives et de l'ensDarckAsceble des clés obligatoires.
 * Si ces 2 conditions sont vraies, la fonction renvoie true, sinon, elle renvoie false.
 * Dit autrDarckAsceent, la fonction renvoie false si une clé obligatoire est absente ou 
 * si une clé non autorisée est présente; elle renvoie true si "tout va bien"
 * 
 * @param string    $tab_global 'post' ou 'get'
 * @param array     $cles_obligatoires tableau contenant les clés qui doivent obligatoirDarckAsceent être présentes
 * @param array     $cles_facultatives tableau contenant les clés facultatives
 * @global array    $_GET
 * @global array    $_POST
 * @return boolean  true si les paramètres sont corrects, false sinon
 */
function DarckAsce_parametres_controle($tab_global, $cles_obligatoires, $cles_facultatives = array()){
    $x = strtolower($tab_global) == 'post' ? $_POST : $_GET;

    $x = array_keys($x);
    // $cles_obligatoires doit être inclus dans $x
    if (count(array_diff($cles_obligatoires, $x)) > 0){
        return false;
    }
    // $x doit être inclus dans $cles_obligatoires Union $cles_facultatives
    if (count(array_diff($x, array_merge($cles_obligatoires,$cles_facultatives))) > 0){
        return false;
    }
    
    return true;
}

//___________________________________________________________________
/**
 * Affiche une liste déroulante à partir des options passées en paramètres.
 *
 * @param string    $nom       Le nom de la liste déroulante (valeur de l'attribut name)
 * @param array     $options   Un tableau associatif donnant la liste des options sous la forme valeur => libelle 
 * @param string    $default   La valeur qui doit être sélectionnée par défaut. 
 */
function DarckAsce_aff_liste($nom, $options, $defaut) {
    echo '<select name="', $nom, '">';
    foreach ($options as $valeur => $libelle) {
        echo '<option value="', $valeur, '"', (($defaut == $valeur) ? ' selected' : '') ,'>', $libelle, '</option>';
    }
    echo '</select>';
}

//___________________________________________________________________
/**
 * Affiche une liste déroulante représentant les 12 mois de l'année
 *
 * @param string    $nom       Le nom de la liste déroulante (valeur de l'attribut name)
 * @param int       $default   Le mois qui doit être sélectionné par défaut (1 pour janvier)
 */
function DarckAsce_aff_liste_mois($nom, $defaut) {
    $mois = DarckAsce_get_tableau_mois();
    $m = array();
    foreach ($mois as $k => $v) {
        $m[$k+1] = mb_strtolower($v, 'UTF-8');   
        // comme on est en UTF-8 on utilise la fonction mb_strtolower
        // voir : https://www.php.net/manual/fr/function.mb-strtolower.php
    }
    DarckAsce_aff_liste($nom, $m, $defaut);
}

//___________________________________________________________________
/**
 * Affiche une liste déroulante d'une suite de nombre à partir des options passées en paramètres.
 *
 * @param string    $nom       Le nom de la liste déroulante (valeur de l'attribut name)
 * @param int       $min       La valeur minimale de la liste
 * @param int       $max       La valeur maximale de la liste 
 * @param int       $pas       Le pas d'itération (si positif, énumération croissante, sinon décroissante) 
 * @param int       $default   La valeur qui doit être sélectionnée par défaut. 
 */
function DarckAsce_aff_liste_nombre($nom, $min, $max, $pas, $defaut) {
    echo '<select name="', $nom, '">';
    if ($pas > 0) {
        for ($i=$min; $i <= $max; $i += $pas) {
            echo '<option value="', $i, '"', (($defaut == $i) ? ' selected' : '') ,'>', $i, '</option>';
        }
    }
    else {
        for ($i=$max; $i >= $min; $i += $pas) {
            echo '<option value="', $i, '"', (($defaut == $i) ? ' selected' : '') ,'>', $i, '</option>';
        }
    }
    echo '</select>';
}

//___________________________________________________________________
/**
 * Affiche 3 listes déroulantes (jour, mois, année) représentant une date
 *
 * La liste des jours est une liste de nombres (1-31) nommée {$name}_j
 * La liste des mois, nommée {$name}_m, est une liste d'options associant le nom du mois (libellé) à une valeur entière
 * (exDarckAsceple : février est associé à la valeur 2)
 * La liste des années, nommée {$name}_a, est une liste de nombres ({$annee_min}-{$annee_max})
 * Si le jour sélectionné vaut 0, la fonction sélectionne le jour courant. IdDarckAsce pour le mois et l'année.
 *
 * @param string    $name           Le nom utilisé comme préfixe pour nommer les listes déroulantes
 * @param int       $annee_min      La plus petite année affichée
 * @param int       $annee_max      La plus grande année affichée
 * @param int       $j_s            Le jour sélectionné
 * @param int       $m_s            Le mois sélectionné (1 pour janvier)
 * @param int       $a_s            L'année sélectionnée
 * @param int       $pas_annee      Le pas d'itération de l'année (si positif, énumération croissante, sinon décroissante) 
 */
function DarckAsce_aff_listes_date($name, $annee_min, $annee_max, $j_s = 0, $m_s = 0, $a_s = 0, $pas_annee = -1){ 
    list($jj, $mm, $aa) = explode('-', date('j-n-Y'));
    DarckAsce_aff_liste_nombre("{$name}_j", 1, 31, 1, $j_s ? $j_s : $jj);
    DarckAsce_aff_liste_mois("{$name}_m", $m_s ? $m_s : $mm);
    DarckAsce_aff_liste_nombre("{$name}_a", $annee_min, $annee_max, $pas_annee, $a_s ? $a_s : $aa);
}

//___________________________________________________________________
/**
 * Affiche une ligne d'un tableau permettant la saisie d'une date
 *
 * La ligne est constituée de 2 cellules :
 * - la 1ère cellule contient un libellé
 * - la 2ème cellule contient les 3 listes déroulantes (jour, mois, année) représentant la date
 *
 * @param string    $libelle        Le libellé affiché à gauche des listes déroulantes
 * @param string    $name           Le nom utilisé comme préfixe pour nommer les listes déroulantes
 * @param int       $annee_min      La plus petite année affichée
 * @param int       $annee_max      La plus grande année affichée
 * @param int       $j_s            Le jour sélectionné
 * @param int       $m_s            Le mois sélectionné (1 pour janvier)
 * @param int       $a_s            L'année sélectionnée
 * @param int       $pas_annee      Le pas d'itération de l'année (si positif, énumération croissante, sinon décroissante) 
 */
function DarckAsce_aff_ligne_date($libelle, $name, $annee_debut, $annee_fin, $j_s = 0, $m_s = 0, $a_s = 0, $pas_annee = -1){
    echo '<tr>', '<td>', $libelle, '</td>', '<td>';
    DarckAsce_aff_listes_date($name, $annee_debut, $annee_fin, $j_s, $m_s, $a_s, $pas_annee);
    echo '</td>', '</tr>';
}


//___________________________________________________________________
/**
 * Affiche une ligne d'un tableau permettant la saisie d'un champ input de type 'text', 'password' ou 'DarckAsceail'
 *
 * La ligne est constituée de 2 cellules :
 * - la 1ère cellule contient un label permettant un "contrôle étiqueté" de l'input 
 * - la 2ème cellule contient l'input
 *
 * @param string    $type           Le type de l'input : 'text', 'password' ou 'DarckAsceail'
 * @param string    $libelle        Le label associé à l'input
 * @param string    $name           Le nom de l'input
 * @param string    $value          La valeur de l'input
 * @param array     $attributs      Un tableau associatif donnant les attributs de l'input sous la forme nom => valeur
 * @param string    $prefix_id      Le préfixe utilisé pour l'id de l'input, ce qui donne un id égal à {$prefix_id}{$name}
 */
function DarckAsce_aff_ligne_input($type, $libelle, $name, $value = '', $attributs = array(), $prefix_id = 'text'){
    echo    '<tr>', 
                '<td><label for="', $prefix_id, $name, '">', $libelle, '</label></td>',
                '<td><input type="', $type, '" name="', $name, '" id="', $prefix_id, $name, '" value="', $value,'"'; 
                
    foreach ($attributs as $cle => $value){
        echo ' ', $cle, ($value ? "='{$value}'" : '');
    }
    echo '></td></tr>';
}

//___________________________________________________________________
/**
 * Affiche un groupe de boutons radio contenu dans un élément label
 *
 * @param string    $name           Le nom des input de type radio
 * @param array     $options        Un tableau associatif donnant la liste des choix possibles sous la forme valeur => libelle 
 * @param mixed     $default        La valeur qui doit être sélectionnée par défaut. 
 * @param array     $attributs      Un tableau associatif donnant les attributs de l'input sous la forme nom => valeur
 */
function DarckAsce_aff_input_radio($name, $options, $defaut, $attributs = array()){
    foreach ($options as $valeur => $libelle){
        echo '<label><input type="radio" name="', $name, '" value="', $valeur, '"', 
        ($valeur == $defaut ? ' checked' : '');
        foreach ($attributs as $cle => $value){
            echo ' ', $cle, ($value ? "='{$value}'" : '');
        }
        echo '> ',$libelle, '</label>';
    }
}

//___________________________________________________________________
/**
 * Affiche une ligne d'un tableau contenant un libellé et un groupe de boutons radio
 *
 * @param string    $libelle        Le libellé associé aux boutons radio
 * @param string    $name           Le nom des input de type radio
 * @param array     $options        Un tableau associatif donnant la liste des choix possibles sous la forme valeur => libelle 
 * @param mixed     $default        La valeur qui doit être sélectionnée par défaut. 
 * @param array     $attributs      Un tableau associatif donnant les attributs de l'input sous la forme nom => valeur
 */
function DarckAsce_aff_ligne_input_radio($libelle, $name, $options, $defaut, $attributs = array()){
    echo '<tr>',
            '<td>', $libelle, '</td>',
            '<td>';
    DarckAsce_aff_input_radio($name, $options, $defaut, $attributs);
    echo '</td></tr>';
}

//___________________________________________________________________
/**
 * Affiche un input de type checkbox suivi d'un libellé
 *
 * @param string    $libelle        Le libellé associé à la case à cocher
 * @param string    $name           Le nom des input de type checkbox
 * @param string    $value          La valeur de l'input
 * @param array     $attributs      Un tableau associatif donnant les attributs de l'input sous la forme nom => valeur
 */
function DarckAsce_aff_input_checkbox($libelle, $name, $value = 1, $attributs=array()){
    echo '<label><input type="checkbox" name="', $name, '" value="', $value, '"';
    foreach ($attributs as $cle => $value){
        echo ' ', $cle, ($value ? "='{$value}'" : '');
    }
    echo '> ', $libelle, '</label>';
}

/**
 * Fonction qui ajoute un commentaire
 *
 * @param 	String 	$com     	    commentaire à ajouter
 * @param 	String 	$auteur_come    Pseudo de l'utilisateur qui a écrit le commentaire
 * @param   int     &id             Id de l'aticle rattaché au commentaire
 * @param   objet   $bd             Connecteur sur la bd ouverte
 */
function DarckAsce_run_sql($sql,$bd)
{

    mysqli_query($bd, $sql) or em_bd_erreur($bd, $sql);
}
//___________________________________________________________________
/**
 * Fonction de traitement de la connexion.
 * Elle connecte l'utilisateur si les identifiants
 * sont corrects et le signal si cela ne correspond pas.
 *
 * @global $_SESSION
 * @global $_POST
 * @return 	int $verif  1 si toutes les verifications sont ok, 0 sinon
 */
function DarckAsce_traitement_connexion() {

    $pseudo = DarckAsce_html_proteger_sortie(trim($_SESSION["user"]));
    $mdp = DarckAsce_html_proteger_sortie(trim($_SESSION["pass"]));
    $verif = 1;
  
    // vérification du pseudo
    if (empty($pseudo)) {
        $verif = 0;
    }
    
    // vérification des mots de passe
    if (empty($mdp)) {
        $verif = 0;
    }
  
    // ouverture de la connexion à la base
    $bd = DarckAsce_bd_connecter();
    $sql = "SELECT * FROM `participant` WHERE `email` LIKE '{$pseudo}'";
    $res = mysqli_query($bd, $sql) or em_bd_erreur($bd, $sql);
  
    if (mysqli_num_rows($res) == 0){
      $verif = 0;
    }
    else {
      $tab = mysqli_fetch_assoc($res);
      if(password_verify($mdp, $tab['mdp']) == FALSE){
        $verif = 0;
      }
    }
  
    // Si tout est bien vérifé, on met a jour les variables de SESSION
    if($verif == 1)
    {
      switch($tab['status'])
      {
        case 0 :  $_SESSION['user'] = array('email' => $pseudo,'nom' => $tab['nom'], 'organizateur' => false);
              break;
        case 1 :  $_SESSION['user'] = array('email' => $pseudo,'nom' => $tab['nom'], 'organizateur' => true);
            break;
        default:  $_SESSION['user'] = array('email' => $pseudo,'nom' => $tab['nom'], 'organizateur' => false);
            break;
      }
    }
      // Libération de la mémoire associée au résultat de la requête
      mysqli_free_result($res);
  
      // Fermeture bdd
      mysqli_close($bd);
  
      return $verif;
  }
  //___________________________________________________________________
  /**
   * Fonction qui affiche l'erreur de connexion s'il
   * y a une erreur relevée par la fonction lpl_traitement_connexion().
   */
  function DarckAsce_aff_erreur_connexion()
  {
    if(DarckAsce_traitement_connexion() == 0)
    {
      echo '<div class="erreur"><p>Échec d\'authentification. Utilisateur inconnu ou mot de passe incorrect. '.$_SESSION['user'].'<p><ul>',
           '</ul></div>';
    }
  }
  //___________________________________________________________________
  /**
   * Fonction qui affiche animation aceuil
   */
  function DarckAsce_aff_anim_acceuil()
  {  
      echo '<script>
      let text = document.getElementById(','"text"',');
      let bird1 = document.getElementById(','"bird1"',');
      let bird2 = document.getElementById(','"bird2"',');
      let btn = document.getElementById(','"btn"',');
      let rocks = document.getElementById(','"rocks"',');
      let forest = document.getElementById(','"forest"',');
      let water = document.getElementById(','"water"',');
      let header = document.getElementById(','"header"',');
      
      window.addEventListener(','"scroll"',', function() {
          let value = window.scrollY;
          text.style.top = 50 + value * -.1 + ','"%"',';
          btn.style.marginTop = value * 1.5 + ','"px"',';
          rocks.style.top = value * -.12 + ','"px"',';
          forest.style.top = value * .25 + ','"px"',';
          header.style.top = value * .5 + ','"px"',';
      })
    </script>';
  }

  //_______________________________________________________________
/**
 *  Affiche le code du menu de navigation.
 *
 *  @param  string  $pseudo     chaine vide quand l'utilisateur n'est pas authentifié
 *  @param  array   $droits     Droits rédacteur à l'indice 0, et administrateur à l'indice 1
 *  @param  String  $prefix     le préfix du chemin relatif vers la racine du site
 */
function Darckasce_aff_menu($pseudo='', $droits = array(false, false)) {

  echo '<header id="header">
  <ul>
    <li><a href="http://localhost/PWA/index.html" class="logo">Run</a></li>
    <li><a href="http://localhost/PWA/php/login.html" class="active">Login/out</a></li>
    <li><a href="http://localhost/PWA/php/Contact.html">Contact</a></li>';


  // dernier item du menu ("se connecter" ou sous-menu)
  if ($pseudo) {
      echo '<a href="#">', $pseudo, '</a>',
              '<ul>',
                  '<li><a href="http://localhost/PWA/php/compte.php">Mon profil</a></li>',
                  $droits[0] ? "<li><a href=\"http://localhost/PWA/php/Organisateur.php\">Course</a></li>" : '',
                  $droits[1] ? "<li><a href=\"http://localhost/PWA/php/tableaudebord.php\">Tableau De Bord</a></li>" : '',
                  '<li><a href="http://localhost/PWA/php/deconnexion.php">Se déconnecter</a></li>',
              '</ul>';
  }
  else {
      echo '<a href="http://localhost/PWA/php/login.html">Se connecter</a>';
  }

  echo '</ul></header>';
}
  //_______________________________________________________________
/**
 *  Affiche le code du menu de navigation.
 *
 *  @param  string  $pseudo     chaine vide quand l'utilisateur n'est pas authentifié
 *  @param  array   $droits     Droits rédacteur à l'indice 0, et administrateur à l'indice 1
 *  @param  String  $prefix     le préfix du chemin relatif vers la racine du site
 */
function Darckasce_entete_menu() {

  echo '
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="http://localhost/PWA/index.html">RUN</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="http://localhost/PWA/php/deconnexion.php">Déconnexion</a>
      </li>
    </ul>
  </div>
</nav>';
}
  
  //_______________________________________________________________
/**
 *  Affiche le code du menu de navigation.
 *
 *  @param  string  $pseudo     chaine vide quand l'utilisateur n'est pas authentifié
 *  @param  array   $droits     Droits rédacteur à l'indice 0, et administrateur à l'indice 1
 *  @param  String  $prefix     le préfix du chemin relatif vers la racine du site
 */
function Darckasce_aff_menustyle() {



  // dernier item du menu ("se connecter" ou sous-menu)
  //if ($pseudo) {
      echo '
          <div class="navbar">

            <div class="navbar__item -blue">
            
            <a class="navbar__item -blue" href="http://localhost/PWA/php/form_valid.php"><span class="navbar__icon"> <svg class="icon"><use xlink:href="#icon-home"> </use> </svg> </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">

            </div> 

            <div class="navbar__item -orange">
            
            <a class="navbar__item -orange" href="http://localhost/PWA/php/organisateur.php"><span class="navbar__icon"> <svg class="icon"><use xlink:href="#icon-cup"> </use> </svg> </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
            </div> 

            <div class="navbar__item -navy-blue">
            
            <a class="navbar__item -navy-blue" href="http://localhost/PWA/php/add.php"><span class="navbar__icon"> <svg class="icon"><use xlink:href="#icon-plus"> </use> </svg> </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">

            </div>


            <div class="navbar__item -yellow">
              
            <a class="navbar__item -yellow" href="http://localhost/PWA/php/search.php"><span class="navbar__icon"> <svg class="icon"><use xlink:href="#icon-search"> </use> </svg> </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">

            </div> 

            <div class="navbar__item -purple" >

            <a class="navbar__item -purple" href="http://localhost/PWA/php/profil.php"> <span class="navbar__icon" > <svg class="icon"> <use xlink:href="#icon-user"> </use> </svg> </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
      
            </div>

        </div>
  
<svg style="display:none" xmlns="http://www.w3.org/2000/svg" hidden xmlns:xlink="http://www.w3.org/1999/xlink">
  <defs>
    <symbol id="icon-plus" viewBox="0 0 40 40">
      <title>plus</title>
      <path d="M32 14.4v3.2c0 0.8-0.64 1.44-1.44 1.44h-11.68v11.52c0 0.8-0.64 1.44-1.44 1.44h-3.040c-0.8 0-1.44-0.64-1.44-1.44v-11.52h-11.52c-0.8 0-1.44-0.64-1.44-1.44v-3.2c0-0.8 0.64-1.44 1.44-1.44h11.68v-11.52c-0.16-0.8 0.48-1.44 1.28-1.44h3.2c0.8 0 1.44 0.64 1.44 1.44v11.68h11.68c0.64-0.16 1.28 0.48 1.28 1.28z"></path>
    </symbol>
    <symbol id="icon-search" viewBox="0 0 40 40">
    <title>search</title>
      <path d="M30.56 28.64l-5.76-5.76c2.24-2.4 3.52-5.6 3.52-9.12 0-7.52-6.24-13.76-13.76-13.76s-13.76 6.24-13.76 13.76 6.24 13.76 13.76 13.76c2.72 0 5.12-0.8 7.36-2.080l6.080 6.080c0.32 0.32 0.8 0.48 1.28 0.48s0.96-0.16 1.28-0.48c0.8-0.8 0.8-2.080 0-2.88zM4.64 13.76c0-5.44 4.48-9.92 9.92-9.92s9.92 4.48 9.92 9.92-4.48 9.92-9.92 9.92-9.92-4.48-9.92-9.92z"></path>
    </symbol>
    <symbol id="icon-user" viewBox="0 0 40 40">
      <title>user</title>
      <path d="M16 0.64c4.16 0 7.52 3.36 7.52 7.36 0 4.16-3.36 7.52-7.52 7.52s-7.36-3.36-7.36-7.52c-0.16-4 3.2-7.36 7.36-7.36zM16 2.56c-3.2 0-5.6 2.56-5.6 5.6s2.4 5.6 5.6 5.6 5.76-2.56 5.76-5.76-2.56-5.44-5.76-5.44z"></path>
      <path d="M16 16.32c-2.24 0-4.16-0.8-5.76-2.4s-2.4-3.68-2.4-5.76c0-2.24 0.8-4.16 2.4-5.76s3.52-2.4 5.76-2.4c4.48 0 8.16 3.68 8.16 8.16s-3.68 8.16-8.16 8.16zM16 1.44c-1.76 0-3.52 0.64-4.8 1.92s-1.92 3.040-1.92 4.8c0 1.76 0.64 3.52 1.92 4.8s2.88 1.92 4.8 1.92c3.84 0 6.72-3.040 6.72-6.72s-3.040-6.72-6.72-6.72zM16 14.56c-3.52 0-6.4-2.88-6.4-6.4 0-1.76 0.64-3.36 1.92-4.48s2.72-1.92 4.48-1.92c3.68 0 6.4 2.72 6.4 6.4 0 1.76-0.64 3.36-1.92 4.48-1.28 1.28-2.88 1.92-4.48 1.92zM16 3.2c-1.44 0-2.56 0.48-3.52 1.44s-1.44 2.080-1.44 3.52c0 2.72 2.24 4.96 4.96 4.96 1.28 0 2.56-0.48 3.52-1.44s1.44-2.24 1.44-3.52c0-2.72-2.24-4.96-4.96-4.96z"></path>
      <path d="M3.68 30.4c0 1.12-1.76 1.12-1.76 0v-3.68c0-4.64 3.84-8.48 8.48-8.48h11.36c4.64 0 8.48 3.84 8.48 8.48v3.68c0 1.12-1.76 1.12-1.76 0v-3.68c0-3.68-3.040-6.72-6.72-6.72h-11.36c-3.68 0-6.72 3.040-6.72 6.72v3.68z"></path>
      <path d="M29.28 32c-0.96 0-1.6-0.64-1.6-1.6v-3.68c0-1.6-0.64-3.040-1.76-4.16s-2.56-1.76-4.16-1.76h-11.36c-1.6 0-3.040 0.64-4.16 1.76s-1.76 2.56-1.76 4.16v3.68c0 0.96-0.64 1.6-1.6 1.6s-1.6-0.64-1.6-1.6v-3.68c0-2.4 0.96-4.8 2.72-6.56 1.6-1.6 3.84-2.56 6.4-2.56h11.36c2.4 0 4.8 0.96 6.56 2.72s2.72 4 2.72 6.56v3.52c-0.16 0.96-0.8 1.6-1.76 1.6zM10.4 19.36h11.36c1.92 0 3.84 0.8 5.28 2.24s2.24 3.2 2.24 5.28v3.52c0 0 0 0.16 0.16 0.16s0.16-0.16 0.16-0.16v-3.68c0-2.080-0.8-4-2.24-5.44s-3.36-2.24-5.44-2.24h-11.52c-2.080 0-4 0.8-5.44 2.24s-2.24 3.36-2.24 5.44v3.68c0 0 0 0.16 0.16 0.16s0-0.16 0-0.16v-3.68c0-1.92 0.8-3.84 2.24-5.28 1.44-1.28 3.2-2.080 5.28-2.080z"></path>
    </symbol>
    <symbol id="icon-cup" viewBox="0 0 40 40">
      <title>cup</title>
      <path d="M28 4h-1.28v-2.72c0-0.8-0.64-1.28-1.28-1.28h-18.72c-0.8 0-1.44 0.64-1.44 1.28v2.72h-1.28c-2.24 0-4 1.76-4 4v1.28c0 2.24 1.76 4 4 4h1.76c0.8 3.2 3.2 5.92 6.24 7.2v3.52h-1.28c-2.24 0-4 1.76-4 4v2.72c0 0.64 0.48 1.28 1.28 1.28h16c0.8 0 1.28-0.64 1.28-1.28v-2.72c0-2.24-1.76-4-4-4h-1.28v-3.52c3.2-1.28 5.44-4 6.4-7.2h1.6c2.24 0 4-1.76 4-4v-1.28c0-2.24-1.76-4-4-4zM4 10.72c-0.8 0-1.28-0.64-1.28-1.44v-1.28c0-0.8 0.64-1.28 1.28-1.28h1.28v4h-1.28zM22.72 28v1.28h-13.44v-1.28c0-0.8 0.64-1.28 1.28-1.28h10.72c0.8 0 1.44 0.48 1.44 1.28zM17.28 24h-2.56v-2.72c0.96 0.16 1.76 0.16 2.72 0v2.72zM16 18.72c-4.48 0-8-3.52-8-8v-8h16v8c0 4.32-3.52 8-8 8zM29.28 9.28c0 0.8-0.64 1.28-1.28 1.28h-1.28v-3.84h1.28c0.8 0 1.28 0.64 1.28 1.28v1.28z"></path>
    </symbol>
    <symbol id="icon-home" viewBox="0 0 40 40">
      <title>home</title>
      <path d="M16 4.48l12.48 9.92v14.080h-24.96v-14.080l12.48-9.92zM16 0.48l-15.52 12.48v18.72h31.040v-18.72l-15.52-12.48z"></path>
      <path d="M32 32h-32v-19.2l16-12.8 16 12.8v19.2zM0.8 31.2h30.4v-18.080l-15.2-12.16-15.2 12.16v18.080zM28.8 28.8h-25.6v-14.56l12.8-10.24 12.8 10.24v14.56zM4 28h24.16v-13.44l-12-9.6-12 9.6v13.44z"></path>
    </symbol>
  </defs>
</svg>';
 // }
 // else {
  //    echo '<a href="http://localhost/PWA/php/login.html">Se connecter</a>';
  //}
}


//_______________________________________________________________
/**
 * Termine une session et effectue une redirection vers la page transmise en paramètre
 *
 * Elle utilise :
 *   -   la fonction session_destroy() qui détruit la session existante
 *   -   la fonction session_unset() qui efface toutes les variables de session
 * Elle supprime également le cookie de session
 *
 * Cette fonction est appelée quand l'utilisateur se déconnecte "normalement" et quand une
 * tentative de piratage est détectée. On pourrait améliorer l'application en différenciant ces
 * 2 situations. Et en cas de tentative de piratage, on pourrait faire des traitements pour
 * stocker par exemple l'adresse IP, etc.
 *
 * @param string    URL de la page vers laquelle l'utilisateur est redirigé
 */
function Darckasce_session_exit($page = 'http://localhost/PWA/index.html') {
  session_destroy();
  session_unset();
  $cookieParams = session_get_cookie_params();
  setcookie(session_name(),
          '',
          time() - 86400,
          $cookieParams['path'],
          $cookieParams['domain'],
          $cookieParams['secure'],
          $cookieParams['httponly']
      );
  header("Location: $page");
  exit();
}
