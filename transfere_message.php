 <?php
 session_start();
 date_default_timezone_set('Africa/Bamako');
 include 'bdconnect.php';
 include 'nav.php';

//*********   code pour transfert message    ***********************
if(isset($_GET["idmessage"])){
  $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE id = ? ORDER BY id');
    $recupcabinet -> execute(array($_GET["idmessage"]));



    $message = $recupcabinet -> fetch();
    $_SESSION["email_emetteur"] = $message['email_emetteur'];
    $_SESSION["sujet"] = $message['sujet'];
    $_SESSION["message"] = $message['libelle_messagerie'];

      $nom= $conn->prepare('SELECT nom_user FROM users  WHERE email_user = ? ORDER BY id_user_at');
      if($message['email_emetteur'] !== $_SESSION["email_user"]){
    $nom -> execute(array($message['email_emetteur']));
    }else{
       $nom -> execute(array($message['email_recepteur']));
    }
    $name = $nom -> fetch();
require("ContactFrom_v1/index.php");

}
?>