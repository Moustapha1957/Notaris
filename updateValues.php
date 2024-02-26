<?php
// updateValues.php

session_start();

// Récupérez les valeurs envoyées via POST
$formeremisee = $_POST['formeremise'];
$formeapresremisee = $_POST['formeapresremise'];

// Utilisez ces valeurs comme vous le souhaitez (par exemple, stockez-les dans des variables de session)
$_SESSION['formeremise'] = $formeremisee;
$_SESSION['formeapresremise'] = $formeapresremisee;

// Vous pouvez renvoyer une réponse si nécessaire
echo 'Mises à jour effectuées avec succès';
?>
