<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Contact V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../ContactFrom_v1/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../ContactFrom_v1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../ContactFrom_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../ContactFrom_v1/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../ContactFrom_v1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../ContactFrom_v1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../ContactFrom_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="../ContactFrom_v1/css/main.css">
<!--===============================================================================================-->
</head>
<body>



	<div class="">
		<!--<div class="container-contact1">-->
			<div >
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="" alt="">
			</div>

			<form class="contact1-form validate-form" action="mes.php" method="POST">
				<span class="contact1-form-title">
				<?php echo $name['nom_user'];?>
				</span>

				

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="email" name="mail_recep" placeholder="Email du destinateur" required="">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1 disabled" type="text" name="sujet" value="<?php echo $message['sujet']?>" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="libelle_messagerie" placeholder="Message"><?php echo $message['libelle_messagerie']?></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="Envoyer">
						<span>
							Envoyer
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="../ContactFrom_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../ContactFrom_v1/vendor/bootstrap/js/popper.js"></script>
	<script src="../ContactFrom_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../ContactFrom_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../ContactFrom_v1/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="../ContactFrom_v1/js/main.js"></script>

</body>
</html>
