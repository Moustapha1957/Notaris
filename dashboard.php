<?php
session_start();

if (isset($_SESSION['email_user'])) {

    include 'nav.php';
    include 'bdconnect.php';
?>


    <section class="section profile">
        <!-- <div class="container"> -->
        <center>
            <div class="">
                <h3>Tableau de bord sur l'evolution de votre cabinet</h3>
            </div>
        </center>


        <div class="row mt-5">
            <!--  -->
            <!--  -->
            <?php
            if ($_SESSION['departement_user'] == "Notaire") {
                # code...

                // Vous avez déjà votre connexion à la base de données ici

                // Requête SQL pour compter le nombre d'enregistrements dans le mois en cours
                $sql = "SELECT COUNT(*) AS nombre_enregistrements
        FROM sous_dossier_client
        WHERE MONTH(CAST(date_creation_acte AS DATE)) = MONTH(CURRENT_DATE())
        AND YEAR(CAST(date_creation_acte AS DATE)) = YEAR(CURRENT_DATE())";

                $result = $conn->query($sql);

                if ($result) {
                    // Récupération du nombre d'enregistrements
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $nombre_enregistrements = $row["nombre_enregistrements"];

                    // Affichage du nombre d'enregistrements dans la structure HTML
                    echo '<div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Total Actes du Mois</h6>
                                        <h3>' . $nombre_enregistrements . ' Acte(s)</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assetstyle/img/icons/fili2.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo "Erreur lors de l'exécution de la requête";
                }
            } elseif ($_SESSION['departement_user'] == "Clerc Principal") {


                // Requête SQL pour compter le nombre d'enregistrements dans le mois en cours
                $sql = "SELECT COUNT(*) AS nombre_enregistrements
        FROM sous_dossier_client
        WHERE id_user = '{$_SESSION['id_user']}' AND MONTH(CAST(date_creation_acte AS DATE)) = MONTH(CURRENT_DATE())
        AND YEAR(CAST(date_creation_acte AS DATE)) = YEAR(CURRENT_DATE())";

                $result = $conn->query($sql);

                if ($result) {
                    // Récupération du nombre d'enregistrements
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $nombre_enregistrements = $row["nombre_enregistrements"];

                    // Affichage du nombre d'enregistrements dans la structure HTML
                    echo '<div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Total Actes du Mois</h6>
                                        <h3>' . $nombre_enregistrements . ' Acte(s)</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assetstyle/img/icons/fili2.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo "Erreur lors de l'exécution de la requête";
                }
            }

            ?>
            <!-- Acte en cours -->
            <!--  -->
            <?php
            // Requête SQL pour compter le nombre d'enregistrements dans le mois en cours
            $sql_total_actes = "SELECT COUNT(*) AS nombre_total_actes
                    FROM sous_dossier_client";

            $result_total_actes = $conn->query($sql_total_actes);

            if ($result_total_actes) {
                // Récupération du nombre total d'actes
                $row_total_actes = $result_total_actes->fetch(PDO::FETCH_ASSOC);
                $nombre_total_actes = $row_total_actes["nombre_total_actes"];
            } else {
                $nombre_total_actes = 0;
            }

            // Requête SQL pour compter le nombre d'enregistrements avec un statut égal à 1
            $sql_actes_encours = "SELECT COUNT(*) AS nombre_actes_encours
                      FROM sous_dossier_client
                      WHERE statut = 1";

            $result_actes_encours = $conn->query($sql_actes_encours);

            if ($result_actes_encours) {
                // Récupération du nombre d'actes en cours
                $row_actes_encours = $result_actes_encours->fetch(PDO::FETCH_ASSOC);
                $nombre_actes_encours = $row_actes_encours["nombre_actes_encours"];
            } else {
                $nombre_actes_encours = 0;
            }

            // Affichage du nombre total d'actes et du nombre d'actes en cours dans la structure HTML
            echo '
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Actes En cours</h6>
                                <h3>' . $nombre_actes_encours . '/' . $nombre_total_actes . ' Acte(s)</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/fili3.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>'
            ?>
            <!-- Actes finaliser  -->
            <!--  -->
            <?php
            // Requête SQL pour compter le nombre d'enregistrements avec un statut égal à 0
            $sql_actes_finalises = "SELECT COUNT(*) AS nombre_actes_finalises
                        FROM sous_dossier_client
                        WHERE statut = 0";

            $result_actes_finalises = $conn->query($sql_actes_finalises);

            if ($result_actes_finalises) {
                // Récupération du nombre d'actes finalisés
                $row_actes_finalises = $result_actes_finalises->fetch(PDO::FETCH_ASSOC);
                $nombre_actes_finalises = $row_actes_finalises["nombre_actes_finalises"];
            } else {
                $nombre_actes_finalises = 0;
            }

            // Affichage du nombre d'actes finalisés dans la structure HTML
            echo '<div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Actes finalisés</h6>
                                <h3>' . $nombre_actes_finalises . ' Acte(s)</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/fili4.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>' ?>
            <!-- Total Actes -->

            <!--  -->
            <?php
            // Requête SQL pour compter le nombre total d'enregistrements dans la table
            $sql_total_actes = "SELECT COUNT(*) AS total_actes FROM sous_dossier_client";

            $result_total_actes = $conn->query($sql_total_actes);

            if ($result_total_actes) {
                // Récupération du nombre total d'actes
                $row_total_actes = $result_total_actes->fetch(PDO::FETCH_ASSOC);
                $total_actes = $row_total_actes["total_actes"];
            } else {
                $total_actes = 0;
            }

            // Affichage du nombre total d'actes dans la structure HTML
            echo '
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total des Actes</h6>
                                <h3>' . $total_actes . ' Acte(s)</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/fili5.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>' ?>
        </div>


        <div class="row">
            <!-- Total client -->
            <!--  -->
            <?php
            // Requête SQL pour compter le nombre total d'enregistrements dans la table dossier_client
            $sql_total_clients = "SELECT COUNT(*) AS total_clients FROM dossier_client";

            $result_total_clients = $conn->query($sql_total_clients);

            if ($result_total_clients) {
                // Récupération du nombre total d'enregistrements
                $row_total_clients = $result_total_clients->fetch(PDO::FETCH_ASSOC);
                $total_clients = $row_total_clients["total_clients"];
            } else {
                $total_clients = 0;
            }

            // Affichage du nombre total d'enregistrements dans la structure HTML
            echo '<div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Clients</h6>
                                <h3>' . $total_clients . ' Client(s)</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/fili2.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>' ?>
            <!-- Nouveau client -->

            <!--  -->
            <?php
            // Requête SQL pour compter le nombre d'enregistrements de nouveaux clients dans le mois actuel
            $sql_nouveaux_clients = "SELECT COUNT(*) AS nouveaux_clients 
                         FROM dossier_client 
                         WHERE MONTH(CAST(date_creation AS DATE)) = MONTH(CURRENT_DATE()) 
                         AND YEAR(CAST(date_creation AS DATE)) = YEAR(CURRENT_DATE())";

            $result_nouveaux_clients = $conn->query($sql_nouveaux_clients);

            if ($result_nouveaux_clients) {
                // Récupération du nombre d'enregistrements de nouveaux clients
                $row_nouveaux_clients = $result_nouveaux_clients->fetch(PDO::FETCH_ASSOC);
                $nouveaux_clients = $row_nouveaux_clients["nouveaux_clients"];
            } else {
                $nouveaux_clients = 0;
            }

            // Affichage du nombre d'enregistrements de nouveaux clients dans la structure HTML
            echo '
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Nouveaux clients du mois</h6>
                                <h3>' . $nouveaux_clients . '+</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/fili6.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div> '
            ?>
            <!--Total Personnel  -->

            <!--  -->
            <?php
            // Requête SQL pour compter le nombre total d'enregistrements dans la table users
            $sql_total_users = "SELECT COUNT(*) AS total_users FROM users";

            $result_total_users = $conn->query($sql_total_users);

            if ($result_total_users) {
                // Récupération du nombre total d'enregistrements
                $row_total_users = $result_total_users->fetch(PDO::FETCH_ASSOC);
                $total_users = $row_total_users["total_users"];
            } else {
                $total_users = 0;
            }

            // Affichage du nombre total d'enregistrements dans la structure HTML
            echo '<div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Personnels</h6>
                                <h3>' . $total_users . ' Personnel(s)</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>' ?>
            <!-- chiffre d'affaire -->
            <?php
            // Requête SQL pour soustraire le total de la colonne "total_frais" du total de la colonne "montant_remise"
            $sql_chiffre_affaires = "SELECT SUM(total_frais) - COALESCE(SUM(montant_remise), 0) AS chiffre_affaires
FROM frais_emolument
WHERE YEAR(date_creation_emolument) = YEAR(CURDATE())";

            $result_chiffre_affaires = $conn->query($sql_chiffre_affaires);

            if ($result_chiffre_affaires) {
                // Récupération du chiffre d'affaires
                $row_chiffre_affaires = $result_chiffre_affaires->fetch(PDO::FETCH_ASSOC);
                $chiffre_affaires = $row_chiffre_affaires["chiffre_affaires"];
                $montant_formatte = number_format($chiffre_affaires, 0, ',', '.') . ' XOF';
            } else {
                $chiffre_affaires = 0;
            }

            // Affichage du chiffre d'affaires dans la structure HTML
            echo '
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Chiffres d\'affaires de </h6>
                                 <h3>' . $montant_formatte . '</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/dash-icon-04.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ';
            ?>
        </div>
        <!-- chart -->

        <div class="row">
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Évolution mensuelle des</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-blue"></span>Dossiers</li>
                                    <li><span class="circle-green"></span>Actes</li>
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apexcharts-area"></div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 col-lg-6">

                <div class="card card-chart">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="card-title">Évolution annuelle</h5>
                            </div>
                            <div class="col-6">
                                <ul class="chart-list-out">
                                    <li><span class="circle-orange"></span>chiffre d'affaires</li>
                                    <!-- <li><span class="circle-green"></span>Boys</li> -->
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="bar"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- fin chart -->

        <!-- Tableau historique d'authentification -->

        <!-- <script src="assetstyle/js/jquery-3.6.0.min.js"></script>
        <script src="assetstyle/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assetstyle/js/feather.min.js"></script>
        <script src="assetstyle/plugins/slimscroll/jquery.slimscroll.min.js"></script> -->
        <script src="assetstyle/plugins/apexchart/apexcharts.min.js"></script>
        <script src="assetstyle/plugins/apexchart/chart-data.js"></script>
        <!-- <script src="assetstyle/js/script.js"></script> -->

        <!-- Tableau historique d'authentification 
        <script src="vendor/apexcharts/apexcharts.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
            });
        </script>-->
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