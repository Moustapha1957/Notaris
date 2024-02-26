<?php
session_start();
include 'nav.php';
include 'bdconnect.php';

$id_dossier_client = $_GET['id'];
$id_sous_dossier_client = $_GET['isc'];

$sql = "SELECT * FROM sous_dossier_client WHERE id_dossier_client = :id_dossier AND id_sous_dossier_client = :id_sous_dossier";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_dossier', $id_dossier_client, PDO::PARAM_INT);
    $stmt->bindParam(':id_sous_dossier', $id_sous_dossier_client, PDO::PARAM_INT);
    $stmt->execute();
    $record = $stmt->fetch();

    
        $type_sous_dossier = $record['type_sous_dossier'];
    

 

// Check if $type_sous_dossier exists in the pourcentages table
$sqlCheckType = "SELECT COUNT(*) as count FROM pourcentages WHERE nom_pourcentage = :nom_pourcentage";
$stmtCheckType = $conn->prepare($sqlCheckType);
$stmtCheckType->bindParam(':nom_pourcentage', $type_sous_dossier, PDO::PARAM_STR);
$stmtCheckType->execute();
$typeCount = $stmtCheckType->fetchColumn();

if ($typeCount > 0) {
    // Type exists, proceed with the original code
    

    if ($record) {
       // $type_sous_dossier = $record['type_sous_dossier'];
        $forme1 = $forme2 = $forme3 = $forme4 = $formeTotal = $formepourc1 = $formepourc2 = $formepourc3 = $formepourc4 = $formemontant = 0;

        // Récupération des pourcentages
        $sqlPourcentage = "SELECT * FROM pourcentages WHERE nom_pourcentage = :nom_pourcentage";
        $stmtPourcentage = $conn->prepare($sqlPourcentage);
        $stmtPourcentage->bindParam(':nom_pourcentage', $type_sous_dossier, PDO::PARAM_STR);
        $stmtPourcentage->execute();
        $pourcentageRecord = $stmtPourcentage->fetch();

        if ($pourcentageRecord) {
            $premier = $pourcentageRecord['premier_pourcentage'];
            $az = ($premier / 100);
            $deuxieme = $pourcentageRecord['deuxieme_pourcentage'];
            $bz = ($deuxieme / 100);
            $troisieme = $pourcentageRecord['troisieme_pourcentage'];
            $cz = ($troisieme / 100);
            $quatrieme = $pourcentageRecord['quatrieme_pourcentage'];
            $dz = ($quatrieme / 100);
        }

        $montant = $record['valeur'];

        // Initialisation des étapes à 0
        $pr1 = $pr2 = $pr3 = $pr4 = $frais1 = $frais2 = $frais3 = $frais4 = 0;

        if ($montant > 2500000) {
            $pr1 = min($montant, 2500000) * $az;
            $frais1 = $pr1;
            $reste = ($montant - $pr1);
        } else {
            $pr1 = ($montant * $az);
            $frais1 = $pr1;
            $reste = 0;
        }

        if ($montant >= 5000000) {
            $ok1 = (5000000 - 2500000);
            if ($ok1 < 0) {
                $ok1 = 0;
            }
            $pr2 = ($ok1 * $bz);
            $frais2 = $pr2;
            $reste1 = ($reste - $pr2);
        } else {
            $ok1 = ($montant - 2500000);
            if ($ok1 < 0) {
                $ok1 = 0;
            }
            $pr2 = ($ok1 * $bz);
            $frais2 = $pr2;
            $reste1 = 0;
        }

        if ($montant >= 10000000) {
            $ok2 = (10000000 - 5000000);
            if ($ok2 < 0) {
                $ok2 = 0;
            }
            $pr3 = ($ok2 * $cz);
            $frais3 = $pr3;
            $reste2 = ($reste1 - $pr3);
        } else {
            $ok2 = ($montant - 5000000);
            if ($ok2 < 0) {
                $ok2 = 0;
            }
            $pr3 = ($ok2 * $cz);
            $frais3 = $pr3;
            $reste2 = 0;
        }

        $ok3 = ($montant - 10000000);
        if ($ok3 < 0) {
            $ok3 = 0;
        }
        $pr4 = ($ok3 * $dz);
        $frais4 = $pr4;

        $totalFrais = ($frais1 + $frais2 + $frais3 + $frais4);

        $forme1 = $frais1;
        $forme2 = $frais2;
        $forme3 = $frais3;
        $forme4 = $frais4;
        $formeTotal = $totalFrais;
        $formepourc1 = $premier;
        $formepourc2 = $deuxieme;
        $formepourc3 = $troisieme;
        $formepourc4 = $quatrieme;
        $formemontant = $montant;
    }
} else {
    // Type does not exist, prompt the user to insert percentages
    echo "Les pourcentages pour le type d'acte spécifié ne sont pas disponibles. Veuillez insérer des pourcentages pour le type d'acte.";
    // You can provide a link or a form for the user to insert percentages here.
}
?>
<div class="container-fluid">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-title">
                Calcul Emolument <?php echo $type_sous_dossier; ?> 
            </h3>
        </div>
        <div class="card-body">       
        <div class="row">
            <div class="col-md-12 col-lg-12 col-12">
                <?php if ($typeCount > 0): ?>
                    <div class="box box-info">
                        <?php $montant_formatte = number_format($formemontant, 0, ',', '.') . ' XOF'; ?>
                        <h2>La Valeur Initiale = <?php echo $montant_formatte; ?></h2>
    <div class="box-body table-responsive">
                <table class="table table-striped table-bordered">
                    
                    <thead>
                    <tr>
                        <th scope="col">De</th>
                        <th scope="col">A</th>
                        <th scope="col">Pourcentages</th>
                        <th scope="col">Frais</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1 FCFA</td>
                        <td scope="row">2.500.000 FCFA</td>
                        <td scope="row"><?php echo $formepourc1; ?> %</td>
                        <th scope="row"><?php echo $forme1; ?> FCFA</th>
                    </tr>
                    <tr>
                        <td scope="row">2.500.000 FCFA</td>
                        <td scope="row">5.000.000 FCFA</td>
                        <td scope="row"><?php echo $formepourc2; ?> %</td>
                        <th scope="row"><?php echo $forme2; ?> FCFA</th>
                    </tr>
                    <tr>
                        <td scope="row">5.000.000 FCFA</td>
                        <td scope="row">10.000.000 FCFA</td>
                        <td scope="row"><?php echo $formepourc3; ?> %</td>
                        <th scope="row"><?php echo $forme3; ?> FCFA</th>
                    </tr>
                    <tr>
                        <td scope="row">10.000.000 FCFA</td>
                        <td scope="row">Ou Plus</td>
                        <td scope="row"><?php echo $formepourc4; ?> %</td>
                        <th scope="row"><?php echo $forme4; ?> FCFA</th>
                    </tr>
                    <tr>
                    <th scope="row" colspan="3"><strong><h4>Total Emolument</h4></strong></th>
                    <th scope="row" id="totalAmount"><?php echo $formeTotal; ?> FCFA</th>
                    </tr>
                    <?php 

                        // Ici on verifie si l'id du sous dossier existe dans la table remise
                       $sqlremise = "SELECT COUNT(*) as count FROM remise WHERE id_sous_dossier = :id_sous_dossier";
                        $stmtremise = $conn->prepare($sqlremise);
                        $stmtremise->bindParam(':id_sous_dossier', $id_sous_dossier_client, PDO::PARAM_STR);
                        $stmtremise->execute();
                        $typeCountremise = $stmtremise->fetchColumn();

                        if ($typeCountremise > 0) {

        // Ici on selection la ligne contenant l'id du sous dossier
                        $sqlmontremise = "SELECT * FROM remise WHERE id_sous_dossier = :id_sous_dossier";
                        $stmtmontremise = $conn->prepare($sqlmontremise);
                        $stmtmontremise->bindParam(':id_sous_dossier', $id_sous_dossier_client, PDO::PARAM_STR);
                        $stmtmontremise->execute();
                        $montremise = $stmtmontremise->fetch();

                       if ($montremise) {
                       $montRemise = $montremise['montant_remise'];
           
                     }

                     $meme = ($formeTotal - $montRemise);
                    ?>

                    <tr>
    <th scope="row" colspan="3"><strong><h4>Montant De La Remise</h4></strong></th>
    <th id="totalAmount"><?php echo $meme; ?> FCFA</th>
</tr>

                    <tr>
                    <th scope="row" scope="row" colspan="3"><strong><h4>Montant Après Remise</h4></strong></th>
                   <th scope="row" id="totalAmount"><?php echo $montRemise; ?> FCFA</th>
                   </tr>

                   <?php
                   }else {
                  ?>
                  <tr>
                  <th scope="row" scope="" colspan="4" width="">
                    <center>
                    <button type="button" class="btn btn-primary" onclick="toggleDiscount()">Faire Remise</button>
                    </center>
                  </th>
                   </tr>
                   <tr id="discountRow" style="display: none;">
                   <th scope="row" colspan="2"><strong><h4>Remise</h4></strong>
                   </th>
             <th>
            <form action="" method="post">
                    <input  type="checkbox" id="discountCheckbox" name="discountCheckbox" onchange="updateDiscount()"> 20% &nbsp
                    <input class="form-control" type="text" id="discountAmount" name="discountAmount"  onclick="updateCheckbox()"> FCFA <br><br>
                    <input type="submit" name="subremi" class="btn-primary" value="Appliquer">
                    <input type="hidden" id="remainingAmountHidden" name="remainingAmountHidden">
           </form>
        </th>
        <th scope="row" id="remainingAmount"></th>  
        <?php
        // si l'utilisateur clic sur Appliquer
            if (isset($_POST['subremi'])) {
    
   
    // Vérifier si la clé 'remainingAmountHidden' existe dans $_POST
           $remainingAmount = isset($_POST['remainingAmountHidden']) ? $_POST['remainingAmountHidden'] : 0;

    // Effectuer l'insertion dans la base de données
          $insertRemiseSql = "INSERT INTO remise (id_sous_dossier, montant_remise) VALUES ('$id_sous_dossier_client', '$remainingAmount')";
    
    // Assurez-vous que $conn est votre objet de connexion à la base de données
          $conn->exec($insertRemiseSql);


         echo "<script>alert('La Remise ete prise en compte, le Montant apès la remise est : $remainingAmount FCFA')</script>";
         echo "<script type='text/javascript'> document.location = 'Emolument_recup.php?id=" . $id_dossier_client . "&isc=".$id_sous_dossier_client."'; </script>";
}
?>
    </tr>
    <?php 
    }
