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
<div class="email-header">

</div>
<div class="email-content">
<div class="table-responsive">
  <h1>Liste des nouveaux Messages</h1>
   <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="reserve.php">
                                  <span class="contact1-form-title">
                                  <?php echo $name['nom_user'];?>
                                  </span>

                                    <div class="form-group">
                                        <input class="form-control"class="input1" type="email" placeholder="Email du destinateur ex: name@example.com" name="email_recepteur" required="" >
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                            <div class="form-group">
                                                <input  class="form-control" class="input1 disabled" type="text" name="sujet" value="<?php echo $message['sujet']?>"  placeholder="Subject">
                                            </div>
                                        </div> 
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Bcc" class="form-control">
                                            </div>
                                        </div> -->
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $message['libelle_messagerie']?>
                                          
                                        </textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="text-center">
                                            <input type="submit" name="Envoyer" value="Envoyer" class="form-control submit px-3 rounded-right btn btn-success m-l-5 far fa-save m-r-5">
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

</div>
</div>
</div>
</div>
</div>

<?php } ?>


