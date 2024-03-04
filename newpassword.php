<?php
include 'bdconnect.php';

$email = $_GET['email'];


if (isset($_POST['changer'])) {
	
	$newpass1 = $_POST['newpass1'];
	$newpass2 = $_POST['newpass2'];

	if ($newpass1 != $newpass2) {
		
		echo "<script>alert('Les deux champs doivent etre les memes !')</script>";
	}elseif ($newpass1 == $newpass2) {

		$pass = $newpass2;
		
		$update = $conn -> prepare('UPDATE users SET password_user = ? WHERE email_user = ?');
 $update ->execute(array( $pass, $email));

 if ($update) {
 	echo "<script>alert('Password Modifier avec Succès !')</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
 }
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
<h1>Nouveau Mot de Passe</h1>
<p class="account-subtitle">Entrez Votres Nouveau Mot de Passe</p>

<form method="POST" action="">


<div class="form-group">
<label>Mot de passe <span class="login-danger">*</span></label>
<input class="form-control pass-input" name="newpass1" type="password" required="">
<span class="profile-views feather-eye toggle-password"></span>
</div>

<div class="form-group">
<label>Confirmez le mot de passe <span class="login-danger">*</span></label>
<input class="form-control pass-confirm" name="newpass2" type="password" required="">
<span class="profile-views feather-eye reg-toggle-password"></span>
</div>

<div class=" dont-have">Vous vous souvenez du mot de passe ? <a href="login.html">Se Connecter</a></div>
<div class="form-group mb-0">
<button class="btn btn-primary btn-block" name="changer" type="submit">Confirmer</button>
</div>
</form>

<!--<div class="login-or">
<span class="or-line"></span>
<span class="span-or">or</span>
</div>

<div class="social-login">
<a href="#"><i class="fab fa-google-plus-g"></i></a>
<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-linkedin-in"></i></a>
</div>-->

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