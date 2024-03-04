<?php  
$conn = new PDO("mysql:host=localhost;dbname=notaris;charset=utf8", "root", "");
session_start();

include 'nav_messagerie.php';
 ?>
 <?php
        include 'New/modal-10/pop.php';
          ?>

          <a href="message_privee.php?id=1"><img src="img/e-mail.png" alt="image" class="nav-item nav-link active"></a>




          <div class="container-fluid">

      
  <?php

        if (isset($_GET['id']) and  $_GET['id'] == 1) {
            # code...
         /*      $p = $conn->prepare('SELECT email_expediteur , email_destinateur, indexx FROM notification WHERE email_destinateur = ? ORDER BY id_notif DESC');*/

              $element_par_page=15;
              $sql = "SELECT id from messagerie where email_recepteur=? ";
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

/*$p -> execute(array( $_SESSION['email']));*/
 $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE email_recepteur = ?  ORDER BY id  DESC LIMIT '.$depart.','.$element_par_page);
    $recupcabinet -> execute(array($_SESSION['email_user']));
  ?>
<table id="t1" class="table" style="margin-right: 60px; width: 70%; height: 10%;">
    <thead class="table-primary respo">
      <tr>
           <th>Email </th>
             <center><th>Sujet</th></center>
             <th>Date</th>
               </tr>
                   </thead>
                   <META HTTP-EQUIV="REFRESH" CONTENT="120">
                   <tbody>

                                    <?php
while ($i = $recupcabinet -> fetch()) {
  # code...

   $recupca= $conn->prepare('SELECT nom_user FROM users  WHERE email_user = ?  ');
    $recupca -> execute(array($i['email_emetteur']));
 $nom = $recupca -> fetch();

                                   // if(isset($i['indexx']) and $i['indexx'] > 0 )
                                  //  {
                                if ($i['lecture'] == "non") {
                                  # code...


                                        ?>

                                         <tr style="background-color: #f1eeed; margin-left: 50px;">

                                            <td > <strong><a href="message_privee.php?nbr=<?php echo $i['id'];?>" ><?php echo $nom['nom_user'];?></a></strong></td>

                                        <center><td><strong><a href="message_privee.php?nbr=<?php echo $i['id'];?>"><?php echo $i['sujet'];?></a></strong></td></center>


                                        <td><strong><a href="message_privee.php?nbr=<?php echo $i['id'];?>"><?php
            if(date("Y-m-d 00:00:00") <= $i['datee'] and date("Y-m-d 23:59:59") >= $i['datee']){
                   echo "Aujourd'hui";
                   }else
                           echo $i['datee'];?></a></strong></td>
                                 </tr>
                                       <?php
                                }
                                  else{
                                   
                                    ?>
                                         <tr>

                                            <td><a href="message_privee.php?nbr=<?php echo $i['id'];?>" ><?php echo $nom['nom_user'];?></a></td>
                                        <td><a href="message_privee.php?nbr=<?php echo $i['id'];?>" ><?php echo $i['sujet'];?></a></td>

                                        <td><a href="message_privee.php?nbr=<?php echo $i['id'];?>"><?php if(date("Y-m-d 00:00:00") <= $i['datee'] and date("Y-m-d 23:59:59") >= $i['datee']){
                                         echo "Aujourd'hui";
                                            }else
                                           echo $i['datee'];?></a></td>
                                         
                                 
                                       <?php                         
                                         }
                              
                                    ?>
                                    </tr>
                                    <?php
                                }

                                ?>
                 

                      <?php
                        }
                        ?>

                          </tbody>
                            </META>
                          </table>               
    


                 <?php

                   if (isset($_GET['id'] ) and $_GET['id'] == 4 ) {
                   $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE email_recepteur = ? ORDER BY id');
                    $recupcabinet -> execute(array($_SESSION['email_user']));
                 if ($recupcabinet != null){
                 ?>
                   <center>
                    

                     <table id="t3" class="table responsive">
                                          <thead class="table-primary" >
                                            <tr>
                                              <th>Logo</th>
                                              <th colspan="2">Email de l'emetteur</th>
                                              <th>Sujet</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                  <?php
                                while($cabinet = $recupcabinet->fetch()){

            # code...
                                  $p = $conn->prepare('SELECT email_expediteur , email_destinateur, indexx FROM notification WHERE email_destinateur = ? ORDER BY id_notif DESC');

                                 $p -> execute(array( $_SESSION['email_user']));
                                $i = $p -> fetch();
                                     ?>

                                    <?php

                                        ?>


                                        <tr scope="row">

                                    <td>

                                         <a href="message_privee.php?lecture=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['email_emetteur'];?>"><img src="../img/avatar.jpg" class="rounded-circle" alt="" ></a>

                                    </td>
                                    <td colspan="2" >

                                       <a href="message_privee.php?lecture=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['email_emetteur'];?>"> <h5 class="mt-3 mb-1 text-left" style="padding-left: 50px;"><?php echo $cabinet['email_emetteur']; ?></h5></a>

                                    </td>

                                    <td colspan="2" >

                                       <a href="message_privee.php?lecture=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['sujet'];?>"> <h5 class="mt-3 mb-1 text-left" style="padding-left: 50px;"><?php echo $cabinet['sujet']; ?></h5></a>
                                    </td>
                        </tr>

                         <?php
                                    }?>
                                    </tbody>
                        </table>
                      </center>
                      <?php

                                }}
 ?>  


 <?php
