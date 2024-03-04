<?php
session_start();
include 'nav.php';

include 'bdconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $motDePasseActuel = $_POST['mot_de_passe_actuel'];
    $nouveauMotDePasse = $_POST['nouveau_mot_de_passe'];
    $confirmerMotDePasse = $_POST['confirmer_mot_de_passe'];

    // Vérifiez si le nouveau mot de passe et la confirmation correspondent
    if ($nouveauMotDePasse !== $confirmerMotDePasse) {
        // Les mots de passe ne correspondent pas, redirigez avec un message d'erreur
        header('Location: page_modification_mot_de_passe.php?erreur=Mots de passe non identiques');
        exit;
    }

    // Vous devrez vérifier ici si le mot de passe actuel est correct dans votre base de données
    // Si le mot de passe actuel est correct, vous pouvez mettre à jour le mot de passe de l'utilisateur

    // Exemple de code pour vérifier le mot de passe actuel (à adapter à votre base de données)
    $sql = "SELECT password_user FROM users WHERE id_user_at = :id_user";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_user', $_SESSION['id_user']);
    $stmt->execute();
    $row = $stmt->fetch();

    if ($motDePasseActuel === $row['password_user']) {
        // Le mot de passe actuel est correct
        // Vous pouvez maintenant mettre à jour le mot de passe
        $sql = "UPDATE users SET password_user = :nouveauMotDePasse WHERE id_user_at = :id_user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nouveauMotDePasse', $nouveauMotDePasse);
        $stmt->bindParam(':id_user', $_SESSION['id_user']);
        $stmt->execute();

        // Redirigez avec un message de succès
        echo "<script>alert('Mot de Passe modifie avec succès.')</script>";
        echo "<script type='text/javascript'> document.location ='profile.php'; </script>";
        exit;
    } else {
        // Le mot de passe actuel est incorrect, redirigez avec un message d'erreur
        header('Location: page_modification_mot_de_passe.php?erreur=Mot de passe actuel incorrect');
        exit;
    }
}
?>