?>       



                </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-12">
                <form method="post" action="">
                <center><button style="color: white; background-color: blue;" name="submitenreg">Enregistrer</button></center>
                <?php 
             if (isset($_POST['submitenreg'])) {


    // Vérifier si l'id_sous_dossier existe déjà dans la table frais_emolument
           $checkDuplicateSql = "SELECT COUNT(*) as count FROM frais_emolument WHERE id_sous_dossier = '$id_sous_dossier_client'";
           $duplicateResult = $conn->query($checkDuplicateSql);
           $row = $duplicateResult->fetch(PDO::FETCH_ASSOC);

          if ($row['count'] == 0) {

           $moth = date("m");
        // Récupérer le dernier numéro enregistré
           $sql = "SELECT MAX(SUBSTRING_INDEX(id_frais_emolument, '/', 1)) AS last_numero FROM frais_emolument";
           $stmt = $conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $last_numero = $row['last_numero'];

// Extraire le numéro actuel
          $numero = (int)$last_numero + 1;

          $date_creation_emolument = date("Y-m-d");

// Formatage du numéro avec les variables actuelles
           $id_emolument = sprintf("%03d", $numero) . '/' . date("m") . '/' . date("Y") . '/' . $_SESSION['abreviation'];


           $dsf = "SELECT * FROM sous_dossier_client WHERE id_sous_dossier_client = :id_sous_dossier_client";
        $fgh = $conn->prepare($dsf);
        $fgh->bindParam(':id_sous_dossier_client', $id_sous_dossier_client, PDO::PARAM_INT);
        $fgh->execute();
        $rkj = $fgh->fetch();
        if ($rkj) {
            $numero_notaris = $rkj['numero_notaris'];
        }
                   
        // Prepare and execute the SQL query to insert data into the database
        $sql = "INSERT INTO frais_emolument (id_sous_dossier, id_frais_emolument, numero_notaris, 1_2500000, 2500000_5000000, 5000000_10000000, 10000000_plus, total_frais, montant_remise, montant_initiale, date_creation_emolument) 
                VALUES ('$id_sous_dossier_client', '$id_emolument', '$numero_notaris', '$forme1', '$forme2', '$forme3', '$forme4', '$formeTotal', '$montRemise', '$formemontant', '$date_creation_emolument')";

        // Utiliser la fonction exec() car aucun résultat n'est renvoyé
        $conn->exec($sql);

        

        echo "<script>alert('Frais Emolument enregistrés avec succès')</script>";
        echo "<script type='text/javascript'> document.location = 'dossier_client.php?id=" . $id_dossier_client."'; </script>";
    } else {
        // L'id_sous_dossier existe déjà dans la table, afficher un message d'erreur
        echo "<script>alert('Excusez-nous, des frais ont déjà été enregistrés')</script>";
    }
}
?>

                </form><?php endif; ?>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
    var formeTotal = <?php echo $formeTotal; ?>;
    console.log(formeTotal);
    var isInputClicked = false;

    document.getElementById('discountAmount').onblur = function() {
        var checkbox = document.getElementById('discountCheckbox');
        checkbox.disabled = false;
        isInputClicked = false;
    };

    function toggleDiscount() {
        var discountRow = document.getElementById('discountRow');
        var applyButton = document.querySelector('.btn-primary');

        if (discountRow.style.display === 'none') {
            // Afficher la partie "Remise"
            discountRow.style.display = 'table-row';
            applyButton.textContent = 'Annuler La Remise';
        } else {
            // Masquer la partie "Remise"
            discountRow.style.display = 'none';
            applyButton.textContent = 'Appliquer La Remise';
        }
    }

    function updateDiscount() {
    var checkbox = document.getElementById('discountCheckbox');
    var amountInput = document.getElementById('discountAmount');
    var remainingTh = document.getElementById('remainingAmount');
    var hiddenInput = document.getElementById('remainingAmountHidden');  // Nouveau champ caché

    if (remainingTh) {
        if (checkbox.checked) {
            amountInput.value = '';  // Réinitialisez la valeur si la case est cochée
            amountInput.disabled = true;

            var discountValue = formeTotal * 0.2;
            var remainingAmount = formeTotal - discountValue;

            // Mettez à jour la valeur du champ caché
            hiddenInput.value = remainingAmount;

            remainingTh.textContent = remainingAmount + ' FCFA';
        } else {
            amountInput.disabled = false;
            hiddenInput.value = '';  // Réinitialisez la valeur si la case n'est pas cochée
            remainingTh.textContent = '';
        }
    } else {
        console.error("Element with ID 'remainingAmount' not found.");
    }
}


function updateCheckbox() {
    var checkbox = document.getElementById('discountCheckbox');
    var amountInput = document.getElementById('discountAmount');
    var remainingTh = document.getElementById('remainingAmount');

    checkbox.checked = false;

    if (!isInputClicked) {
        checkbox.disabled = true;
    }

    var discountValue = parseFloat(amountInput.value) || 0;
    var remainingAmount = formeTotal - discountValue;
    remainingTh.textContent = remainingAmount + ' FCFA';

    isInputClicked = true;
}

function submitForm() {
        // Soumettre le formulaire une fois que la valeur est mise à jour
        document.forms[0].submit();
    }

</script>
<script src="vendor/jquery/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/main.js"></script>
         <!--<script src="js/bootstrap.min.js"></script>-->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>