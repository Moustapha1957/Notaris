<?php 
session_start();
include 'bdconnect.php';
include 'nav.php';

$id_dossier_client = $_GET['id'];
$isc = $_GET['isc'];
$id_user = $_SESSION['id_user'];

$sqlmd = "SELECT c.*, dc.*, sdc.*, u.nom_user, u.prenom_user, u.matricule_user, u.profession_user
          FROM commentaires c
          INNER JOIN dossier_client dc ON c.id_dossier = dc.id_dossier_client
          INNER JOIN sous_dossier_client sdc ON c.id_sous_dossier = sdc.id_sous_dossier_client
          INNER JOIN users u ON c.id_user = u.id_user_at
          WHERE c.id_dossier = :id_dossier 
          AND c.id_sous_dossier = :id_sous_dossier";

$stmtmd = $conn->prepare($sqlmd);
$stmtmd->bindParam(':id_dossier', $id_dossier_client, PDO::PARAM_INT);
$stmtmd->bindParam(':id_sous_dossier', $isc, PDO::PARAM_INT);
$stmtmd->execute();
$recupmd = $stmtmd->fetch();

?>

<section class="section profile">
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>
<body>
<div class="page d-flex">
<div class="content w-full">
    

<div class="wrapper d-grid gap-20 mt-5">

<?php 
foreach ($recupmd as $row) {

    $nom_user = $row["nom_user"];
    $prenom_user = $row["prenom_user"];
    $matricule_user = $row["matricule_user"];
    $prenom_client = $row["prenom_client"];
    $nom_client = $row["nom_client"];
    $profession_user = $row["profession_user"];
    $nom_sous_dossier = $row["nom_sous_dossier"];
    $valeur = $row["valeur"];
    $type_sous_dossier = $row["type_sous_dossier"];
    $numero_notaris = $row["numero_notaris"];

    // Formater la date
    $date_modification = $row["date_modification"];
    $timestamp = strtotime($date_modification);
    setlocale(LC_TIME, 'fr_FR.UTF-8'); // Définit le local en français
    $date_formattee = strftime("%A, le %e %B %Y", $timestamp); // "mercredi, le 7 février 2024"

    $modification = $row["modification"];
?>

<!-- debut -->

    <!-- Start Latest Post Widget -->
    <div class="latest-post p-20 bg-white p-relative">
        <h2 class="mt-0 mb-25">Détails</h2>
        <div class="top d-flex align-center">
            <img class="avatar mr-15" src="imgs/avatar.png" alt="" />
            <div class="info">
                <span class="d-block mb-5 fw-bold"><?php echo $matricule_user ." - ". $prenom_user ." - ". $nom_user ." ". $profession_user; ?></span>
                <span class="c-grey"><?php echo $date_formattee; ?></span>
            </div>
        </div>
        <div class="post-content txt-c-mobile pt-20 pb-20 mt-20 mb-20">
            <h4><?php echo $modification . " dans le dossier de " . $prenom_client ." ". $nom_client;?></h4>
        </div>
        <!--<div class="post-stats between-flex c-grey">
            <div>
                <i class="fa-regular fa-heart"></i>
                <span>1.8K</span>
            </div>
            <div>
                <i class="fa-regular fa-comments"></i>
                <span>500</span>
            </div>
        </div>-->
    </div>
    <!-- end Latest Post Widget -->

<!-- finn -->

<?php } ?>



</div>
</div>       
</div>       
</body>
</html>
</section>
