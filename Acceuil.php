<?php session_start();

if (isset($_SESSION['email_user'])) {

include 'nav.php';
 ?>

   <section class="section profile">
           <center><h2>Etude de Maitre Toure N'diaye<h2></center>
           <center><h2><?php //echo "Etude de Maitre ".$_SESSION['prenom_user']." ".$_SESSION['nom_user']; ?></h2></center>
      <div class="row">  
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <center>
              <p>NOTARIS est une Application web destinée aux cabinet de Notaire. Elle simplifie et améliore la gestion des contenus pour les notaires. Cette  Plateforme novatrice repousse les limites de l'efficacité et de la conformité dans le domaine notarial, tout en offrant des avantages significatifs aux professionnels du notariat souligner en dessous.</p>
             <p>
               <ul>
                
                  <p>L'introduction de NOTARIS reflète une transformation profonde dans le monde notarial, en capitalisant sur les avancées technologiques pour résoudre des défis traditionnels. Les notaires utilisant cette application ont maintenant à leur disposition un outil polyvalent qui rationalise la gestion de contenu, simplifie les procédures administratives et garantit la sécurité des informations sensibles. L'impact est considérable, avec des avantages tangibles pour la profession notariale.</p><br>

                  Avantages de NOTARIS : <br>

                    1. Simplicité et Accessibilité : <br>
                      <p>NOTARIS offre une interface conviviale, permettant aux notaires d'accéder rapidement à tous les documents et informations essentiels en un seul endroit. Cela améliore l'efficacité des tâches quotidiennes et réduit le temps passé à rechercher des informations.</p>

                      2. Conformité et Sécurité : <br>
                        <p>La sécurité des données est essentielle dans le notariat. NOTARIS garantit que tous les contenus sont stockés et transmis de manière sécurisée, en conformité avec les réglementations strictes du secteur. Cela renforce la confidentialité et la confiance des clients.</p>

                        3. Collaboration en Temps Réel : <br>
                          <p>Les notaires peuvent collaborer avec d'autres professionnels du notariat et clients en temps réel. Cela facilite la communication, accélère la validation de documents et améliore la prestation de services</p>


                

               </ul>
             </p>
              </center>
              <div class="social-links mt-2">
              </div>
            </div>
          </div>
        </div>
        <!--
        <a class="nav-link" href="client_list.php"><img src="../images/dossier.png" alt="Profile" class="rounded-circle">

        <div class="col-xl-6">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <center><a class="nav-link" href="etablir_actes.php"><img src="../images/OIP.jpg" alt="Profile" class="rounded-circle">
              <h5>Etablir des actes</h5>
              <br/>  
              
              </a>
              </center>
              <div class="social-links mt-2"> 
              </div>
            </div>
          </div>

          
        </div>
        </div>-->
        
           <!-- Bordered Tabs -->            
    </section>

    
     </div>
    </div>
        <script src="vendor/apexcharts/apexcharts.min.js"></script>
        <script src="endor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/chart.js/chart.umd.js"></script>
        <script src="vendor/echarts/echarts.min.js"></script>
        <script src="vendor/quill/quill.min.js"></script>
        <script src="vendor/simple-datatables/simple-datatables.js"></script>
        <script src="vendor/tinymce/tinymce.min.js"></script>
        <script src="vendor/php-email-form/validate.js"></script>

        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
  </body>
</html>
<?php
 }else{
    ?>
    <center><div style="margin-top: 300px"><h3>
        <?php
        // Redirigez avec un message de succès
        echo "<script>alert('Oups👋!!! Veuillez Vous Connectez.')</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    ?>
    </h3></div></center>
    <?php
 }
 ?>