<?php
session_start();
date_default_timezone_set('Africa/Bamako');
include 'nav.php';
if(isset($_GET["nbr"])){
  //$l=int($_GET["idm"]);
   $update = $conn -> prepare('UPDATE messagerie SET lecture = "oui" WHERE id = ? ');
 $update ->execute(array( $_GET["nbr"]));

    $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE id=?  ORDER BY id DESC LIMIT '.$_GET["nbr"]);
    $recupcabinet -> execute(array($_GET["nbr"]));
$i = $recupcabinet -> fetch();

?>

<div class="content container-fluid"> 
         <div class="row">
   <div class="col-lg-3 col-md-4">
<div class="compose-btn">
<a href="nouveau_message.php" class="btn btn-primary btn-block">
Nouveaux Messages</a>
</div>
<ul class="inbox-menu">
<li class="active">
<a href="inbox.php?id=1"><i class="fas fa-download"></i> Tous les Messages <span class="mail-count">(5)</span></a>
</li>

<li>
<a href="message_select_contact.php?id=3"><i class="far fa-star"></i> Liste des Contacts</a>
</li>
<li>
<a href="messageenvoyer.php?id=2"><i class="far fa-paper-plane"></i> Messages envoyer</a>
</li>
<!--<li>
<a href="#"><i class="far fa-file-alt"></i> Drafts <span class="mail-count">(13)</span></a>
</li>-->
<li>
<a href="#"><i class="far fa-trash-alt"></i>supprimer</a>
</li>
</ul>
</div>

<div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-body">
                      
                    	<div class="row">
                    	<div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                        <label>Email : </label>
                                        <?php
                                        if ($i['email_recepteur'] == $_SESSION['email_user']){
                               $_SESSION["email_emetteur"] = $i['email_emetteur'];
                                        ?>
                                        <input class="form-control" type="text" name="nom_user" id="forme" value="<?php echo $i['email_emetteur'];?>" readonly>

                                        <?php 
                                            } 
                                     else {
                                  $_SESSION["email_emetteur"] = $i['email_recepteur'];
                                         ?>
                                         <input class="form-control" type="text" name="nom_user" id="forme" value="<?php echo $i['email_recepteur'];?>" readonly>
                                         <?php 
                                         }
                                $_SESSION["sujet"] = $i['sujet']; ?>
                                    </div>
                                </div>
                            </div>


<?php
   // $message = $recupcabinet -> fetch();


?>


                    <div class="row">
                    	<div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                        <label>Sujet: </label>
                                       
                                        <input class="form-control" type="text" name="nom_user" id="forme" value="<?php echo $i['sujet']." ".$i['datee'];?>" readonly>
                                         
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                    	<div class="col-12 col-sm-12">
                                    <div class="form-group local-forms">
                                       <label>Message: </label>
                                      <textarea rows="4" class="form-control" id="exampleFormControlTextarea1" type="text"  required=""><?php echo $i['libelle_messagerie'];?></textarea>

                                    </div>
                                </div>
                            </div>


<ul>
  <?php $pdo = new PDO('mysql:host=localhost;dbname=notaris', 'root', '');
$stmt = $pdo->prepare("SELECT fichier_pdf FROM messagerie WHERE id = :id");
$stmt->bindParam(':id', $_GET["nbr"], PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch();
$pdfFilename = $row['fichier_pdf'];

if ($pdfFilename) {
    // Si le nom du fichier est présent dans la base de données
    echo "<a href='pdf_join/{$pdfFilename}' target='_blank'>Télécharger le Fichier  ".$row['fichier_pdf']."</a>";
} else {
    // Si le nom du fichier est NULL
    echo "Aucun Fichier n'a été joint.";
} ?>
</ul>
<?php
?>

<?php

if (isset($_GET["rp"])) {

  # code...
  ?>


                        <form action="mes.php" method="post" class="custom-form contact-form" role="form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <textarea name="libelle_messagerie" id="libelle_messagerie" class="form-control" required="">Message</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button name="Envoyer"  class="btn btn-primary"  value="Envoyer" class="form-control">Envoyer</button>
                                    </div>
                                </div>
                                
                    
                                
                            </div>
                        </form>

                       
             
  <?php
}else{
?>



      
                         <div class="col-12 col-sm-6">
                           <div class="form-group local-forms">
                                        <a href="message_contenu.php?nbr=<?php echo $_GET["nbr"]; ?>&rp=ok" class="btn btn-primary">Repondre</a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group local-forms">
                                        <a href="tranfertdemessage.php?idmessage=<?php echo $_GET["nbr"]; ?>" class="btn btn-primary">Transferer</a>
                                    </div>
                                </div>
<?php
}
?>

 </div>
</div>
</div>
</div>
</div>




<?php
}
 ?>