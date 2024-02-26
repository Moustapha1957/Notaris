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


    
    
    <hr>
    <br>

    <section class="contact-section section-padding" id="section_5" > 
    <div class="contenaire-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-title">
                        Modification de Mot de Passe   
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-12">
                        <div class="form-floating">
                            <label for="mot_de_passe_actuel">Mot de passe actuel :</label>
                            <input type="password" class="form-control" name="mot_de_passe_actuel" required>
                        </div>    
                    </div> 
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-floating">
                            <label for="nouveau_mot_de_passe">Nouveau mot de passe :</label>
                            <input type="password" class="form-control" name="nouveau_mot_de_passe" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="form-floating">
                            <label for="confirmer_mot_de_passe">Confirmez le nouveau mot de passe :</label>
                            <input type="password" class="form-control" name="confirmer_mot_de_passe" required>
                        </div>   
                    </div>   
                </div><br><br><br>

                <center><div class="col-md-11 col-lg-11 col-12">
                        <input type="submit" class="btn btn-dark" value="Modifier">
                    </div></center>
            </div>
        </div>
    </div>  
</section>
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
