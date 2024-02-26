
     <?php
     $p = $conn->prepare('SELECT * FROM users WHERE email_user = ? '); 
$p -> execute(array( $_GET['l']));
$_SESSION['id'] = $_GET['l'];
$i = $p -> fetch()


     ?>  
 <center>
   <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h1 class="display-6 mb-4"></h1>
          <div class="card my-5">
           <form action= "traitement_message.php?idm=<?php //echo $_GET['idm'];?>" method="POST" class="card-body cardbody-color p-lg-5"  enctype="multipart/form-data">

          

          <div class="text-center">
             <h2 class="text-center btn-secondary text-dark mt-3">Nouveau Message</h2>
            </div>

            <div class="mb-3">
             <!-- <input type="email" value="<?php //echo $_GET['idm'];?>" class="form-control" name="email_recepteur" id="email_recepteur" placeholder="">-->
             <label><?php echo $i['nom_user']; ?></label>
            </div>

            <P><HR NOSHADE></P>

            <div class="mb-3">

              <input type="text" class="form-control"name="sujet" id="sujet" placeholder="sujet">
            </div>

            <P><HR NOSHADE></P>

            <div class="mb-3">
              <textarea class="form-control" name="libelle_messagerie" id="libelle_messagerie" placeholder="Message ..."></textarea>
             
            </div>

            <div class="mb-3">
            <label for="exampleFormControlFile1">Joindre un fichier PDF (facultatif)</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fichier_pdf">
            </div>


            <div class="text-center"><input type="submit" id="submit" name="Envoyer" class="btn btn-dark" value="ENVOYER"></div>
           
          </form>
        </div>

      </div>
    </div>
  </div>
               
                
            
        </center>  
                        
   