if(isset($_GET["lecture"])){
    $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE id = ? ORDER BY id');
    $recupcabinet -> execute(array($_GET["lecture"]));

    $message = $recupcabinet -> fetch();
    $_SESSION["email_emetteur"] = $message['email_emetteur'];
    $_SESSION["sujet"] = $message['sujet'];
?>
<div class="container" style="padding-top: 50px; margin-left: -150px;">
<ul>
    <li>
        Email : <?php echo $message['email_emetteur']; ?>
    </li>
     <P><HR NOSHADE></P>
    <li>
        Sujet : <?php echo $message['sujet']."   ".$message['datee']; ?>
    </li>
     <P><HR NOSHADE></P>
    <li>
        Message : <?php echo $message['libelle_messagerie']; ?>
    </li>
</ul>
</div>
<?php

if (isset($_GET["rp"])) {

  # code...
  ?>

  <form action="mes.php" method="POST">
<textarea name="libelle_messagerie" style=" width: 700px; height: 200px;" required=""></textarea><br><br>
<center><input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary"></center>
</form>
<?php
}else{
?>
<table>
  <tr>
    <td><a href="message_privee.php?lecture=<?php echo $_GET["lecture"]; ?>&rp=ok" class="btn" id="lui" >Repondre</a></td>
    <td>

<a href="message_privee.php?idmessage=<?php echo $_GET["lecture"]; ?>" class="btn" id="vous">Transferer</a></td>
</tr>
</table>
<?php
}
}
 ?>
<?php

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


