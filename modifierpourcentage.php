<?php
session_start();
include 'nav.php';
include 'bdconnect.php';

if (isset($_GET['id'])) {
    $id_pourcentage = $_GET['id'];

    // Récupérer les détails de l'enregistrement à modifier
    $sqlDetails = "SELECT * FROM pourcentages WHERE id_pourcentage = :id";
    $stmtDetails = $conn->prepare($sqlDetails);
    $stmtDetails->bindParam(':id', $id_pourcentage, PDO::PARAM_INT);
    $stmtDetails->execute();
    $details = $stmtDetails->fetch(PDO::FETCH_ASSOC);

    if ($details) {
        // Afficher le formulaire de modification avec les détails
        ?>
<section class="contact-section section-padding" id="section_5" >
     <div class="contenaire-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-title">
                        Modifier les Pourcentages   
                    </h3>
                </div>
                <form method="POST">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="form-floating">
                        <label for="libelle_nddi">De 1 à 2.500.000 FCFA</label><br>
                        <input type="text" name="nom_pourcentage" value="<?= $details['nom_pourcentage'] ?>" class="form-control">
                         </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                        <div class="form-floating">
                        <label for="libelle_nddi">De 1 à 2.500.000 FCFA</label><br>
                        <input type="text" name="premier" value="<?= $details['premier_pourcentage'] ?>" class="form-control">
                         </div> 
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <div class="form-floating">
                    <label for="libelle_nddi">De 2.500.000 à 5.000.000 FCFA</label><br>
                    <input type="text" name="deuxieme" value="<?= $details['deuxieme_pourcentage'] ?>" class="form-control">
                </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                    <div class="form-floating">
                    <label for="libelle_nddi">De 5.000.000 à 10.000.000 FCFA</label><br>
                    <input type="text" name="troisieme" value="<?= $details['troisieme_pourcentage'] ?>" class="form-control">
                     </div>   
                    </div>
                    <div class="col-md-6 col-lg-6 col-12">
                        <div class="form-floating">
                    <label for="libelle_nddi">De 10.000.000 FCFA ou Plus</label><br>
                    <input type="text" name="quatrieme" value="<?= $details['quatrieme_pourcentage'] ?>" class="form-control">
                 </div>
                        
                    </div>
                </div><br><br>

                <center><input type="submit" name="modifier" class="btn btn-primary" value="Modifier"></center>
                </form>
            </div>
        </div> 
       </div>
</section>
      

        
        <?php
    } else {
        echo "Aucun enregistrement trouvé avec cet identifiant.";
    }
} else {
    echo "Identifiant non fourni.";
}
?>


<?php
if (isset($_POST['modifier'])) {
    //$id_pourcentage = $_GET['id'];
    $nom_pourcentage = $_POST['nom_pourcentage'];
    $premier = $_POST['premier'];
    $deuxieme = $_POST['deuxieme'];
    $troisieme = $_POST['troisieme'];
    $quatrieme = $_POST['quatrieme'];

    // Mettre à jour les données dans la base de données
    $sqlUpdate = "UPDATE pourcentages SET nom_pourcentage = :nom_pourcentage, premier_pourcentage = :premier, deuxieme_pourcentage = :deuxieme, troisieme_pourcentage = :troisieme, quatrieme_pourcentage = :quatrieme WHERE id_pourcentage = :id";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':id', $id_pourcentage, PDO::PARAM_INT);
    $stmtUpdate->bindParam(':nom_pourcentage', $nom_pourcentage, PDO::PARAM_STR);
    $stmtUpdate->bindParam(':premier', $premier, PDO::PARAM_STR);
    $stmtUpdate->bindParam(':deuxieme', $deuxieme, PDO::PARAM_STR);
    $stmtUpdate->bindParam(':troisieme', $troisieme, PDO::PARAM_STR);
    $stmtUpdate->bindParam(':quatrieme', $quatrieme, PDO::PARAM_STR);

    if ($stmtUpdate->execute()) {
        $successMessage = "Modification réussie.";

        // Afficher le message de succès en utilisant JavaScript
        echo "<script>
                alert('$successMessage');
                window.location.href = 'recup.php';
              </script>";
        exit; // Arrêter l'exécution du reste du script après la redirection
    } else {
        $errorMessage = "Erreur lors de la modification.";
        echo "<script>alert('$errorMessage');</script>";
    }
}
?>


