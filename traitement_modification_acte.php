<?php
session_start();
include 'bdconnect.php';

$id = $_GET['id'];
$isc = $_GET['isc'];
$id_user = $_SESSION['id_user'];
$date_modification = date("Y-m-d"); // Utilisation du format DATETIME MySQL

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nom_acte"]) && isset($_POST["montant"]) && isset($_POST["type_sous_dossier"]) && isset($_POST["numero_notaris"])) {
    $nom_acte = $_POST["nom_acte"];
    $montant = $_POST["montant"];
    $type_sous_dossier = $_POST["type_sous_dossier"];
    $numero_notaris = $_POST["numero_notaris"];
    $modification = "Modification dans L'Acte " . $nom_acte;

    // Requête SQL pour mettre à jour l'acte dans la base de données
    $sql_update = "UPDATE sous_dossier_client SET nom_sous_dossier = :nom_acte, valeur = :montant, type_sous_dossier = :type_sous_dossier WHERE numero_notaris = :numero_notaris";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':nom_acte', $nom_acte, PDO::PARAM_STR);
    $stmt_update->bindParam(':montant', $montant, PDO::PARAM_INT);
    $stmt_update->bindParam(':type_sous_dossier', $type_sous_dossier, PDO::PARAM_STR);
    $stmt_update->bindParam(':numero_notaris', $numero_notaris, PDO::PARAM_STR);

    // Exécuter la requête
    if ($stmt_update->execute()) {
        // Enregistrer le commentaire uniquement si la mise à jour réussit
        $sql = "INSERT INTO commentaires(id_user, id_dossier, id_sous_dossier, modification, date_modification) VALUES (:id_user, :id_dossier, :id_sous_dossier, :modification, :date_modification)";
        $stmt_comment = $conn->prepare($sql);
        $stmt_comment->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt_comment->bindParam(':id_dossier', $id, PDO::PARAM_INT);
        $stmt_comment->bindParam(':id_sous_dossier', $isc, PDO::PARAM_INT);
        $stmt_comment->bindParam(':modification', $modification, PDO::PARAM_STR);
        $stmt_comment->bindParam(':date_modification', $date_modification, PDO::PARAM_STR);
        $stmt_comment->execute();

        echo "<script>alert('Modification réussie')</script>";
        echo "<script type='text/javascript'> document.location = 'dossier_client.php?id=" . $id ."'; </script>";
    } else {
        echo "<script>alert('Échec de la modification')</script>";
    }
}
?>
