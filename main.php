<?php
// main.php

session_start();
require_once(__DIR__ . '/vendor/autoload.php');
include 'bdconnect.php';
include 'nav.php';
include 'functions.php'; // Inclure le fichier de fonctions

$id_dossier_client = $_GET['id'];
$id_sous_dossier_client = $_GET['isc'];




// ...

if (isset($_POST['submit'])) {
    // Votre code pour la soumission du formulaire
}

$sql = "SELECT * FROM sous_dossier_client WHERE id_dossier_client = :id_dossier AND id_sous_dossier_client = :id_sous_dossier";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_dossier', $id_dossier_client, PDO::PARAM_INT);
$stmt->bindParam(':id_sous_dossier', $id_sous_dossier_client, PDO::PARAM_INT);
$stmt->execute();
$record = $stmt->fetch();

if ($record) {
    $type_sous_dossier = $record['type_sous_dossier'];

    if ($type_sous_dossier == "Assurance") {

        

    // Affichage de la table
    $sqlAssurance = "SELECT * FROM assurance WHERE id_sous_dossier = :id";
    $stmtAssurance = $conn->prepare($sqlAssurance);
    $stmtAssurance->bindParam(':id', $id_sous_dossier_client, PDO::PARAM_INT);
    $stmtAssurance->execute();
    $recordt = $stmtAssurance->fetch();
    
    echo displayTable($stmtAssurance);

    // Calcul des frais d'assurance
    $montantAssurance = $recordt['valeur'];
    $resultatsFraisAssurance = calculateFraisAssurance($montantAssurance);

    $fraisAssurance1 = $resultatsFraisAssurance['frais1'];
    $fraisAssurance2 = $resultatsFraisAssurance['frais2'];
    $fraisAssurance3 = $resultatsFraisAssurance['frais3'];
    $fraisAssurance4 = $resultatsFraisAssurance['frais4'];
    $totalfraisAssurance = $resultatsFraisAssurance['totalfrais'];

    // ... Reste de votre code pour le type d'assurance
} elseif ($type_sous_dossier == "Bails") {
    // Affichage de la table
    $sqlBails = "SELECT * FROM bails WHERE id_sous_dossier = :id";
    $stmtBails = $conn->prepare($sqlBails);
    $stmtBails->bindParam(':id', $id_sous_dossier_client, PDO::PARAM_INT);
    $stmtBails->execute();
    $recordr = $stmtBails->fetch();
    
    echo displayTable($stmtBails);

    // Calcul des frais de bails
    $montantBails = $recordr['valeur'];
    $resultatsFraisBails = calculateFraisBails($montantBails);

    $fraisBails1 = $resultatsFraisBails['fraisbails1'];
    $fraisBails2 = $resultatsFraisBails['fraisbails2'];
    $fraisBails3 = $resultatsFraisBails['fraisbails3'];
    $fraisBails4 = $resultatsFraisBails['fraisbails4'];
    $totalfraisBails = $resultatsFraisBails['totalfraisbails'];

    // ... Reste de votre code pour le type de bails
}
}

// ...

?>
