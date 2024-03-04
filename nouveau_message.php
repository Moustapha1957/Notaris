
<?php
session_start();
 if (isset($_SESSION['email_user'])) {
include 'nav.php';

include 'bdconnect.php';
}
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
                    <div class="col-lg-9 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="reserve.php">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email_recepteur" required="" >
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Objet" name="sujet">
                                            </div>
                                        </div> 
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Bcc" class="form-control">
                                            </div>
                                        </div> -->
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control" id="exampleFormControlTextarea1" rows="3" name="libelle_messagerie" required=""></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="text-center">
                                            <input type="submit" name="Envoyer" value="Envoyer" class="form-control submit px-3 rounded-right btn btn-success m-l-5 far fa-save m-r-5">
                                            

                                                    <!--<button class="btn btn-primary"><i class="fas fa-paper-plane m-r-5"></i>
                                                <span>Send</span></button>
                                            <button class="btn btn-danger m-l-5" type="button"> <i
                                                    class="far fa-trash-alt m-r-5"></i><span>Delete</span></button>-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin  -->
            <!-- script -->
            <script src="assets/plugins/summernote/summernote-lite.min.js"></script>
            <!-- script -->