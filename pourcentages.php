<?php
session_start();
include 'nav.php';
include 'bdconnect.php';

if (isset($_POST['enregistrer'])) {
    // Récupérer les données du formulaire
    $nom_acte = $_POST['nom_acte'];
    $premier = $_POST['premier'];
    $deuxieme = $_POST['deuxieme'];
    $troisieme = $_POST['troisieme'];
    $quatrieme = $_POST['quatrieme'];

    // Vérifier s'il existe déjà un enregistrement avec le même nom d'acte
    $sqlCheckDoublon = "SELECT COUNT(*) as count FROM pourcentages WHERE nom_pourcentage = :nom_acte";
    $stmtCheckDoublon = $conn->prepare($sqlCheckDoublon);
    $stmtCheckDoublon->bindParam(':nom_acte', $nom_acte, PDO::PARAM_STR);
    $stmtCheckDoublon->execute();
    $doublonCount = $stmtCheckDoublon->fetchColumn();

    if ($doublonCount == 0) {
        // Aucun doublon trouvé, procéder à l'insertion
        $sqlInsert = "INSERT INTO pourcentages (nom_pourcentage, premier_pourcentage, deuxieme_pourcentage, troisieme_pourcentage, quatrieme_pourcentage) 
                      VALUES (:nom_acte, :premier, :deuxieme, :troisieme, :quatrieme)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bindParam(':nom_acte', $nom_acte, PDO::PARAM_STR);
        $stmtInsert->bindParam(':premier', $premier, PDO::PARAM_STR);
        $stmtInsert->bindParam(':deuxieme', $deuxieme, PDO::PARAM_STR);
        $stmtInsert->bindParam(':troisieme', $troisieme, PDO::PARAM_STR);
        $stmtInsert->bindParam(':quatrieme', $quatrieme, PDO::PARAM_STR);
        $stmtInsert->execute();

        echo "<script>alert('Enregistrement réussi.');</script>";
    } else {
        // Un enregistrement avec le même nom d'acte existe déjà
        echo "<script>alert('Le nom de l\'acte existe déjà. Veuillez choisir un autre nom.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pourcentages</title>
</head>
<body>
    <div class="box box-info">
    <div class="box-body table-responsive">
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
             <div class="card-title">
                <h3 class="card-title">Tableau de Pourcentage</h3> 
             </div>
             <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="form-floating">
                     <input type="text" name="nom_acte" id="mmatriculationsociete" class="form-control" placeholder="Veuillez indiquer directement le nom de l'acte, s'il vous plaît" required="">
                 </div>    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <label for="libelle_nddi">De 1 à 2.500.000 FCFA</label><br>
                        <input class="form-control" type="text" name="premier" placeholder="%">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <label for="libelle_nddi">De 2.500.000 à 5.000.000 FCFA</label><br>
                        <input class="form-control" type="text" name="deuxieme" placeholder="%">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <label for="libelle_nddi">De 5.000.000 à 10.000.000 FCFA</label><br>
                        <input class="form-control" type="text" name="troisieme" placeholder="%">
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <label for="libelle_nddi">De 10.000.000 FCFA ou Plus</label><br>
                        <input  class="form-control" type="text" name="quatrieme" placeholder="%">
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-12">
                    <center><input type="submit" id="submit" name="enregistrer" class="btn btn-primary" value="Enregistrer"></center> 
                </div>
                <div class="col-lg-2 col-md-2 col-12">   
                </div>
            </div>
        </div>
    </div><br>
    </div>
   </div>

 <div class="contenaire-fluid">
   <div class="card">
    <div class="card-header">

        <h3 class="card-title">
         Tableau des Pourcentages
        </h3>
        <div class="box box-info">
    <div class="box-body table-responsive">
    <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                 <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped responsive display" >
        <thead>
            <tr>
                <th>Nom</th>
                <th>2.500.000</th>
                <th>5.000.000</th>
                <th>10.000.000</th>
                <th>10.000.000</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Récupérer les données existantes
            $sqlSelect = "SELECT * FROM pourcentages";
            $stmtSelect = $conn->prepare($sqlSelect);
            $stmtSelect->execute();
            $result = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>{$row['nom_pourcentage']}</td>";
                echo "<td>{$row['premier_pourcentage']}%</td>";
                echo "<td>{$row['deuxieme_pourcentage']}%</td>";
                echo "<td>{$row['troisieme_pourcentage']}%</td>";
                echo "<td>{$row['quatrieme_pourcentage']}%</td>";
                echo "<td><button class='btn btn-primary'><a href='modifierpourcentage.php?id={$row['id_pourcentage']}'>Modifier</a></button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>            
    </div>   
</div>      
</div>   
    </div>    
   </div>
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

        <script src="vendor/jquery/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"></script>

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

</body>
</html>
