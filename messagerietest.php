<?php 
session_start();
date_default_timezone_set('Africa/Bamako');
if (isset($_SESSION['email_user'])) {
require ('nav.php');
require ('bdconnect.php');
}
?>
</head>
<body>
	<?php
        include 'New/modal-10/pop.php';
          ?>
          <a href="messagerietest.php?id=1"><img src="img/e-mail.png" alt="image" class="nav-item nav-link active"></a>




          


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


                
  <div class="row">
  <div class="col-12">
    <div class="card comman-shadow">
                    <div class="card-body">
<table class="table table-striped table-bordered">
    <thead class="table-primary respo">
      <tr>
           <th scope="col">Email </th>
            <th scope="col">Sujet</th>
             <th scope="col">Date</th>
               </tr>
                   </thead>
                   <!--<META HTTP-EQUIV="REFRESH" CONTENT="120">-->
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

                                         <tr>

                                            <td scope="row"> <strong><a href="message_contenu.php?nbr=<?php echo $i['id'];?>" ><?php echo $nom['nom_user'];?></a></strong></td>

                                       <td scope="row"><strong><a href="message_contenu.php?nbr=<?php echo $i['id'];?>"><?php echo $i['sujet'];?></a></strong></td>


                                        <td scope="row"><strong><a href="message_contenu.php?nbr=<?php echo $i['id'];?>"><?php
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

                                            <td scope="row"><a href="message_contenu.php?nbr=<?php echo $i['id'];?>" ><?php echo $nom['nom_user'];?></a></td>
                                        <td scope="row"><a href="message_contenu.php?nbr=<?php echo $i['id'];?>" ><?php echo $i['sujet'];?></a></td>

                                        <td scope="row"><a href="message_contenu.php?nbr=<?php echo $i['id'];?>"><?php if(date("Y-m-d 00:00:00") <= $i['datee'] and date("Y-m-d 23:59:59") >= $i['datee']){
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
                           
                          </table> 
                        </div>
                      </div>

                        </div>
                      </div>
                    


                          <?php

                   if (isset($_GET['id'] ) and $_GET['id'] == 4 ) {
                   $recupcabinet= $conn->prepare('SELECT * FROM messagerie  WHERE email_recepteur = ? ORDER BY id');
                    $recupcabinet -> execute(array($_SESSION['email']));
                 if ($recupcabinet != null){
                 ?>
            <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
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

                                 $p -> execute(array( $_SESSION['email']));
                                $i = $p -> fetch();
                                     ?>

                                    <?php

                                        ?>


                                        <tr scope="row">

                                    <td>

                                         <a href="messagerietest.php?lecture=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['email_emetteur'];?>"><img src="../img/avatar.jpg" class="rounded-circle" alt="" ></a>

                                    </td>
                                    <td colspan="2" >

                                       <a href="messagerietest.php?lecture=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['email_emetteur'];?>"> <h5 class="mt-3 mb-1 text-left" style="padding-left: 50px;"><?php echo $cabinet['email_emetteur']; ?></h5></a>

                                    </td>

                                    <td colspan="2" >

                                       <a href="messagerietest.php?lecture=<?php echo $cabinet['id'];?>&idm=<?php echo $cabinet['sujet'];?>"> <h5 class="mt-3 mb-1 text-left" style="padding-left: 50px;"><?php echo $cabinet['sujet']; ?></h5></a>
                                    </td>
                        </tr>

                         <?php
                                    }?>
                                    </tbody>
                        </table>
                     </div>
                   </div>
                 </div>
                </div>
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
<div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                       <div class="row">
                                <div class="col-12">
                                  <div class="col-12 col-sm-4">
                                  <div class="form-group local-forms">
                                        <a href="messagerietest.php?lecture=<?php echo $message['email_emetteur']; ?>&rp=ok" class="btn" id="lui" >Email</a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                  <div class="form-group local-forms">
                                        <a href="messagerietest.php?lecture=<?php echo  $message['sujet']."   ".$message['datee']; ?>&rp=ok" class="btn" id="lui" >Sujet</a>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                  <div class="form-group local-forms">
                                        <a href="messagerietest.php?lecture=<?php echo  $message['libelle_messagerie']; ?>&rp=ok" class="btn" id="lui" >Message</a>
                                    </div>
                                </div>
                                </div>
</div>
</div>
</div>
</div>
</div>

<?php

if (isset($_GET["rp"])) {

  # code...
  ?>

  <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="mes.php" method="post" class="custom-form contact-form" role="form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group local-forms">
                                        <textarea name="libelle_messagerie" id="libelle_messagerie" class="form-control" required="">Message</textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button name="Envoyer"  class="btn btn-primary" type="submit" value="Envoyer" class="form-control">Enregistrer</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                         </div>
                </div>
            </div>
             </div>
<?php
}else{
?>
                                 <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <a href="messagerietest.php?lecture=<?php echo $_GET["lecture"]; ?>&rp=ok" class="btn" id="lui" >Repondre</a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <a href="messagerietest.php?idmessage=<?php echo $_GET["lecture"]; ?>" class="btn" id="vous">Transferer</a>
                                    </div>
                                </div>
                   
<?php
}
}
 ?> 





       

      






    
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

    

</body>






<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>