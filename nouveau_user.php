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

    <section class="contact-section mt-5 section-padding" id="section_5">
        <!-- <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Add Students</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="students.html">Student</a></li>
                            <li class="breadcrumb-item active">Add Students</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="insert_cleint.php" method="post" class="custom-form contact-form" role="form">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Enregistrement d'un Nouveau Personnel<span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" name="nom_user" id="forme" placeholder="Saisissez le nom" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prénom : <span class="login-danger">*</span></label>
                                        <input type="text" placeholder="Saisissez Prénom " name="prenom_user" id="capital" class="form-control" required="">
                                    </div>
                                </div>
                               <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Sexe: <span class="login-danger">*</span></label>
                                        <select class="form-control select">
                                            <option>Le Sexe</option>
                                            <option>Feminine</option>
                                            <option>Masculin</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Choisissez le Département: <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                    </div>
                                </div> -->
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Adresse :</label>
                                        <input class="form-control" type="text" name="adresse_user" id="siege" placeholder="Adresse" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Contact :</label>
                                        <input type="text" name="contact_user" id="administration" class="form-control" placeholder="contact" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Abreviation:</label>
                                        <input type="text" name="abreviation_log_user" id="prenom_pere_client" class="form-control" placeholder="Prénom du Père" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Profession:</label>
                                        <input type="text" name="profession_user" id="nom_pere_client" class="form-control" placeholder="profession" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Email:</label>
                                        <input type="text" name="email_user" id="prenom_mere_client" class="form-control" placeholder="email" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Choisissez le Département: <span class="login-danger">*</span></label>
                                        <select class="form-control select">
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
                                

                                
                               


                                <!-- <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <label>Upload Student Photo (150px X 150px)</label>
                                        <div class="uplod">
                                            <label class="file-upload image-upbtn mb-0">
                                                Choose File <input type="file">
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button class="btn btn-primary" type="submit" name="submit" class="form-control">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
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