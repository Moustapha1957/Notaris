<?php
session_start();
date_default_timezone_set('Africa/Bamako');
require("bdconnect.php");
if (isset($_POST['libelle_messagerie'])) {
	# code...
	$message = $_POST['libelle_messagerie'];
}
else{
$message = $_SESSION["message"];
}
if (isset($_POST['mail_recep'])) {
	# code...
	$email = $_POST['mail_recep'];
}else
$email = $_SESSION["email_emetteur"];
$objet = $_SESSION["sujet"];
$datee= date("y/m/d H:i:s");

if (isset($_POST["Envoyer"])) {
     $recupuser=$conn->prepare('INSERT INTO messagerie(email_emetteur, email_recepteur, sujet, libelle_messagerie, datee) VALUES (?, ?, ?, ?, ?)');
	$recupuser->execute(array($_SESSION['email_user'], $email, $objet, $message, $datee));

	// insertion dans la table notification 
$p = $conn->prepare('SELECT email_expediteur , email_destinateur from notification where email_expediteur =? AND email_destinateur = ?'); 
$p -> execute(array($_SESSION['email_user'],$email));
$p = $p-> fetch();

if(!$p){
  $inserer_message= $conn->prepare('INSERT INTO notification(email_expediteur, email_destinateur) VALUES(?, ?)');
 $inserer_message->execute(array( $_SESSION['email_user'], $email));
}
 $update = $conn -> prepare('UPDATE notification SET indexx = indexx + 1 WHERE email_expediteur = ? and email_destinateur = ?');
 $update ->execute(array( $_SESSION['email_user'], $email));
	header("Location:message_prive.php?id=1");
  }