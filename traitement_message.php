<?php
require ('bdconnect.php');
session_start();

if ((isset($_SESSION['id']) and !empty($_SESSION['id']))) {
    $recupuser = $conn->prepare('select * from messagerie where email_recepteur = ?');
    $recupuser->execute(array($_SESSION['id']));
    $update = $conn->prepare('UPDATE notification SET indexx = 0 WHERE email_expediteur = ? and email_destinateur = ?');
    $update->execute(array($_SESSION['id'], $_SESSION['email_user']));
}

if (isset($_POST['Envoyer']) and !empty($_POST['libelle_messagerie'])) {
    $message = htmlspecialchars($_POST['libelle_messagerie']);
    $sujets = htmlspecialchars($_POST['sujet']);
    $datee = date("Y/m/d H:i:s");

    // Gérer le téléchargement du fichier PDF facultatif
    $file_name = '';
    if (isset($_FILES['fichier_pdf']) && $_FILES['fichier_pdf']['error'] == 0) {
        $file_name = $_FILES['fichier_pdf']['name'];
        $file_tmp = $_FILES['fichier_pdf']['tmp_name'];

        // Déplacez le fichier vers un emplacement souhaité
        $upload_dir = 'pdf_join/';
        $file_name = $file_name; // Conservez le nom d'origine du fichier
        move_uploaded_file($file_tmp, $upload_dir . $file_name);
    }

    $inserer_message = $conn->prepare('INSERT INTO messagerie(email_emetteur, email_recepteur, sujet, libelle_messagerie, datee, fichier_pdf) VALUES(?, ?, ?, ?, ?, ?)');
    $inserer_message->execute(array($_SESSION['email_user'], $_SESSION['id'], $sujets, $message, $datee, $file_name));

    // Insérer le message dans la table de notification si nécessaire

    unset($_POST['libelle_messagerie']);
    header('Location:message_privee.php?id=3');
}
?>
