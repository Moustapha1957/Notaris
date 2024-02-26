<?php session_start();

if (isset($_SESSION['email_user'])) {

    include 'nav.php';
    include 'bdconnect.php';
    $id_userr = $_SESSION['id_user'];

    $sqlSelect = "SELECT * FROM dossier_client";
    $stmtSelect = $conn->prepare($sqlSelect);
    $stmtSelect->execute();
    $result = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
?>


    <section class="section profile">

        <!-- debut  -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Files</title>
            <link rel="stylesheet" href="css/all.min.css" />
            <link rel="stylesheet" href="css/framework.css" />
            <link rel="stylesheet" href="css/master.css" />
            <link rel="preconnect" href="https://fonts." />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
            <style>
                /* Ajoutez du CSS pour cacher les éléments non correspondants lors de la recherche */
                .hidden {
                    display: none;
                }

                #noResultsMessage {
                    display: none;
                    color: red;
                }
            </style>
        </head>

        <body>
            <div class="page d-flex">

                <div class="content w-full">
                    <!-- Start Head -->
                    <!-- <div class="head bg-white p-15 between-flex">
                        <div class="search p-relative">
                            <input class="p-10" type="search" placeholder="Type A Keyword" />
                        </div>
                        <div class="icons d-flex align-center">
                            <span class="notification p-relative">
                                <i class="fa-regular fa-bell fa-lg"></i>
                            </span>
                            <img src="imgs/avatar.png" alt="" />
                        </div>
                    </div> -->
                    <!-- End Head -->
                    <div class="d-flex align-center">
                        <h1 class="p-relative">Nos Dossiers</h1>

                    </div>


                    <div class="files-page d-flex  gap-20">
                        <div class="files-stats w-25 p-20 bg-white rad-10">
                            <h2 class="mt-0 mb-15 txt-c-mobile">Ajouter type d'actes</h2>
                            <div class="type-acte">


                                <?php
                                $sqlActe = "SELECT * FROM Pourcentages";
                                $stmtActe = $conn->prepare($sqlActe);
                                $stmtActe->execute();
                                $resultActe = $stmtActe->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($resultActe as $rowActe) {
                                ?>
                                    <div class="d-flex align-center border-eee p-10 rad-6 mb-15 fs-13">
                                        <i class="fa-solid fa-file-contract fa-lg blue center-flex c-blue icon"></i>
                                        <div class="info">
                                            <span><?php echo $rowActe['nom_pourcentage']; ?></span>

                                        </div>
                                        <div class="size c-grey"><a href="modifierpourcentage.php?id=<?php echo $rowActe['id_pourcentage']; ?>" class="btn btn-warning">Modifier</a></div>
                                    </div>
                                <?php
                                }
                                ?>






                            </div>
                            <div class="row">
                                <a class="upload bg-primary c-white fs-13 rad-6 d-block w-fit" data-bs-toggle="modal" data-bs-target="#con-close-modal">
                                    <i class="fa-solid fa-angles-up mr-10"></i>
                                    Ajouter
                                </a>
                                <a class="upload bg-dark c-white fs-13 rad-6 d-block w-fit" href="pourcentages.php" data-toggle="modal">
                                    <i class="fa-solid fa-angles-up mr-10"></i>
                                    Voir
                                </a>
                            </div>
                        </div>

                        <div class="w-75 dossierfile"><br>
                            <div class="rech">
                                <center>
                                    <div class="search p-relative">
                                        <input id="searchInput" class="form-control w-75 rad-10 ms-3 mx-3" type="search" placeholder="Rechercher un dossier" />
                                    </div>
                                </center><br>
                            </div>


                            <div class="aff">
                                <div class="files-content d-grid gap-20">
                                    <?php
                                    foreach ($result as $row) {
                                    ?>

                                        <div class="file bg-white p-10 rad-10">
                                            <a href="telechargementdossier.php?id=<?php echo $row['id_dossier_client'] ?>&prenom=<?php echo $row['prenom_client'] ?>&nom=<?php echo $row['nom_client'] ?>"><i class="fa-solid fa-download c-grey "></i></a>
                                            <a href="dossier_client.php?id=<?php echo $row['id_dossier_client']; ?>" style="text-decoration: none; color: inherit;">
                                                <div class="icon txt-c">
                                                    <img class="mt-15 mb-15" src="imgs/fold1.svg" alt="" />
                                                </div>
                                                <div class="txt-c mb-10 fs-14"><?php echo $row['prenom_client'] . " " . $row['nom_client']; ?></div>
                                                <center>
                                                    <p class="c-grey fs-13">N° Client : <?php echo $row['id_dossier_client']; ?></p>
                                                </center>

                                                <hr>
                                                <div class="mb-10 d-flex justify-content-between">

                                                    <div class="">
                                                        <span>Enregistrement :</span>
                                                    </div>

                                                    <div class="">
                                                        <span><?php echo $row['date_creation']; ?></span>
                                                    </div>

                                                </div>

                                                <div class="mb-10 d-flex justify-content-between">

                                                    <div class="">
                                                        <span>Nombre D'Acte :</span>
                                                    </div>

                                                    <div class="">
                                                        <span><?php echo $row['nombre_acte']; ?> Acte(s)</span>
                                                    </div>

                                                </div>

                                            </a>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                                <div id="noResultsMessage">Aucun client trouvé avec votre recherche</div>
                            </div>

                        </div>

                        <?php
                        if (isset($_POST['Enregistrer'])) {
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
                                echo "<script type='text/javascript'> document.location ='recup.php'; </script>";
                            } else {
                                // Un enregistrement avec le même nom d'acte existe déjà
                                echo "<script>alert('Le nom de l\'acte existe déjà. Veuillez choisir un autre nom.');</script>";
                            }
                        }
                        ?>


                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form id="ModalAddPourcentage" action="" method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Nouveau type d'acte</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <!-- contenu du modal -->
                                            <div class="form-group">
                                                <label>Nom De L'Acte</label>
                                                <input type="text" name="nom_acte" id="mmatriculationsociete" class="form-control" placeholder="Veuillez indiquer directement le nom de l'acte" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>De 1 à 2.500.000 FCFA</label>
                                                <input class="form-control" type="text" name="premier" placeholder="%">
                                            </div>
                                            <div class="form-group">
                                                <label>De 2.500.000 à 5.000.000 FCFA</label>
                                                <input class="form-control" type="text" name="deuxieme" placeholder="%">
                                            </div>
                                            <div class="form-group">
                                                <label for="libelle_nddi">De 5.000.000 à 10.000.000 FCFA</label>
                                                <input class="form-control" type="text" name="troisieme" placeholder="%">
                                            </div>
                                            <div class="form-group">
                                                <label for="libelle_nddi">De 10.000.000 FCFA ou Plus</label>
                                                <input class="form-control" type="text" name="quatrieme" placeholder="%">
                                            </div>
                                            <!-- contenu du modal -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" name="Enregistrer" class="btn btn-info">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Fonction pour filtrer les dossiers en fonction du texte de recherche
                    function filterFiles() {
                        var searchText = document.getElementById('searchInput').value.toLowerCase();
                        var files = document.querySelectorAll('.files-content .file');
                        var noResultsMessage = document.getElementById('noResultsMessage');
                        var found = false;

                        files.forEach(function(file) {
                            var fileName = file.querySelector('.fs-14').innerText.toLowerCase();
                            var fileId = file.querySelector('.fs-13').innerText.toLowerCase();
                            if (fileName.includes(searchText) || fileId.includes(searchText)) {
                                file.classList.remove('hidden');
                                found = true;
                            } else {
                                file.classList.add('hidden');
                            }
                        });

                        // Afficher le message si aucun résultat n'a été trouvé
                        if (!found) {
                            noResultsMessage.style.display = 'block';
                        } else {
                            noResultsMessage.style.display = 'none';
                        }
                    }

                    // Ajouter un écouteur d'événements pour déclencher le filtrage lors de la saisie dans le champ de recherche
                    document.getElementById('searchInput').addEventListener('input', filterFiles);
                });
            </script>
        </body>

        </html>

        <!-- fin -->

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