<?php session_start();

include 'nav.php';
 ?>
        <section class="section profile">
           <center><h2>Comptabilite<h2></center>
           <center><h2><?php //echo "Etude de Maitre ".$_SESSION['prenom_user']." ".$_SESSION['nom_user']; ?></h2></center>
      <div class="row">  
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <center><a class="nav-link" href="facture.php"><img src="../images/dossier.png" alt="Profile" class="rounded-circle">
              <h5>Factures</h5>
              </a>
              </center>
              <div class="social-links mt-2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <center><a class="nav-link" href="#"><img src="../images/OIP.jpg" alt="Profile" class="rounded-circle">
              <h5>Sage</h5>
              <br/>  
              
              </a>
              </center>
              <div class="social-links mt-2"> 
              </div>
            </div>
          </div>
        </div>
        </div>
        
           <!-- Bordered Tabs -->            
    </section>

    
     </div>
		</div>
        <script src="../vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../endor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/chart.js/chart.umd.js"></script>
        <script src="../vendor/echarts/echarts.min.js"></script>
        <script src="../vendor/quill/quill.min.js"></script>
        <script src="../vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../vendor/tinymce/tinymce.min.js"></script>
        <script src="../vendor/php-email-form/validate.js"></script>

        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
  </body>
</html>