<?php
if(isset($_GET["nbr"])){
  //$l=int($_GET["idm"]);
   $update = $conn -> prepare('UPDATE messagerie SET lecture = "oui" WHERE id = ? ');
 $update ->execute(array( $_GET["nbr"]));

    $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE id=?  ORDER BY id DESC LIMIT '.$_GET["nbr"]);
    $recupcabinet -> execute(array($_GET["nbr"]));
$i = $recupcabinet -> fetch();

?>

<div class="container" style="padding-top: 50px; margin-left: -90px;">
<ul>
    <strong><li>
        Email : <?php //echo $_GET["idm"];
        if ($i['email_recepteur'] == $_SESSION['email_user']){
            $_SESSION["email_emetteur"] = $i['email_emetteur'];

          echo $i['email_emetteur']; }
        else {
            $_SESSION["email_emetteur"] = $i['email_recepteur'];
          echo $i['email_recepteur'];}
           $_SESSION["sujet"] = $i['sujet'];
        ?>
    </li></strong>
  </ul>
<?php
   // $message = $recupcabinet -> fetch();


?>

<ul>

     <P><HR NOSHADE></P>
    <li>
        <strong>Sujet :</strong> <?php echo $i['sujet']."  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ".$i['datee']; ?>
    </li>
     <P><HR NOSHADE></P>
    <li class="">
        <strong>Message :</strong> <?php echo $i['libelle_messagerie']; ?>
    </li><br>
</ul>
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
<form action="mes.php" method="POST"><br>
<textarea name="libelle_messagerie" style=" width: 700px; height: 200px;" required=""></textarea><br><br>
<center><input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary"></center>
</form>
  <?php
}else{
?>
<table >
  <tr>
    <td><a href="message_privee.php?nbr=<?php echo $_GET["nbr"]; ?>&rp=ok" class="btn">Repondre</a></td>

    <td><a href="message_privee.php?idmessage=<?php echo $_GET["nbr"]; ?>" class="btn">Transferer</a></td>

</tr>
</table>
<?php
}
?>
</div>

<?php
}
 ?>
       <!--    envoie d'un nouveau message par selection de mail        -->
       <?php
       if (isset($_GET['l'])){

        include("test.php");
       }
       ?>

       <?php

/*
****************      Affichage du contact  pour id = 3   ************************************
*/



 if ((isset($_GET['id'])  and $_GET['id'] == 3) or isset($_GET['recherche']) ) {
    $element_par_page=5;
$element_total_req= $conn->query('select id_user_at from users');
$element_total= $element_total_req->rowcount();

$page_totale=ceil($element_total/$element_par_page);
if(!isset($_GET['recherche'])){
if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
    $_GET['page']=intval($_GET['page']);
    $page_courante=$_GET['page'];
}else{
    $page_courante=1;
}
$depart=($page_courante-1)*$element_par_page;
$p = $conn->prepare('SELECT * FROM users WHERE email_user <> ? LIMIT '.$depart.','.$element_par_page);
}
else $p = $conn->prepare('SELECT * FROM users WHERE email_user <> ? ');
?>
<!--<form action="message_privee.php?" method="GET" >
   <input type="search" name="recherche"  class="form-control" placeholder="Search">
    <button type="submit" class="btn btn-primary">Recherche</button><br><br>
    <div class="input-group mb-3" style="width: 950px;">
  <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2" name="recherche" required="">
 <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Recherche</button>
</div>

</form>-->
<div class="container-fluid">
<table class="display" style="width:100%" id="t2">
              <thead>
              <tr class="table-primary">
                <th>Logo</th>
                <th >EMAIL</th>
                <th>NOM</th>
                </tr>

                </thead>
                <tbody style="">

<?php


$p -> execute(array( $_SESSION['email_user']));


                while($i = $p -> fetch()){


?>

               <tr scope="row">
                                    <td>
                                       <!-- <a href="test.php?idm=<?php //echo $i['email'];?>">-->
                                          <a href="message_privee.php?l=<?php echo $i['email_user']; ?>">
                                        <img src="img/avatar.png" class="rounded-circle" alt="" >
                                        </a>
                                    </td>
                                    <td  >
                                       <!-- <a href="test.php?idm=<?php //echo $i['email'];?>">-->
                                          <a href="message_privee.php?l=<?php echo $i['email_user']; ?>">
                                        <h5 class="mt-3 mb-1 text-left" style="padding-left: 50px;"><?php echo $i['email_user']; ?></h5>
                                        </a>
                                    </td>
                                    <td>
                                       <!--  <a href="test.php?idm=<?php //echo $i['email'];?>">-->
                                        <a href="message_privee.php?l=<?php echo $i['email_user']; ?>">

                                        <h5 class="mt-3 mb-1 text-left" style="padding-left: 50px;"><?php echo $i['nom_user']; ?></h5>
                                        </a>
                                    </td>
                        </tr>

<?php

             }
         
                 ?>
                 </tbody>
        </table>

            </div>
                

