<?php 
session_start();
include 'nav.php';
include 'bdconnect.php';
 ?>




<section class="section profile">
        <!-- <div class="container"> -->
        <center>
            <div class="">
                <h3>Configuration / Sauvegarde / Récupération</h3>
            </div>
        </center>


        <div class="row mt-5">
            <!--  -->
            <!--  -->
           <div class="col-xl-4 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Backup de tous les dossiers</h6>
                                        <form method="POST" action="bmd/folder_backup.php">
                <button name="backup" class="btn btn-primary"><h3>Backup</h3></button>
              </form>
                                    </div>
                                    <div class="db-icon">
                                        <img src="assetstyle/img/icons/fili2.svg" alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Backup de Base de Données</h6>
                                <form method="POST" action="bmd/database_backup.php">
                <button name="backup" class="btn btn-primary"><h3>Backup</h3></button>
              </form>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/GetImage.png" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actes finaliser  -->
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Restoration Du projet</h6>
                                <h3>Restorer</h3>
                            </div>
                            <div class="db-icon">
                                <img src="assetstyle/img/icons/fili4.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
        </div>


       
        

        <script src="assetstyle/plugins/apexchart/apexcharts.min.js"></script>
        <script src="assetstyle/plugins/apexchart/chart-data.js"></script>
        
    </section>


</body>
</html>