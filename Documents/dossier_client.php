<?php
session_start();
if (isset($_SESSION['email_user'])) {
include 'nav.php';
include 'bdconnect.php';


$id_dossier_client = $_GET['id'];
?>



<div class="container-fluid">
<div class="table-wrapper">
<div class="table-title">
<div class="row">
<div class="col-sm-6">
    <?php 
    // Récupérer les informations du dossier client avec la méthode query
$sql = "SELECT * FROM dossier_client WHERE id_dossier_client = $id_dossier_client";
$result = $conn->query($sql);

// Vérifier si la requête a réussi
if ($result) {
    // Récupérer la première ligne (il ne devrait y en avoir qu'une)
    $dossier_client = $result->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le dossier client existe
    if ($dossier_client) {
        // Afficher les informations du dossier client
        $nom_client = $dossier_client['nom_client'];
        $prenom_client = $dossier_client['prenom_client'];
        $contact_client = $dossier_client['contact_client'];
        $adresse_client = $dossier_client['adresse_client'];

        echo "<h2><b>Dossier Client:</b> $prenom_client $nom_client $contact_client $adresse_client</h2>";
    } else {
        // Le dossier client n'a pas été trouvé
        die("Dossier client non trouvé.");
    }
} else {
    // La requête a échoué
    die("Erreur lors de la récupération des informations du dossier client.");
}

$sql = "SELECT * FROM sous_dossier_client WHERE id_dossier_client = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id_dossier_client, PDO::PARAM_INT);
$stmt->execute();

function getStatut($statut)
{
    $result = [];

    if ($statut == "1") {
        $result['libelle'] = "En Cours";
        $result['couleur'] = "Red";
    } elseif ($statut == "0") {
        $result['libelle'] = "Acté";
        $result['couleur'] = "Green";
    }

    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_sous_dossier_changed"])) {
    $id_sous_dossier_changed = $_POST["id_sous_dossier_changed"];

    // Effectuez la mise à jour du statut dans la base de données
    $nouveau_statut = ($_POST["nouveau_statut"] == "1") ? "0" : "1"; // Inversion du statut
    $sql_update_statut = "UPDATE sous_dossier_client SET statut = :nouveau_statut WHERE id_sous_dossier_client = :id_sous_dossier_changed";
    $stmt_update_statut = $conn->prepare($sql_update_statut);
    $stmt_update_statut->bindParam(':nouveau_statut', $nouveau_statut, PDO::PARAM_STR);
    $stmt_update_statut->bindParam(':id_sous_dossier_changed', $id_sous_dossier_changed, PDO::PARAM_INT);
    $stmt_update_statut->execute();

    // Pas de redirection nécessaire ici
    echo "<script>alert('Statut modifié avec succès')</script>";
    echo "<script type='text/javascript'> document.location = 'dossier_client.php?id=" . $id_dossier_client ."'; </script>";
}
 
     ?>

</div>
<div class="col-sm-6">
    <a href="#deleteEmployeeModal" class="btn btn-white" data-toggle="modal"><i class="fa fa-user"></i> <span>Profile Client</span></a>
<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Acte</span></a>
</div>
</div>
</div>
<div class="box box-info">
<div class="box-body table-responsive">
<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
    <thead>
        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                </span>
            </th>
            <th>Sous-Dossier</th>
            <th>Statut</th>
            <th>Valeur</th>
            <th>Numéros Notaris</th>
            <th>Actions</th>
        </tr>
        
            
        
    </thead>
    <tbody>
    <?php 
    $sql = "SELECT * FROM sous_dossier_client WHERE id_dossier_client = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_dossier_client, PDO::PARAM_INT);
    $stmt->execute();

    // Vérifier s'il y a des résultats
    if ($stmt->rowCount() == 0) {
        echo '<tr><td colspan="3">Aucun acte établi pour ce client.</td></tr>';
    } else {
        while ($row = $stmt->fetch()) {

            if ($row["statut"] == "1") {

                $statut = "En Cours";
                $color = "Red";
                # code...
            }elseif ($row["statut"] == "0") {
                
                $statut = "Acté";
                $color = "Green";
            }

            $idsd= $row["id_sous_dossier_client"];
            echo '<tr>';
            echo '<td>';
            echo '<span class="custom-checkbox">';
            echo '<input type="checkbox" id="checkbox1" name="options[]" value="' . $idsd . '">';
            echo '<label for="checkbox1"></label>';
            echo '</span>';
            echo '</td>';

            echo '<td>' . $row["nom_sous_dossier"] . '</td>';

            echo '<td>';
                        echo '<form class="form-statut" method="POST" action="">';
                        echo '<input type="hidden" name="id_sous_dossier_changed" value="' . $row['id_sous_dossier_client'] . '">';
                        echo '<input type="hidden" name="nouveau_statut" value="' . $row["statut"] . '">';
                        echo '<button type="submit" style="background-color:' . $color . '; text-decoration-color: white;" name="submit_statut">' . $statut . '</button>';
                        echo '</form>';
                        echo '</td>';

                        echo '<td>' . $row["valeur"] . ' FCFA</td>';
                        echo '<td>' . $row["numero_notaris"] . '</td>';

            echo '<td>';
            echo '<a href="etablir_acte.php?id=' . $id_dossier_client . '&isc=' . $idsd . '" data-toggle="modal">';
            echo '<h5><i class="bi bi-eye-fill"></i></h5>';
            echo '</a>';
            echo '<a href="acte_modif.php?id=' . $id_dossier_client . '&isc=' . $idsd . '" data-toggle="modal"><i class="bi bi-brush-fill"></i></a>';
            echo '<a href="commentaires.php?id=' . $id_dossier_client . '&isc=' . $idsd . '" data-toggle="modal"><i class="bi bi-trash-fill"></i></a>';
            echo '</td>';
            echo '</tr>'; 
        }
    }
    ?>
</tbody>

</table>
</div>
</div>



</div>
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="sousDossierForm" method="POST" action="creation_sous_dossier.php?id=<?php echo $id_dossier_client ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Créer Un Acte</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <center><div class="form-group">
                        <label>Type D'Acte</label><br>
                        <select id="typeSousDossier" class="form-control" name="type_sous_dossier">
                            <option>Selectionner Ici</option>
                            <option value="Ventes Immobilière">Ventes Immobilière</option>
                            <option value="Création Société">Création Société</option>
                            <option value="Ventes Mobilière">Ventes Mobilière</option>
                            <option value="Assurance">Assurance</option>
                            <option value="Bails">Bails</option>
                        </select>
                    </div></center>
                    
                    <center><div class="form-group">
                        <label>Nom du Sous-Dossier</label><br>
                        <input type="text" class="form-control" name="nom_sous_dossier">
                    </div></center>

                    <div id="additionalFields" class="form-group" style="display:none;">
                        <!-- Additional Fields for Assurance -->
                        <div class="container">
                            <div class="row">
                                <div class="col-mg-4">
                                    <label>Valeur</label><br>
                        <input type="text" name="valeur">
                        </div>
                        &nbsp
                        <div class="col-mg-4">
                        <label>Autres Informations</label><br>
                        <input type="text" name="autres_informations">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="additionalFields1" class="form-group" style="display:none;">
                        <!-- Additional Fields for Assurance -->
                        <div class="container">
                            <div class="row">
                                <div class="col-mg-6">
                        <label>Denomination de la Société</label><br>
                        <input type="text" name="denomination">
                        </div>&nbsp

                        <div class="col-mg-6">
                        <label>Forme</label><br>
                        <input type="text" name="forme"><br>
                        </div>

                        </div>

                        <div class="row">
                        <div class="col-mg-6">
                        <label>Capital</label><br>
                        <input type="text" name="capital">
                        </div>&nbsp

                        <div class="col-mg-6">
                        <label>Immatriculation</label><br>
                        <input type="text" name="immatriculation">
                        </div>

                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <input type="submit" name="submit" class="btn btn-success" value="Ajouter">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('typeSousDossier').addEventListener('change', function () {
        var selectedValue = this.value;

        // Réinitialiser tous les champs supplémentaires
        document.getElementById('additionalFields').style.display = 'none';
        document.getElementById('additionalFields1').style.display = 'none';
        // Ajoutez d'autres lignes pour réinitialiser d'autres champs supplémentaires si nécessaire

        // Afficher les champs supplémentaires basés sur le type sélectionné
        if (selectedValue === 'Assurance' || selectedValue === 'Bails') {
            document.getElementById('additionalFields').style.display = 'block';
        }

        if (selectedValue === 'Création Société') {
            document.getElementById('additionalFields1').style.display = 'block';
        }
        // Ajoutez d'autres conditions pour d'autres types si nécessaire
    });
</script>



<!-- Modification de l'acte -->
<?php 
    $sqlmd = "SELECT * FROM sous_dossier_client WHERE id_dossier_client = :id_dossier_client AND id_sous_dossier_client = :id_sous_dossier_client";
$stmtmd = $conn->prepare($sqlmd);
$stmtmd->bindParam(':id_dossier_client', $id_dossier_client, PDO::PARAM_INT);
$stmtmd->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
$stmtmd->execute();


if ($recupmd = $stmtmd->fetch()) {
    # code...

$nom_sous_dossier = $recupmd["nom_sous_dossier"];
$valeur = $recupmd["valeur"];
$type_sous_dossier = $recupmd["type_sous_dossier"];
$numero_notaris = $recupmd["numero_notaris"];
}
     ?>

<div id="modifacte" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="modifacte" action="traitement_modification_acte.php?id=<?php echo $id_dossier_client; ?>&isc=<?php echo $idsd; ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Modification De L'Acte</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nom De L'Acte</label>
                        <input type="text" value="<?php echo htmlspecialchars($nom_sous_dossier); ?>" class="form-control" name="nom_acte" required>
                    </div>
                    <div class="form-group">
                        <label>Montant (FCFA)</label>
                        <input type="text" value="<?php echo htmlspecialchars($valeur); ?>" class="form-control" name="montant" required>
                    </div>
                    <div class="form-group">
                        <label>Le Type D'Acte</label>
                        <input type="text" name="type_sous_dossier" class="form-control" value="<?php echo htmlspecialchars($type_sous_dossier); ?>">
                       
                    </div>
                    <div class="form-group">
                        <label>Le Numéro Notaris</label>
                        <input type="text" class="form-control" name="numero_notaris" value="<?php echo htmlspecialchars($numero_notaris); ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" name="" class="btn btn-info">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<form>
<div class="modal-header">
<h4 class="modal-title">Profil Client</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    <?php 
    $sqlll = "SELECT * FROM dossier_client WHERE id_dossier_client = $id_dossier_client";
$resulllt = $conn->query($sqlll);
$recuppp = $resulllt->fetch();

$nom = $recuppp['nom_client'];
$prenom = $recuppp['prenom_client'];
$contact = $recuppp['contact_client'];
$adresse = $recuppp['adresse_client'];
     ?>
<p>Nom Client : <?php echo $nom ?></p>
<p>Prenom Client : <?php echo $prenom ?></p>
<p>Contact du Client : (+223) <?php echo $contact ?></p>
<p>L'adresse du Client : <?php echo $adresse ?></p>
<p class="text-warning"><small></small></p>
</div>
<div class="modal-footer">
<input type="button" class="btn btn-default" data-dismiss="modal" value="👍">
<!--<input type="submit" class="btn btn-danger" value="Supprimer">-->
</div>
</form>
</div>
</div>
</div>



        <script src="vendor/apexcharts/apexcharts.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/chart.js/chart.umd.js"></script>
        <script src="vendor/echarts/echarts.min.js"></script>
        <script src="vendor/quill/quill.min.js"></script>
        <script src="vendor/simple-datatables/simple-datatables.js"></script>
        <script src="vendor/tinymce/tinymce.min.js"></script>
        <script src="vendor/php-email-form/validate.js"></script>

         

<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.datatable-1').dataTable();
      $('.dataTables_paginate').addClass("btn-group datatable-pagination");
      $('.dataTables_paginate > a').wrapInner('<span />');
      $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
      $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
  </script>

<script src="DataTables/js/dataTables.bootstrap.min.js"></script>

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




