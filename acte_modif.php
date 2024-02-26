<?php 
session_start();
include'bdconnect.php';
include'nav.php';
$id_dossier_client = $_GET['id'];
$idsd = $_GET['isc'];
?>


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

                    <?php 
                    $sqlak = "SELECT * FROM pourcentages";
$stmtak = $conn->prepare($sqlak);

$stmtak->execute();
                     ?>


                    <div class="form-group">
                        <label>Le Type D'Acte</label>
                        <select name="type_sous_dossier" class="form-control">
                        	<option value="<?php echo $type_sous_dossier; ?>"><?php echo $type_sous_dossier; ?> (Actuel)</option>
                        	<?php 
                        	while ($rak = $stmtak->fetch()) {
                        		?>
                        		<option value="<?php echo $rak['nom_pourcentage']; ?>"><?php echo $rak['nom_pourcentage']; ?></option>
                        	<?php	
                        	}
                        	 ?>
                        </select>
                        
                       
                    </div>
                    <div class="form-group">
                        <label>Le Numéro Notaris</label>
                        <input type="text" class="form-control" name="numero_notaris" value="<?php echo htmlspecialchars($numero_notaris); ?>" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="window.history.back();">Retour</button>
                    <button type="submit" name="" class="btn btn-info">Enregistrer</button>
                </div>
            </form>
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