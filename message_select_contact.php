 <?php
 session_start();
 date_default_timezone_set('Africa/Bamako');
 include 'bdconnect.php';
include 'nav.php';
       /*
****************      Affichage du contact  pour id = 3   ************************************
*/
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

<?php



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

<div class="col-lg-9 col-md-8">
<div class="card">
<div class="card-body">
<div class="email-header">
<div class="col-sm-12">
  <div class="email-content">
<div class="table-responsive">
<table class="table table-inbox table-hover">
    <thead class="table-primary respo">
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
                                          <a href="message_par_Select.php?l=<?php echo $i['email_user']; ?>">
                                        <img src="img/avatar.png" class="rounded-circle" alt="" >
                                        </a>
                                    </td>
                                    <td  >
                                       <!-- <a href="test.php?idm=<?php //echo $i['email'];?>">-->
                                          <a href="message_par_Select.php?l=<?php echo $i['email_user']; ?>">
                                        <h5 class="mt-3 mb-1 text-left" style="padding-left: 50px;"><?php echo $i['email_user']; ?></h5>
                                        </a>
                                    </td>
                                    <td>
                                       <!--  <a href="test.php?idm=<?php //echo $i['email'];?>">-->
                                        <a href="message_par_Select.php?l=<?php echo $i['email_user']; ?>">

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
            </div>
            </div>
            </div>
               </div>
             </div>
             <div>
               
             </div>
             </div>
                
                
                

<?php

}
  ?>

  <!--    envoie d'un nouveau message par selection de mail        -->
       








                    





       