<?php
session_start();
date_default_timezone_set('Africa/Bamako');
 if (isset($_SESSION['email_user'])) {
include 'nav.php';

include 'bdconnect.php';
}
?>


<div class="row">


 
<?php

if ((isset($_GET['id'])  and $_GET['id'] == 2)){

   $element_par_page=15;
              $sql = "SELECT id from messagerie where email_emetteur=? ";
$element_total_req= $conn->prepare($sql);
$element_total_req->execute(array($_SESSION['email_user']));
$element_total= $element_total_req->rowcount();

$page_totale=ceil($element_total/$element_par_page);

if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
  $_GET['page']=intval($_GET['page']);
  $page_courante=$_GET['page'];
}else{
  $page_courante=1;
}
$depart=($page_courante-1)*$element_par_page;

  $recupcabinet= $conn->prepare('SELECT * FROM messagerie WHERE email_emetteur = ? ORDER BY id DESC LIMIT '.$depart.','.$element_par_page);
    $recupcabinet -> execute(array($_SESSION['email_user']));
if ($recupcabinet != null){


?>

<div class="col-lg-3 col-md-4">
<div class="compose-btn">
<a href="nouveau_message.php" class="btn btn-primary btn-block">
Nouveaux Messages</a>
</div>
<ul class="inbox-menu">
<li class="active">
<a href="message_prive.php?id=1"><i class="fas fa-download"></i> Tous les Messages <span class="mail-count">(5)</span></a>
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
<div class="email-content">
<div class="table-responsive">
  <h1>Liste des Messages Envoyés</h1>
<table class="table table-inbox table-hover">
<thead>
<tr>
<th>
Nom Du Destinateur</th>
<th>
 Sujet
</th>
<th>
 Date
</th>
</tr>
</thead>
<tbody>


   <?php
while ($cabinet = $recupcabinet -> fetch()) {
   $recupca= $conn->prepare('SELECT nom_user FROM users  WHERE email_user = ?  ');
    $recupca -> execute(array($cabinet['email_recepteur']));
 $nom = $recupca -> fetch();
  ?>

  
<tr class="unread clickable-row">

<td >
  <a href="messageenvoyer.php?lecturee=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['email_recepteur'];?>"><?php echo $nom['nom_user'];?></a>

</td>
<td >
  <a href="messageenvoyer.php?lecturee=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['sujet'];?>"><?php echo $cabinet['sujet'];?></a>

</td>

<td >
  <a href="messageenvoyer.php?lecturee=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['sujet'];?>"><?php if(date("Y-m-d 00:00:00") <= $cabinet['datee'] and date("+Y-m-d 23:59:59") >= $cabinet['datee']){
echo "Aujourd'hui";
}else
 echo $cabinet['datee'];?></a>

</td>


</tr>
<?php
       }
       ?>


</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<?php
}
?>

<?php } ?>


<?php
if(isset($_GET["lecturee"])){
    $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE id = ? ORDER BY id');
    $recupcabinet -> execute(array($_GET["lecturee"]));

    $message = $recupcabinet -> fetch();
?>

<div class="col-lg-3 col-md-4">
<div class="compose-btn">
<a href="nouveau_message.php" class="btn btn-primary btn-block">
Nouveaux Messages</a>
</div>
<ul class="inbox-menu">
<li class="active">
<a href="message_prive.php?id=1"><i class="fas fa-download"></i> Tous les Messages <span class="mail-count">(5)</span></a>
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
<div class="email-content">
<div class="table-responsive">
 
  <div class="form-group">
            <label>Email: </label>
     <input class="form-control" type="text" name="nom_user" id="forme" value="<?php echo $message['email_recepteur'];?>">
   </div>
  
    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Sujet: </label>
                                    <input class="form-control" type="text" name="nom_user" id="forme"
                                        value="<?php echo $message['sujet']." ".$message['datee'];?>">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Bcc" class="form-control">
                                            </div>
                                        </div> -->
                        </div>

                        <div class="form-group">

                          <textarea name="libelle_messagerie" id="libelle_messagerie" class="form-control"
                           value="<?php echo $message['libelle_messagerie']?>">Message</textarea>
                           
                        </div>
  



<ul>
  <?php $pdo = new PDO('mysql:host=localhost;dbname=notaris', 'root', '');
$stmt = $pdo->prepare("SELECT fichier_pdf FROM messagerie WHERE id = :id");
$stmt->bindParam(':id', $_GET["lecturee"], PDO::PARAM_INT);
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

if (isset($_GET["rp"])) {

  # code...
  ?>


 
<div class="col-lg-9 col-md-8">
<div class="card">
<div class="card-body">
<div class="email-content">
<div class="table-responsive">

  <form action="mes.php">
                            

                            <div class="form-group">
                                <button name="Envoyer" class="btn btn-primary" value="Envoyer"
                                    class="form-control">Envoyer</button>

                        </form>
                     



                <?php
}else{
?>
                    <div class="row">
                    <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <a href="messageenvoyer.php?lecturee=<?php echo $_GET["lecturee"]; ?>&rp=ok" class="btn btn-primary"
                            id="lui">Repondre</a>
                    </div>
                  </div>
                    <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <a href="tranfertdemessage.php?idmessage=<?php echo $_GET["lecturee"]; ?>" class="btn btn-primary"
                            id="vous">Transferer</a>
                    </div>
                    </div>
                    </div>


                
                        <?php } ?>

 <?php
}


?>


</div>
</div>
</div>
</div>
</div>




<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>