<?php
session_start();
 if (isset($_SESSION['email_user'])) {
include 'nav.php';

include 'bdconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $motDePasseActuel = $_POST['mot_de_passe_actuel'];
    $nouveauMotDePasse = $_POST['nouveau_mot_de_passe'];
    $confirmerMotDePasse = $_POST['confirmer_mot_de_passe'];

    // Vérifiez si le nouveau mot de passe et la confirmation correspondent
    if ($nouveauMotDePasse !== $confirmerMotDePasse) {
        // Les mots de passe ne correspondent pas, redirigez avec un message d'erreur
        header('Location: page_modification_mot_de_passe.php?erreur=Mots de passe non identiques');
        exit;
    }

    // Vous devrez vérifier ici si le mot de passe actuel est correct dans votre base de données
    // Si le mot de passe actuel est correct, vous pouvez mettre à jour le mot de passe de l'utilisateur

    // Exemple de code pour vérifier le mot de passe actuel (à adapter à votre base de données)
    $sql = "SELECT password_user FROM users WHERE id_user = :id_user";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_user', $_SESSION['id_user']);
    $stmt->execute();
    $row = $stmt->fetch();

    if ($motDePasseActuel === $row['password_user']) {
        // Le mot de passe actuel est correct
        // Vous pouvez maintenant mettre à jour le mot de passe
        $sql = "UPDATE users SET password_user = :nouveauMotDePasse WHERE id_user = :id_user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nouveauMotDePasse', $nouveauMotDePasse);
        $stmt->bindParam(':id_user', $_SESSION['id_user']);
        $stmt->execute();

        // Redirigez avec un message de succès
        echo "<script>alert('Mot de Passe modifie avec succès.')</script>";
        echo "<script type='text/javascript'> document.location ='Acceuil.php'; </script>";
        exit;
    } else {
        // Le mot de passe actuel est incorrect, redirigez avec un message d'erreur
        header('Location: page_modification_mot_de_passe.php?erreur=Mot de passe actuel incorrect');
        exit;
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
                                    <h5 class="form-title student-info">   Modification de Mot de Passe   <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mot de passe actuel : <span class="login-danger">*</span></label>
                                        <input class="form-control" type="password" name="mot_de_passe_actuel" id="forme" placeholder="mot de passe" required="">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nouveau mot de passe <span class="login-danger">*</span></label>
                                        <input type="password" placeholder="confirmer le mot de passe" name="nouveau_mot_de_passe" id="capital" class="form-control" required="">
                                    </div>
                                </div>
                               <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label> Confirmez le nouveau mot de passe :: <span class="login-danger">*</span></label>
                                        <input type="text" placeholder="confirmer le mot de passe" name="confirmer_mot_de_passe" id="capital" class="form-control" required="">
                                    </div>
                                </div>
                                <!-- <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Choisissez le Département: <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                    </div>
                                </div> 
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
                                </div>-->
                                

                                
                               


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
                                        <button class="btn btn-primary" type="submit" class="btn btn-dark" value="Modifier">soumettre</button>
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