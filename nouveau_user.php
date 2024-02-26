<?php 
session_start();
if (isset($_SESSION['email_user'])) {
require ('nav.php');
require ('bdconnect.php');

if (isset($_POST['submit'])) {
    // Récupération des données POST
    $nom_user = $_POST['nom_user'];
    $prenom_user = $_POST['prenom_user'];
    $adresse_user = $_POST['adresse_user'];
    $date_user = date('Y-m-d');
    $abreviation = $_POST['abreviation_log_user'];
    $matricule_user = "Notaris/".$date_user."/".crc32(uniqid());
    $contact_user = $_POST['contact_user'];
    $email_user = $_POST['email_user'];
    $sexe = $_POST['sexe'];
    $profession_user = $_POST['profession_user'];
    $departement_user = $_POST['departement_user'];
    $date_ = date('Y-m-d');

    // Mot de passe par défaut
    $password_user = '12345678';

   // Générer le nom de fichier pour l'avatar
$avatarFileName = $nom_user . '_' . $prenom_user . '_' . $abreviation . '.png';

// Chemin complet du fichier de l'avatar
$avatarFilePath = 'img/avatar_user/' . $avatarFileName;

// Générer l'avatar
$image = imagecreatetruecolor(260, 260);

// Couleur de fond
$bg_color = imagecolorallocate($image, 255, 255, 255); // Blanc

// Remplir l'arrière-plan avec la couleur définie
imagefill($image, 0, 0, $bg_color);

// Charger l'image de l'avatar de teint noir
if ($sexe == "M") {
    $avatar_black = imagecreatefrompng('img/avatar_user/modele/avatar_modele_hm.png');
} else {
    $avatar_black = imagecreatefrompng('img/avatar_user/modele/avatar_modele_fm.png');
}

// Superposer l'avatar de teint noir sur l'image
imagecopy($image, $avatar_black, 0, 0, 0, 0, imagesx($avatar_black), imagesy($avatar_black));

// Ajouter les initiales du nom et du prénom
$text = strtoupper(substr($nom_user, 0, 1) . substr($prenom_user, 0, 1));
$text_color = imagecolorallocate($image, 255, 255, 255); // Blanc
$text_size = 16;
$text_x = 10; // Position X des initiales
$text_y = 10; // Position Y des initiales
imagestring($image, $text_size, $text_x, $text_y, $text, $text_color);

// Enregistrer l'image
imagepng($image, $avatarFilePath);

// Libérer la mémoire
imagedestroy($image);



    // Préparez la requête SQL pour insérer les données
    $sql = "INSERT INTO users (matricule_user, nom_user, prenom_user, adresse_user, contact_user, sexe, abreviation_log_user, email_user, password_user, departement_user, profession_user, date_enregis_user, avatar) 
        VALUES (:matricule_user, :nom_user, :prenom_user, :adresse_user, :contact_user, :sexe, :abreviation_log_user, :email_user, :password_user, :departement_user, :profession_user, :date_enregistrement, :avatar)";

    // Utilisez une requête préparée pour éviter les injections SQL
    $stmt = $conn->prepare($sql);

    // Liez les valeurs aux paramètres
    $stmt->bindParam(':matricule_user', $matricule_user);
    $stmt->bindParam(':nom_user', $nom_user);
    $stmt->bindParam(':prenom_user', $prenom_user);
    $stmt->bindParam(':adresse_user', $adresse_user);
    $stmt->bindParam(':contact_user', $contact_user);
    $stmt->bindParam(':sexe', $sexe);
    $stmt->bindParam(':abreviation_log_user', $abreviation);
    $stmt->bindParam(':email_user', $email_user);
    $stmt->bindParam(':password_user', $password_user);
    $stmt->bindParam(':departement_user', $departement_user);
    $stmt->bindParam(':profession_user', $profession_user);
    $stmt->bindParam(':date_enregistrement', $date_);
    $stmt->bindParam(':avatar', $avatarFileName);

    // Exécutez la requête
    if ($stmt->execute()) {
        // La nouvelle entrée a été insérée avec succès
        echo "<script>alert('Nouveau personnel enregistré avec succès, Le mot de passe par défaut est : 12345678. Le nouvel utilisateur peut le changer lors de la première connexion.')</script>";
        echo "<script type='text/javascript'> document.location ='nouveau_user.php'; </script>";
    } else {
        echo "Erreur lors de l'enregistrement du personnel : " . $stmt->errorInfo()[2];
    }
}
?>
<section class="contact-section section-padding" id="section_5" >
   <div class="contenaire-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">          
                    <h3 class="card-title">Enregistrement d'un Nouveau Personnel</h3>         
            </div>
            <form method="POST" action="">
            <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="form-floating">
                    <label for="nom_user">Nom</label>
                    <input type="text" class="form-control" id="nom_user" name="nom_user" placeholder="Entrez le Nom" required>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-floating">
                 <label for="prenom_user">Prénom</label>
                 <input type="text" class="form-control" id="prenom_user" name="prenom_user" placeholder="Entrez le Prénom" required>
                </div>
             </div> 
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
            <div class="form-floating">
                <label for="adresse_user">Adresse</label>
                <input type="text" class="form-control" id="adresse_user" name="adresse_user" placeholder="Entrez l'Adresse" required>
             </div>
              </div>
            <div class="col-lg-6 col-md-6 col-12">
             <div class="form-floating">
                <label for="contact_user">Contact</label>
                 <input type="text" class="form-control" id="contact_user" name="contact_user" placeholder="Entrez le Contact" required>
             </div>
             </div>

        </div>

        <div class="row">
             <div class="col-lg-6 col-md-6 col-12"> 
                            <div class="form-floating">
                                <label for="contact_user">Abreviation</label>
                                <input type="text" class="form-control" id="abreviation_log_user" name="abreviation_log_user" placeholder="Entrez l'Abreviation" required>    
                            </div>
                        </div>

            <div class="col-lg-6 col-md-6 col-12">
                 <div class="form-floating">
                     <label for="email_user">Sexe</label>
                     <select name="sexe" class="form-control" required="">
                         <option>Choisissez Le Sexe</option>
                         <option value="M">M</option>
                         <option value="F">F</option>
                     </select>
                     
                </div>
            </div>

            

            </div>

        <div class="row">
           <div class="col-lg-6 col-md-6 col-12">
                <div class="form-floating">
                 <label for="departement_user">Choisissez le Département</label><br>
                    <select id="departement_user" name="departement_user" class="form-control">
                        <option>Selectionner Ici</option>
                    <option value="GRH">GRH</option>
                     <option value="Comptabilité">Comptabilité</option>
                     <option value="Notaire">Notaire</option>
                    <option value="Greffier">Greffier</option>
                    <option value="Clerc Principal">Clerc Principal</option>
                    <option value="Clerc Immobilier/Assistant Études">Clerc Immobilier/Assistant Études</option>
                    <option value="Clerc Sociétés">Clerc Sociétés</option>
                    <option value="Secrétaire Clerc/Caisse">Secrétaire Clerc/Caisse</option>
                    <option value="Secrétaire Clerc">Secrétaire Clerc</option>
                    <option value="Secrétaire">Secrétaire</option>
                   <option value="Agent Administratif/Actes Immobiliers">Agent Administratif/Actes Immobiliers</option>
                    <option value="Agent Administratif/Actes Sociétés">Agent Administratif/Actes Sociétés</option>
                    </select>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6 col-12"> 
                        <div class="form-floating">
                            <label for="contact_user">Profession</label>
                            <input type="text" class="form-control" id="profession_user" name="profession_user" placeholder="Entrez la Profession" required>    
                        </div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                 <div class="form-floating">
                     <label for="email_user">Email</label>
                     <input type="text" class="form-control" id="email_user" name="email_user" placeholder="Entrez l'Email" required>
                </div>
            </div>
            </div><br><br>  
            <center><button class="btn btn-primary" type="submit" name="submit" class="form-control">Enregistrer</button>
                    </center>
                    </form>
        </div>            
        </div>
     </div> 
</section>
</body>
<footer class="site-footer">
</footer>
</html> 
</footer>
<script src="vendor/apexcharts/apexcharts.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/chart.js/chart.umd.js"></script>
<script src="vendor/echarts/echarts.min.js"></script>
<script src="vendor/quill/quill.min.js"></script>
<script src="vendor/simple-datatables/simple-datatables.js"></script>
<script src="vendor/tinymce/tinymce.min.js"></script>


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