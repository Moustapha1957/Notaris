<?php 
include 'bdconnect.php';
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'bdconnect.php';

if(isset($_POST['recup'])) {
    // Récupération de l'adresse e-mail fournie par l'utilisateur
    $email_recuperation = $_POST['email_recuperation'];

    // Vérification de l'existence de l'e-mail dans la table des utilisateurs
   // Vérification de l'existence de l'e-mail dans la table des utilisateurs en utilisant PDO
    $query = "SELECT * FROM users WHERE email_user = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email_recuperation);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        // L'e-mail existe dans la base de données, procéder à l'envoi de l'e-mail de récupération

        $link = '<a href="192.168.10.125/Notaris/newpassword.php?email='.$email_recuperation.'">Ici</a>';

        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'moustaphadiaby861@gmail.com';
            $mail->Password = 'qseadjrrismhhrra';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataire de l'e-mail de récupération
            $mail->setFrom('libreserviceshopreate@gmail.com', 'Notaris');
            $mail->addAddress($email_recuperation);

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Récupération de mot de passe';
            $mail->Body = 'Bonjour, vous avez demandé une récupération de mot de passe, cliquez sur ce lien '.$link;

            // Envoi de l'e-mail
            $mail->send();

            if ($mail) {
                
                echo "<script>alert('L\'e-mail de récupération a été envoyé avec succès!')</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";

            }
            

            
        } catch (Exception $e) {
            echo 'Erreur lors de l\'envoi de l\'e-mail: ', $mail->ErrorInfo;
        }
    } else {
        // L'e-mail n'existe pas dans la base de données
        echo 'L\'adresse e-mail fournie n\'est pas associée à un compte. Veuillez saisir une adresse e-mail valide.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Notaris</title>

<link rel="shortcut icon" href="assetstyle/img/logo-small.png">

<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="assetstyle/plugins/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="assetstyle/plugins/feather/feather.css">

<link rel="stylesheet" href="assetstyle/plugins/icons/flags/flags.css">

<link rel="stylesheet" href="assetstyle/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assetstyle/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assetstyle/css/style.css">
</head>
<body>

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img class="img-fluid" src="assetstyle/img/login.png" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Réinitialiser le mot de passe</h1>
<p class="account-subtitle">Laissez-nous vous aider</p>

<form method="POST" action="">
<div class="form-group">
<label>Entrez votre adresse e-mail enregistrée <span class="login-danger">*</span></label>
<input class="form-control" name="email_recuperation" type="text">
<span class="profile-views"><i class="fas fa-envelope"></i></span>
</div>
<div class="form-group">
<button class="btn btn-primary btn-block" name="recup" type="submit">Réinitialiser mon mot de passe</button>
</div>
<div class="form-group mb-0">
    <a href="index.php" class="btn btn-primary primary-reset btn-block">Se connecter</a>
<!--<button class="btn btn-primary primary-reset btn-block" type="submit"></button>-->
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>