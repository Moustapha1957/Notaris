     <?php
     session_start();
     include 'nav.php';
     include 'bdconnect.php';

if (isset($_POST['submit_abreviation'])) {
    // Récupérer les valeurs de $_POST
    $id_dossier_client = $_GET['id'];
    $idsd = $_GET['idsd'];
    $abreviation = $_POST['abreviation'];
    $clerc = $_POST['clerc'];
    $abreviationsecretaire = $_POST['abreviationsecretaire'];


    // Récupérer l'ID du sous-dossier
    $sql_get_id = "SELECT id_sous_dossier_client FROM sous_dossier_client WHERE id_sous_dossier_client = :id_sous_dossier_client";
    $stmt_get_id = $conn->prepare($sql_get_id);
    $stmt_get_id->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
    $stmt_get_id->execute();
    $row = $stmt_get_id->fetch(PDO::FETCH_ASSOC);

    //$id_sous_dossier = $row['id_sous_dossier_client'];
    

    // Concaténer les valeurs
    $intervenants_doc = $abreviation . "/" . $clerc . "/" . $abreviationsecretaire;

    // Mettre à jour la colonne intervenants_doc
    $sql_update = "UPDATE sous_dossier_client SET intervenants_doc = :intervenants_doc WHERE id_sous_dossier_client = :id_sous_dossier_client";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':intervenants_doc', $intervenants_doc, PDO::PARAM_STR);
    $stmt_update->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
    $stmt_update->execute();

    // Vérification si la mise à jour a été exécutée avec succès
    if ($stmt_update->rowCount() > 0) {
        
        echo "<script>alert('La prise en compte des intervenants a été effectuée avec succès.')</script>";
        echo "<script type='text/javascript'> document.location = 'word_actes.php?id=" . $id_dossier_client . "&isc=".$idsd."'; </script>";

        exit; // Assurez-vous de terminer le script après la redirection
    }
}
?>



    <div class="modal-dialog">
        <div class="modal-content">
     

            <form id="sousDossierForm" method="POST" action="">
                <div class="modal-header">
                    <h4 class="modal-title">Choisissez Le Notaire Et La Sécretaire En Charge Du Dossier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
    <div class="form-group">
        <label>Sélectionnez un(e) Notaire</label><br>
        <select id="abreviation" class="form-control" name="abreviation">
                <option value="">Sélectionnez ici</option>
        <?php 
        $notaire = "Notaire";
        $sql = "SELECT * FROM users WHERE departement_user = :departement_user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':departement_user', $notaire, PDO::PARAM_STR);
        $stmt->execute();
        
        while ($record = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nom_prenom_notaire = $record['prenom_user'].' '.$record['nom_user'].' '.$record['abreviation_log_user'];
            $abreviation = $record['abreviation_log_user'];
            ?>
            
                <option value="<?php echo $abreviation; ?>"><?php echo $nom_prenom_notaire; ?></option>
           
        <?php } ?>
         </select>
    </div>
</center>

                    
                    <center>
    <div class="form-group">
        <label>Le Clerc</label><br>
        <input type="text" class="form-control" value="<?php echo isset($_SESSION['abreviation']) ? $_SESSION['abreviation'] : ''; ?>" name="clerc">
    </div>
</center>


                    <center>
    <div class="form-group">
        <label for="abreviationsecretaire">Sélectionnez un(e) Secrétaire</label><br>
        <select id="abreviationsecretaire" class="form-control" name="abreviationsecretaire">
            <option value="">Sélectionnez ici</option>
            <?php 
            $secretaire = "Secretaire";
            $sqll = "SELECT * FROM users WHERE departement_user = :departement_user";
            $stmtt = $conn->prepare($sqll);
            $stmtt->bindParam(':departement_user', $secretaire, PDO::PARAM_STR);
            $stmtt->execute();

            while ($recordd = $stmtt->fetch(PDO::FETCH_ASSOC)) {
                $nom_prenom_secretaire = $recordd['prenom_user'].' '.$recordd['nom_user'].' '.$recordd['abreviation_log_user'];
                $abreviationn = $recordd['abreviation_log_user'];
            ?>
            <option value="<?php echo $abreviationn; ?>"><?php echo $nom_prenom_secretaire; ?></option>
            <?php } ?>
        </select>
    </div>
</center>


                   
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" onclick="window.history.back();" value="Annuler">

                    <input type="submit" name="submit_abreviation" class="btn btn-success" value="Ajouter">
                </div>
            </form>
        </div>
    </div>
