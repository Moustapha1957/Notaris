<?php
session_start();
if (isset($_SESSION['email_user'])) {
  include 'nav.php';


?>

  <section class="contact-section section-padding" id="section_5">
    <div class="contenaire-fluid">
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <h3 class="card-title">
              Enregistrement des Clients
            </h3>
          </div>
          <div class="row">
            <div class="col-md-12 col-lg-12 col-12">
              <form action="insert_cleint.php" method="post" class="custom-form contact-form" role="form">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="floatingInput">Nom Client</label>
                      <input ttype="text" name="nom_client" id="forme" class="form-control" placeholder="nom" required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="prenom_particulier">Prénom Client:</label>
                      <input type="text" name="prenom_client" id="capital" class="form-control" placeholder="prenom" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="profession_particulier">Adresse Client:</label>
                      <input type="text" name="adresse_client" id="siege" class="form-control" placeholder="Adresse" required="">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="adresse_particulier">Contact Client:</label>
                      <input type="text" name="contact_client" id="administration" class="form-control" placeholder="contact" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="adresse_particulier">Prénom du Père:</label>
                      <input type="text" name="prenom_pere_client" id="prenom_pere_client" class="form-control" placeholder="Prénom du Père" required="">

                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="adresse_particulier">Nom du Père:</label>
                      <input type="text" name="nom_pere_client" id="nom_pere_client" class="form-control" placeholder="Nom du Père" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="adresse_particulier">Prénom de la Mère:</label>
                      <input type="text" name="prenom_mere_client" id="prenom_mere_client" class="form-control" placeholder="Prénom de la Mère" required="">
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="adresse_particulier">Nom de la Mère:</label>
                      <input type="text" name="nom_mere_client" id="nom_mere_client" class="form-control" placeholder="Nom de la Mère" required="">

                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="type_contrat">Situation Matrimonial :</label>
                      <input type="text" name="situation_matrimoniale" id="denomination" class="form-control" placeholder="Situation Matrimonial">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-floating">
                      <label for="type_contrat">Email Client :</label>
                      <input type="email" name="email_client" id="denomination" class="form-control" placeholder="email">
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-12">
                    <div class="form-floating">
                      <label for="adresse_particulier">Autres Informations:</label>
                      <textarea name="autres_informations" id="autres_informations" class="form-control" required="">Autres Informations</textarea>
                    </div>

                  </div>
                </div><br><br>

                <center>
                  <div class="col-md-12 col-lg-12 col-12">
                    <button class="btn  btn-primary" type="submit" name="submit" value="Enregistrer" class="form-control">Enregistrer</button>
                </center>

              </form>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section>
  <script src="vendor/apexcharts/apexcharts.min.js"></script>
  <script src="endor/bootstrap/js/bootstrap.bundle.min.js"></script>
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

  </html>
<?php
} else {
?>
  <center>
    <div style="margin-top: 300px">
      <h3>
        <?php
        // Redirigez avec un message de succès
        echo "<script>alert('Oups👋!!! Veuillez Vous Connectez.')</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
        ?>
      </h3>
    </div>
  </center>
<?php
}
?>