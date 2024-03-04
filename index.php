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
<img class="img-fluid" src="assetstyle/img/logo_log.png" alt="Logo">
</div>
<div class="login-right">
<div class="login-right-wrap">
<h1>Bienvenu Sur Notaris</h1>

<h2>Se connecter</h2>

<form method="POST" action="tr_login.php">
<div class="form-group">
<label>Email <span class="login-danger">*</span></label>
<input class="form-control" name="email_user" type="text">
<span class="profile-views"><i class="fas fa-user-circle"></i></span>
</div>
<div class="form-group">
<label>Mot de passe <span class="login-danger">*</span></label>
<input class="form-control pass-input" name="password_user" type="password">
<span class="profile-views feather-eye toggle-password"></span>
</div>
<div class="forgotpass">
<!--<div class="remember-me">
<label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
<input type="checkbox" name="radio">
<span class="checkmark"></span>
</label>
</div>-->
<a href="forgotpassword.php">Mot de passe oublié ?</a>
</div>
<div class="form-group">
<button class="btn btn-primary btn-block" name="submit" type="submit">Se connecter</button>
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