<?php

}
  ?>

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
<table class="table" id="t4">
  <thead class="table-primary">
    <tr class="container">
      <th>Email Du Destinateur</th>
      <th>Sujet</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php
while ($cabinet = $recupcabinet -> fetch()) {
   $recupca= $conn->prepare('SELECT nom_user FROM users  WHERE email_user = ?  ');
    $recupca -> execute(array($cabinet['email_recepteur']));
 $nom = $recupca -> fetch();
  ?>
    <tr>
      <td><a href="message_privee.php?lecturee=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['email_recepteur'];?>"><?php echo $nom['nom_user'];?></a></td><br>

      <td><a href="message_privee.php?lecturee=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['sujet'];?>"><?php echo $cabinet['sujet'];?></a></td>

      <td><a href="message_privee.php?lecturee=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['sujet'];?>"><?php if(date("Y-m-d 00:00:00") <= $cabinet['datee'] and date("Y-m-d 23:59:59") >= $cabinet['datee']){
echo "Aujourd'hui";
}else
 echo $cabinet['datee'];?></a></td>
    </tr><?php } ?>
  </tbody>
</table>


<?php
}
 ?>



                      <?php
}
?>


<?php
if(isset($_GET["lecturee"])){
    $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE id = ? ORDER BY id');
    $recupcabinet -> execute(array($_GET["lecturee"]));

    $message = $recupcabinet -> fetch();
?>
<div class="container" style="padding-top: 50px; margin-left: -100px;">
<ul>
    <li>
        Email : <?php echo $message['email_recepteur']; ?>
    </li>
     <P><HR NOSHADE></P>
    <li>
        Sujet : <?php echo $message['sujet']." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  ".$message['datee']; ?>
    </li>
     <P><HR NOSHADE></P>
    <li>
        Message : <?php echo $message['libelle_messagerie']; ?>
    </li><br>
</ul>

<ul>
  <?php $pdo = new PDO('mysql:host=localhost;dbname=notaris', 'root', '');
$stmt = $pdo->prepare("SELECT fichier_pdf FROM messagerie WHERE id = :id");
$stmt->bindParam(':id', $_GET["lecturee"], PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch();
$pdfFilename = $row['fichier_pdf'];

if ($pdfFilename) {
    // Si le nom du fichier est présent dans la base de données
    echo "<a href='pdf_join/{$pdfFilename}' target='_blank'>Télécharger le Fichier Joint</a>";
} else {
    // Si le nom du fichier est NULL
    echo "Aucun Fichier n'a été joint.";
} ?>
</ul>
</div>
<?php

if (isset($_GET["rp"])) {

  # code...
  ?>
  <form action="mes.php" method="POST"><br>
<textarea name="libelle_messagerie" style=" width: 700px; height: 200px;" required=""></textarea><br><br>
<center><input type="submit" name="Envoyer" value="Envoyer" class="btn btn-primary"></center>
</form>
  <?php
}else{
?>
<table>
  <tr>
    <td><a href="message_privee.php?lecturee=<?php echo $_GET["lecturee"]; ?>&rp=ok" class="btn" id="lui" >Repondre</a></td>
    <td><a href="message_privee.php?idmessage=<?php echo $_GET["lecturee"]; ?>" class="btn" id="vous">Transferer</a></td>
</tr>
</table>
<?php
}

}
 ?>


    </ul>


  </div>




    
        <script src="vendor/apexcharts/apexcharts.min.js"></script>
        <script src="Vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/chart.js/chart.umd.js"></script>
        <script src="vendor/echarts/echarts.min.js"></script>
        <script src="vendor/quill/quill.min.js"></script>
        <script src="vendor/simple-datatables/simple-datatables.js"></script>
        <script src="vendor/tinymce/tinymce.min.js"></script>
        <script src="vendor/php-email-form/validate.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>


      <script>
    $(document).ready(function() {
        $('#t1').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#t2').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#t3').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#t4').DataTable();
    });
</script>


  </body>
</html>

