<?php
require_once('./bibli_fonc.php');
// démarrage de la session
session_start();
// foction qui efface les cookies et qui deconecte la sesion et renvoi a la page d'aceuil
Darckasce_session_exit($page = 'http://localhost/PWA/index.html');

?>