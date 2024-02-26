<?php
require('bdconnect.php');

if (isset($_POST['submit'])) {
    $emailcabinet = htmlspecialchars($_POST['email_user']);
    $password = htmlspecialchars($_POST['password_user']);

    $result = $conn->prepare("SELECT id_user_at, matricule_user, email_user, password_user, nom_user, prenom_user, departement_user, adresse_user, abreviation_log_user FROM users WHERE email_user = ?");
    $result->execute(array($emailcabinet));
    $user = $result->fetch();

    if (!empty($user) && $user['password_user'] === $password) {
        session_start();
        $_SESSION['id_user'] = $user['id_user_at'];
        $_SESSION['matricule_user'] = $user['matricule_user'];
        $_SESSION['email_user'] = $user['email_user'];
        $_SESSION['nom_user'] = $user['nom_user'];
        $_SESSION['prenom_user'] = $user['prenom_user'];
        $_SESSION['adresse_user'] = $user['adresse_user'];
        $_SESSION['departement_user'] = $user['departement_user'];
        $_SESSION['password_user'] = $user['password_user'];
        $_SESSION['abreviation'] = $user['abreviation_log_user'];


        // Enregistrez la date et l'heure de la dernière connexion
        $now = new DateTime();
        $lastLogin = $now->format('Y-m-d H:i:s');
        $sqlUpdateLogin = "UPDATE users SET last_login_datetime = :lastLogin WHERE id_user_at = :userId";
        $stmt = $conn->prepare($sqlUpdateLogin);
        $stmt->bindParam(':lastLogin', $lastLogin);
        $stmt->bindParam(':userId', $_SESSION['id_user']);
        $stmt->execute();

        header('Location: dashboard.php');
    } else {
        header('Location: index.php?message=Email ou le Mot de passe saisi est incorrect !');
    }
}
?>
<!-- Votre formulaire de connexion ici -->
