<?php
session_start();
include 'bdconnect.php';
include 'nav.php';

if (isset($_POST['submit'])) {
    $id_dossier_client = $_GET['id'];
    $id_user = $_SESSION['id_user'];
    $type_sous_dossier = $_POST['type_sous_dossier'];
    $nom_sous_dossier = $_POST['nom_sous_dossier'];
    $autres_informations = $_POST['autres_informations'];
    $valeur = $_POST['valeur'];
    //$denomination = $_POST['denomination'];
    //$forme = $_POST['forme'];
    //$capital = $_POST['capital'];
    //$immatriculation = $_POST['immatriculation'];
    $moth = date("m");
    
    $date_creation_acte = date("Y-m-d");
    $indice = "100";
$random_number = mt_rand(1000000, 9999999); // Génère un nombre aléatoire entre 1000000 et 9999999
$numero_notaris = $indice . $random_number;

    

    $con = $conn->prepare('INSERT INTO sous_dossier_client(type_sous_dossier, id_dossier_client, id_user, nom_sous_dossier, valeur, autres_information, numero_notaris, date_creation_acte) VALUES(:type_sous_dossier, :id_dossier_client, :id_user, :nom_sous_dossier, :valeur, :autres_information, :numero_notaris, :date_creation_acte)');

    $result = $con->execute(array(
        ":type_sous_dossier" => $type_sous_dossier,
        ":id_dossier_client" => $id_dossier_client,
        ":id_user" => $id_user,
        ":nom_sous_dossier" => $nom_sous_dossier,
        ":valeur" => $valeur,
        ":autres_information" => $autres_informations,
        ":numero_notaris" => $numero_notaris,
        ":date_creation_acte" => $date_creation_acte
    ));

   $recupdossier = $conn->prepare('SELECT * FROM dossier_client WHERE id_dossier_client = ?');
$recupdossier->execute(array($id_dossier_client));

if ($recupdossier->rowCount() > 0) {
    $row = $recupdossier->fetch(); // Récupération de la première ligne de résultats
    $nombre_acte1 = $row['nombre_acte'];
    $nombre_acte = $nombre_acte1 + 1;
    // Faites quelque chose avec $nombre_acte
    
    // Requête SQL pour mettre à jour l'acte dans la base de données
    $sql_update = "UPDATE dossier_client SET nombre_acte = :nombre_acte WHERE id_dossier_client = :id_dossier_client";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':nombre_acte', $nombre_acte, PDO::PARAM_INT);
    $stmt_update->bindParam(':id_dossier_client', $id_dossier_client, PDO::PARAM_INT);
    
    // Exécuter la requête de mise à jour
    $stmt_update->execute();
} else {
    
    echo "<script>alert('Erreur lors de l\'incrementation du nombre de sous-dossier.')</script>";
}

    

    if ($result) {
        /*$id_sous_dossier = $conn->lastInsertId(); // Obtenez l'ID du sous-dossier inséré

        if ($type_sous_dossier === 'Assurance') {
            $conm = $conn->prepare('INSERT INTO assurance(id_sous_dossier, valeur, autres_information) VALUES(:id_sous_dossier, :valeur, :autres_information)');

            $resultt = $conm->execute(array(
                ":id_sous_dossier" => $id_sous_dossier,
                ":valeur" => $valeur,
                ":autres_information" => $autres_informations
            ));
        }

        if ($type_sous_dossier === 'Bails') {
            $conm = $conn->prepare('INSERT INTO bails(id_sous_dossier, valeur, autres_information) VALUES(:id_sous_dossier, :valeur, :autres_information)');

            $resultt = $conm->execute(array(
                ":id_sous_dossier" => $id_sous_dossier,
                ":valeur" => $valeur,
                ":autres_information" => $autres_informations
            ));
        }

        if ($type_sous_dossier === 'Création Société') {
            $conmn = $conn->prepare('INSERT INTO societe(id_sous_dossier, denomination, forme, capital, immatriculation) VALUES(:id_sous_dossier, :denomination, :forme, :capital, :immatriculation)');

            $resulttt = $conmn->execute(array(
                ":id_sous_dossier" => $id_sous_dossier,
                ":denomination" => $denomination,
                ":forme" => $forme,
                ":capital" => $capital,
                ":immatriculation" => $immatriculation
            ));
        }*/

        echo "<script>alert('Nouveau sous-dossier créé.')</script>";
        echo "<script type='text/javascript'> document.location = 'dossier_client.php?id=" . $id_dossier_client . "'; </script>";
    } else {
        echo "<script>alert('Erreur lors de l\'insertion du sous-dossier.')</script>";
    }
}
?>
