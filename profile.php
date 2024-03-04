<?php
session_start();
include 'nav.php';
include 'bdconnect.php';
?>


<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Profil</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item active">Profil</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-auto profile-image">
                    <a href="#">
                        <?php
                        // Assurez-vous de sécuriser votre requête en utilisant une requête préparée
                        $sql = "SELECT * FROM users WHERE id_user_at = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$_SESSION['id_user']]);
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($row && isset($row['avatar'])) {
                            // Chemin complet de l'avatar
                            $avatarFilePath = 'img/avatar_user/' . $row['avatar'];

                            // Afficher l'avatar avec un identifiant unique
                            echo '<img id="avatar" src="' . $avatarFilePath . '" class="avatar-img rounded-circle" width="31" alt="Avatar Notaris">';
                        } else {
                            // Afficher un message si l'avatar n'est pas trouvé
                            echo "Avatar non trouvé";
                        }
                        ?>
                    </a>
                </div>
                <div class="col ms-md-n2 profile-user-info">
                    <h4 class="user-name mb-0"><?php echo $_SESSION['prenom_user'] . " " . $_SESSION['nom_user']; ?></h4>
                    <h6 class="text-muted"><?php echo $_SESSION['departement_user']; ?></h6>
                    <div class="user-Location"><i class="fas fa-map-marker-alt"></i> <?php echo $_SESSION['adresse_user']; ?></div>
                    <div class="about-text">Vous êtes Membre Du Personnel De L'Entreprise.</div>
                </div>
                <div class="col-auto profile-btn">
                    <a href="" class="btn btn-primary">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
        <div class="profile-menu">
            <ul class="nav nav-tabs nav-tabs-solid">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Mot de Passe</a>
                </li>
            </ul>
        </div>
        <div class="tab-content profile-tab-cont">

            <div class="tab-pane fade show active" id="per_details_tab">

                <div class="row">
 <div class="col-lg-9">
 <div class="card">
 <div class="card-body">
 <h5 class="card-title d-flex justify-content-between">
 <span>Informations Personnelles</span>
<!--<a class="edit-link" data-bs-toggle="modal"
 href="#edit_personal_details"><i
 class="far fa-edit me-1"></i>Modifier</a>-->
 </h5>
 <div class="row">
 <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Prenom & Nom</p>
 <p class="col-sm-9"><?php echo $_SESSION['prenom_user']." ".$_SESSION['nom_user']; ?></p>
 </div>
 <div class="row">
 <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Sexe</p>
 <?php 
 $sex = $_SESSION['sexe'];
 if ($sex == "M") {
    $sexe = "Masculin";
  }elseif ($sex == "F") {
    $sexe = "Féminin";
  }else {
    $sexe = "Non Déterminé";
  } ?>
 <p class="col-sm-9"><?php echo $sexe; ?></p>
 </div>
 <div class="row">
 <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email</p>
 <p class="col-sm-9"><?php echo $_SESSION['email_user']; ?></p>
 </div>
 <div class="row">
 <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Contact</p>
 <p class="col-sm-9"><?php echo $_SESSION['contact_user']; ?></p>
 </div>
 <div class="row">
 <p class="col-sm-3 text-muted text-sm-end mb-0">Adresse</p>
 <p class="col-sm-9 mb-0"><?php echo $_SESSION['adresse_user']; ?>,<br>
 Bamako,<br>
 Mali.</p>
 </div>
 </div>
 </div>
 </div>
 <div class="col-lg-3">

 <div class="card">
 <div class="card-body">
 <h5 class="card-title d-flex justify-content-between">
 <span>Statut du compte</span>
 <!--<a class="edit-link" href="#"><i class="far fa-edit me-1"></i>
 Edit</a>-->
 </h5>
 <button class="btn btn-success" type="button"><i
 class="fe fe-check-verified"></i> Actif</button>
 </div>
 </div>


 <div class="card">
 <div class="card-body">
 <h5 class="card-title d-flex justify-content-between">
 <span>Accès </span>
 <!--<a class="edit-link" href="#"><i class="far fa-edit me-1"></i>
 Détails</a>-->
 </h5>
 <div class="skill-tags">
    <?php 
    if ($_SESSION['departement_user'] == "Notaire") {
        ?>
        <span>+ Client</span>
        <span>+ Acte</span>
 <span>+ Personnel</span>
 <span>+ Chiffre d'affaire</span>
 <span>+ Méssagerie</span>
 <span>+ Historique de Connexion</span>
 <span>+ Pourcentage / Emoluments</span>
 
     <?php
     } elseif ($_SESSION['departement_user'] == "Clerc Principal" OR "Clerc" OR "Greffier" OR "Clerc Immobilier/Assistant Études" OR "Clerc Sociétés" OR "Secrétaire Clerc/Caisse" OR "Secrétaire Clerc" OR "Secrétaire") {
         ?>
 <span>+ Client</span>
 <span>+ Acte</span>
 <span>Dashboard</span>
 <span>Méssagerie</span>
 <span>Profil</span>
 <span>+ Emoluments</span>

 <?php 
 } ?>
 </div>
 </div>
 </div>

 </div>
 </div>

            </div>


            <div id="password_tab" class="tab-pane fade">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Changer le mot de passe</h5>
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <form method="POST" action="modification_password.php">
                                    <div class="form-group">
                                        <label>Ancien mot de passe</label>
                                        <input type="password" class="form-control" name="mot_de_passe_actuel" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nouveau mot de passe</label>
                                        <input type="password" class="form-control" name="nouveau_mot_de_passe" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirmez le mot de passe</label>
                                        <input type="password" class="form-control" name="confirmer_mot_de_passe" required>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Sauvegarder</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>