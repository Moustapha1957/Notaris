<?php
require ('bdconnect.php');
session_start();

if ( isset($_POST['Envoyer'])) {


	$getid=htmlspecialchars($_POST['email_recepteur']);

	
	$recupuser=$conn->prepare('SELECT * from users where email_user =?');
	$recupuser->execute(array($getid));
	if ($recupuser->rowcount()>0) {
		
	$message= htmlspecialchars($_POST['libelle_messagerie']);
	$sujets= htmlspecialchars($_POST['sujet']);
	$datee= date("Y/m/d H:i:s");
	$inserer_message= $conn->prepare('INSERT INTO messagerie(email_emetteur, email_recepteur, sujet, libelle_messagerie, datee) VALUES(?, ?, ?, ?, ?)');
	$inserer_message->execute(array($_SESSION['email_user'], $getid, $sujets, $message, $datee));
	//incrementation index notification
	$p = $conn->prepare('SELECT email_expediteur , email_destinateur from notification where email_expediteur =? AND email_destinateur = ?'); 
$p -> execute(array($_SESSION['email_user'], $getid));
$p = $p-> fetch();

if(!$p){
  $inserer_message= $conn->prepare('INSERT INTO notification(email_expediteur, email_destinateur) VALUES(?, ?)');
 $inserer_message->execute(array( $_SESSION['email_user'],  $getid));
}
 $update = $conn -> prepare('UPDATE notification SET indexx = indexx + 1 WHERE email_expediteur = ? and email_destinateur = ?');
 $update ->execute(array( $_SESSION['email_user'],  $getid));
unset($_POST['libelle_messagerie']);
	
header("Location:message_prive.php?id=1");
	
}else{
	echo"Aucun utilisateur trouver pour ce mail !";
}

}else{


echo"Aucun email trouvé";
echo $getid;
}


?>