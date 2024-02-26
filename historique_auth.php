<?php session_start();

if (isset($_SESSION['email_user'])) {

    include 'nav.php';
    include 'bdconnect.php';
?>


    <section class="section profile">
        <!-- <div class="container"> -->

        <!-- Tableau historique d'authentification -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-2">historique des authentification</h5>
                        <!-- <p class="card-text">
                            This is the most basic example of the datatables with zero configuration. Use the
                            <code>.datatable</code> class to initialize datatables.
                        </p> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>abreviation login</th>
                                        <th>departement_user</th>
                                        <th>Contact</th>
                                        <th>Derniere connexion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Récupérer les données existantes
                                    $sqlSelect = "SELECT * FROM users";
                                    $stmtSelect = $conn->prepare($sqlSelect);
                                    $stmtSelect->execute();
                                    $result = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($result as $row) {
                                        echo "<tr>";
                                        echo "<td>{$row['nom_user']}</td>";
                                        echo "<td>{$row['prenom_user']}</td>";
                                        echo "<td>{$row['matricule_user']}</td>";
                                        echo "<td>{$row['departement_user']}</td>";
                                        echo "<td>{$row['contact_user']}</td>";
                                        echo "<td>{$row['last_login_datetime']}</td>";
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

        <!-- <div class="contenaire-fluid mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        historique des authentification
                    </h3>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                            <div class="header_fixed">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped responsive display">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>abreviation login</th>
                                            <th>departement_user</th>
                                            <th>Contact</th>
                                            <th>Derniere connexion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Récupérer les données existantes
                                        // $sqlSelect = "SELECT * FROM users";
                                        // $stmtSelect = $conn->prepare($sqlSelect);
                                        // $stmtSelect->execute();
                                        // $result = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

                                        // foreach ($result as $row) {
                                        //     echo "<tr>";
                                        //     echo "<td>{$row['nom_user']}</td>";
                                        //     echo "<td>{$row['prenom_user']}</td>";
                                        //     echo "<td>{$row['matricule_user']}</td>";
                                        //     echo "<td>{$row['departement_user']}</td>";
                                        //     echo "<td>{$row['contact_user']}</td>";
                                        //     echo "<td>{$row['last_login_datetime']}</td>";
                                        //     echo "</tr>";
                                        // }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- </div> -->
        <!-- Tableau historique d'authentification -->
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
        </script>
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