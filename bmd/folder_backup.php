<?php

if (isset($_POST['backup'])) {

    error_reporting(0);
    
    //include 'backup_function.php';
    include 'backup_function_dossier.php';

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'notaris';

    backDb($server, $username, $password, $dbname);

    // Inclure ici les autres fonctions ou actions que vous souhaitez exécuter après la sauvegarde

}

?>
