<?php
session_start();

if (isset($_SESSION['email_user'])) {
    include 'nav.php';
    include 'bdconnect.php';

    $id_dossier_client = $_GET['id'];
    $id_user = $_SESSION['id_user'];

    $sql = "SELECT * FROM dossier_client WHERE id_dossier_client = $id_dossier_client";
    $result = $conn->query($sql);

    if ($result) {
        $dossier_client = $result->fetch(PDO::FETCH_ASSOC);

        if ($dossier_client) {
            $nom_client = $dossier_client['nom_client'];
            $prenom_client = $dossier_client['prenom_client'];
            $contact_client = $dossier_client['contact_client'];
            $adresse_client = $dossier_client['adresse_client'];

            echo "<h2><b>Dossier Client:</b> $prenom_client $nom_client $contact_client $adresse_client</h2>";
        } else {
            die("Dossier client non trouvé.");
        }
    } else {
        die("Erreur lors de la récupération des informations du dossier client.");
    }

    $sql = "SELECT * FROM sous_dossier_client WHERE id_dossier_client = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id_dossier_client, PDO::PARAM_INT);
    $stmt->execute();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Clients</title>
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/framework.css" />
        <link rel="stylesheet" href="css/master.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
    </head>

    <body>
        <div class="page d-flex">
            <div class="content w-full">
                <div class="row align-items-center">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <h3 class="m-0">Les actes</h3>
                    </div>

                    <div class="col-md-6 mb-3 mb-md-0">
                        <div class="input-group custom-search-bar">
                            <input id="searchInput" type="text" class="form-control border-0 rounded-pill" placeholder="Rechercher...">
                        </div>
                    </div>

                    <div class="col-md-3 d-flex justify-content-md-end">
                        <a href="#addEmployeeModal" data-bs-toggle="modal" data-bs-target="#con-close-modal" style="color: white;" class="btn btn-primary rounded-pill">Ajouter</a>

                    </div>
                </div>
                <div class="friends-page d-grid gap-20 mt-5">

                    <?php
                    // Vérifier s'il y a des résultats
                    if ($stmt->rowCount() == 0) {
                        echo '<tr><td colspan="3">Aucun acte établi pour ce client.</td></tr>';
                    } else {
                    ?>

                        <?php
                        while ($row = $stmt->fetch()) {
                            if ($row["statut"] == "1") {
                                $statut = "En Cours";
                                $color = "Red";
                            } elseif ($row["statut"] == "0") {
                                $statut = "Acté";
                                $color = "Green";
                            }

                            $idsd = $row["id_sous_dossier_client"];
                        ?>
                            <div class="friend bg-white rad-6 p-20 p-relative">
                                <div class="txt-c">
                                    <h4 class="m-0"><?php echo $row["nom_sous_dossier"]; ?></h4>
                                    <p class="c-grey fs-13 mt-5 mb-0"><?php echo $row["type_sous_dossier"]; ?></p>
                                </div>
                                <div class="icons fs-14 p-relative">
                                    <div class="mb-10 d-flex justify-content-between">
                                        <div class="">
                                            <i class="fa-solid fa-money-bill-1 fa-fw"></i>
                                            <span>Valeur : </span>
                                        </div>
                                        <?php
                                        $valeur = $row["valeur"];
                                        $montant_formatte = number_format($valeur, 0, ',', '.') . ' XOF';
                                        ?>
                                        <div class="">
                                            <span><?php echo $montant_formatte; ?></span>
                                        </div>

                                    </div>
                                    <div class="mb-10 d-flex justify-content-between">
                                        <div class="">
                                            <i class="fa-solid fa-folder fa-fw"></i>
                                            <span>Numeros Notaris : </span>
                                        </div>
                                        <div class="">
                                            <span><?php echo $row["numero_notaris"]; ?></span>
                                        </div>

                                    </div>
                                    <div class="mb-10 d-flex justify-content-between">
                                        <div class="">
                                            <i class="fa-solid fa-clipboard-check"></i>
                                            <span> Status : </span>
                                        </div>
                                        <div class="">
                                            <span><?php echo $statut; ?></span>
                                        </div>

                                    </div>
                                    <div class="mb-10 d-flex justify-content-between">
                                        <div class="">
                                            <i class="fa-solid fa-file fa-fw"></i>
                                            <span>Autres Informations : </span>
                                        </div>
                                        <div class="">
                                            <span><?php echo $row["autres_information"]; ?></span>
                                        </div>

                                    </div>


                                    <!-- <span class="vip fw-bold c-orange">VIP</span> -->
                                </div>

                                <div class="info mt-5 between-flex fs-13">
                                    <span class="c-grey">calculer emolument</span>
                                    <div>
                                        <?php
                                        /** Ici on verifie si c'est bien l'utilisateur **/

                                        $sqlVerificationuser = "SELECT COUNT(*) AS count FROM sous_dossier_client WHERE id_user = :id_user AND id_sous_dossier_client = :id_sous_dossier_client";
                                        $stmtVerificationuser = $conn->prepare($sqlVerificationuser);
                                        $stmtVerificationuser->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                                        $stmtVerificationuser->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
                                        $stmtVerificationuser->execute();
                                        $rowVerificationuser = $stmtVerificationuser->fetch();

                                        if ($rowVerificationuser['count'] > 0) {

                                            // Vérification si l'ID du sous-dossier existe dans la table "frais_emolument"
                                            $sqlVerification = "SELECT COUNT(*) AS count FROM frais_emolument WHERE id_sous_dossier = :id_sous_dossier";
                                            $stmtVerification = $conn->prepare($sqlVerification);
                                            $stmtVerification->bindParam(':id_sous_dossier', $id_sous_dossier, PDO::PARAM_INT);
                                            $stmtVerification->execute();
                                            $rowVerification = $stmtVerification->fetch();
                                        ?>
                                            <!-- <a class="bg-green c-white btn-shape" href="#">Calculer</a> -->
                                            <a href="emolument_recup.php?id=<?php echo $id_dossier_client ?>&isc=<?php echo $idsd ?>" style="color: white;" data-toggle="modal" class="btn btn-info btn-sm mx-2">Emolument <img src="images/calculatrice.webp"></a>
                                        <?php
                                        } else {

                                            /*** Si c'est pas l'utilisateur ***/
                                            echo "<div style='color: #ff7c00;'><img src='imgs/disable.png' width='30' height='30' alt='Non Autorisé'></div>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="info mt-5 between-flex fs-13">
                                    <span class="c-grey">Generer l'acte</span>
                                    <div>
                                        <!-- <a class="bg-primary c-white btn-shape" href="#">Generer</a> -->
                                        <?php

                                        /** Ici on verifie si c'est bien l'utilisateur **/

                                        $sqlVerificationuser = "SELECT COUNT(*) AS count FROM sous_dossier_client WHERE id_user = :id_user AND id_sous_dossier_client = :id_sous_dossier_client";
                                        $stmtVerificationuser = $conn->prepare($sqlVerificationuser);
                                        $stmtVerificationuser->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                                        $stmtVerificationuser->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
                                        $stmtVerificationuser->execute();
                                        $rowVerificationuser = $stmtVerificationuser->fetch();

                                        if ($rowVerificationuser['count'] > 0) {


                                            // Vérification si l'ID du sous-dossier existe dans la table "sous_dossier_client"
                                            $sql_check_id = "SELECT intervenants_doc FROM sous_dossier_client WHERE id_sous_dossier_client = :id_sous_dossier_client";
                                            $stmt_check_id = $conn->prepare($sql_check_id);
                                            $stmt_check_id->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
                                            $stmt_check_id->execute();
                                            $row = $stmt_check_id->fetch(PDO::FETCH_ASSOC);

                                            if ($row && $row['intervenants_doc'] != null) {
                                        ?>
                                                <a href="word_actes.php?id=<?php echo $id_dossier_client ?>&isc=<?php echo $idsd ?>" style="color: white;" class="btn btn-secondary btn-sm mx-2">L'acte <img src="images/word_icone.webp"></a>&nbsp;&nbsp;
                                            <?php
                                            } else {
                                            ?>

                                                <a href="tr_intervenants.php?id=<?php echo $id_dossier_client ?>&idsd=<?php echo $idsd ?>" data-toggle="modal" style="color: white;" class="btn btn-danger btn-sm mx-2">L\'acte</a>&nbsp;&nbsp;
                                            <?php } ?>

                                        <?php
                                        } else {

                                            /*** Si c'est pas l'utilisateur ***/
                                            echo "<div style='color: #ff7c00;'><img src='imgs/disable.png' width='30' height='30' alt='Non Autorisé'></div>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="info mt-5 between-flex fs-13">
                                    <span class="c-grey">Generer Emolument</span>
                                    <div>
                                        <?php

                                        /** Ici on verifie si c'est bien l'utilisateur **/

                                        $sqlVerificationuser = "SELECT COUNT(*) AS count FROM sous_dossier_client WHERE id_user = :id_user AND id_sous_dossier_client = :id_sous_dossier_client";
                                        $stmtVerificationuser = $conn->prepare($sqlVerificationuser);
                                        $stmtVerificationuser->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                                        $stmtVerificationuser->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
                                        $stmtVerificationuser->execute();
                                        $rowVerificationuser = $stmtVerificationuser->fetch();

                                        if ($rowVerificationuser['count'] > 0) {


                                            // Vérifier si l'ID du sous-dossier existe dans la table "frais_emolument"
                                            $sqlVerification = "SELECT COUNT(*) AS count FROM frais_emolument WHERE id_sous_dossier = :id_sous_dossier";
                                            $stmtVerification = $conn->prepare($sqlVerification);
                                            $stmtVerification->bindParam(':id_sous_dossier', $idsd, PDO::PARAM_INT);
                                            $stmtVerification->execute();
                                            $rowVerification = $stmtVerification->fetch();

                                            if ($rowVerification['count'] > 0) {
                                        ?>
                                                <!-- <a class="bg-green c-white btn-shape" href="#">Etablier</a> -->
                                                <a href="word.php?id=<?php echo $id_dossier_client ?>&isc=<?php echo $idsd ?>" data-toggle="modal" style="color: white;" class="btn btn-success btn-sm mx-2">Emolument <img src="images/word_icone.webp"></a>
                                            <?php
                                            } else {
                                            ?>

                                                <button disabled class="btn btn-danger btn-sm mx-2">Emolument <img src="images/word_icone.webp"></button>

                                        <?php }
                                        } else {

                                            /*** Si c'est pas l'utilisateur ***/
                                            echo "<div style='color: #ff7c00;'><img src='imgs/disable.png' width='30' height='30' alt='Non Autorisé'></div>";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <hr>

                                <?php
                                $sqlVerificationuser = "SELECT COUNT(*) AS count FROM sous_dossier_client WHERE id_user = :id_user AND id_sous_dossier_client = :id_sous_dossier_client";
                                $stmtVerificationuser = $conn->prepare($sqlVerificationuser);
                                $stmtVerificationuser->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                                $stmtVerificationuser->bindParam(':id_sous_dossier_client', $idsd, PDO::PARAM_INT);
                                $stmtVerificationuser->execute();
                                $rowVerificationuser = $stmtVerificationuser->fetch();

                                if ($rowVerificationuser['count'] > 0) {
                                ?>

                                    <div class="d-flex justify-content-around">
                                        <a href="acte_modif.php?id=<?php echo $id_dossier_client ?>&isc=<?php echo $idsd ?>" data-toggle="modal" class="btn btn-warning">Modifier</a>
                                        <a href="commentaires.php?id=<?php echo $id_dossier_client ?>&isc=<?php echo $idsd ?>" data-toggle="modal" class="btn btn-secondary">Details</a>
                                    </div>
                                <?php
                                } else {
                                    echo "<center><div style='color: #ff7c00;'><p>Vous n'êtes pas responsable de cet acte.</p></div></center>";
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- Message pour aucun résultat trouvé -->
                        <center>
                            <div id="noResultsMessage" style="display: none; color: red;">Aucun acte trouvé avec cette recherche.</div>
                        </center>
                    <?php
                    }
                } else {
                    ?>
                    <center>
                        <div style="margin-top: 300px">
                            <h3>
                                <?php
                                echo "<script>alert('Oups👋!!! Veuillez Vous Connectez.')</script>";
                                echo "<script type='text/javascript'> document.location ='index.php'; </script>";
                                ?>
                            </h3>
                        </div>
                    </center>
                <?php
                }
                ?>
                </div>
            </div>


            <!-- Edit Modal HTML -->
            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="sousDossierForm" method="POST" action="creation_sous_dossier.php?id=<?php echo $id_dossier_client ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Créer Un Acte</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $sqlSelect = "SELECT * FROM pourcentages";
                                $stmtSelect = $conn->prepare($sqlSelect);
                                $stmtSelect->execute();
                                $result = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <center>
                                    <div class="form-group">
                                        <label>Type D'Acte</label><br>
                                        <select id="typeSousDossier" class="form-control" name="type_sous_dossier" required="">
                                            <option>Selectionner Ici</option>
                                            <?php foreach ($result as $row) { ?>
                                                <option value="<?php echo $row['nom_pourcentage']; ?>"><?php echo $row['nom_pourcentage']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </center>


                                <center>
                                    <div class="form-group">
                                        <label>Nom du Sous-Dossier</label><br>
                                        <input type="text" class="form-control" name="nom_sous_dossier" required="">
                                    </div>
                                </center>


                                <!-- Additional Fields for Assurance -->

                                <center>
                                    <div class="form-group">
                                        <label>Valeur</label><br>
                                        <input type="number" class="form-control" name="valeur" required="">
                                    </div>
                                </center>
                                <center>
                                    <div class="form-group">
                                        <label>Autres Informations</label><br>
                                        <input type="text" class="form-control" name="autres_informations">
                                    </div>
                                </center>

                                <!-- <div class="form-group local-forms">
                                        <label>Repeat Password <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Repeat Password">
                                    </div> -->

                                <!-- <div class="container">
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
                                </div> -->


                                <!--<div id="additionalFields1" class="form-group" style="display:none;">
                        
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
                    </div>-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Annuler</button>
                                <!-- <button type="submit" class="btn btn-info waves-effect waves-light">Enregistrer</button> -->
                                <!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler"> -->
                                <input type="submit" name="submit" class="btn btn-success" value="Ajouter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                // Convertir les données PHP en JSON pour les utiliser dans le script JavaScript
                //var typesSousDossier = <?php echo json_encode($result); ?>;

                // Fonction pour gérer le changement de valeur dans le menu déroulant
                //document.getElementById('typeSousDossier').addEventListener('change', function () {
                //  var selectedValue = this.value;

                // Réinitialiser tous les champs supplémentaires
                // var additionalFields = document.querySelectorAll('.additional-fields');
                // additionalFields.forEach(function(field) {
                // field.style.display = 'none';
                // });

                // Afficher les champs supplémentaires basés sur le type sélectionné
                // typesSousDossier.forEach(function(type) {
                //     if (type.nom_pourcentage === selectedValue) {
                //        var fieldId = 'additionalFields' + type.id; // Ajoutez un identifiant unique pour chaque champ supplémentaire
                //      document.getElementById(fieldId).style.display = 'block';
                //   }
                //  });
                //  });
            </script>

            <script>
                // Fonction pour filtrer les éléments en fonction de la valeur de recherche
                function filterItems() {
                    var input = document.getElementById('searchInput').value.toLowerCase(); // Valeur de la recherche
                    var items = document.getElementsByClassName('friend'); // Éléments à filtrer
                    var found = false; // Variable pour suivre si des éléments ont été trouvés

                    // Parcourir tous les éléments et les masquer s'ils ne correspondent pas à la recherche
                    for (var i = 0; i < items.length; i++) {
                        var item = items[i];
                        var numero_notaris = item.querySelector('.fa-folder').nextElementSibling.textContent.toLowerCase(); // Valeur du numéro de notaire
                        var nom_sous_dossier = item.querySelector('h4').textContent.toLowerCase(); // Valeur du nom du sous-dossier

                        // Vérifier si la recherche correspond au numéro de notaire ou au nom du sous-dossier
                        if (numero_notaris.indexOf(input) > -1 || nom_sous_dossier.indexOf(input) > -1) {
                            item.style.display = ''; // Afficher l'élément s'il correspond à la recherche
                            found = true; // Un élément correspond à la recherche
                        } else {
                            item.style.display = 'none'; // Masquer l'élément s'il ne correspond pas à la recherche
                        }
                    }

                    // Afficher un message si aucun élément n'a été trouvé avec la recherche
                    var noResultsMessage = document.getElementById('noResultsMessage');
                    if (!found) {
                        noResultsMessage.style.display = 'block'; // Afficher le message
                    } else {
                        noResultsMessage.style.display = 'none'; // Masquer le message
                    }
                }

                // Ajouter un écouteur d'événements pour déclencher la fonction de filtrage lorsque la valeur de la recherche change
                document.getElementById('searchInput').addEventListener('input', filterItems);
            </script>

    </body>

    </html>