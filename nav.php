<?php
date_default_timezone_set('Africa/Bamako');
include 'bdconnect.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">
  <meta name="author" content="imperis.com">
  <title>Notaris</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--  -->

  <link rel="shortcut icon" href="assetstyle/img/logo-small.png">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assetstyle/plugins/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="assetstyle/plugins/feather/feather.css">

  <link rel="stylesheet" href="assetstyle/plugins/icons/flags/flags.css">

  <link rel="stylesheet" href="assetstyle/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="assetstyle/plugins/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="assetstyle/css/style.css">

  <!--  -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="DataTables/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->


  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Inclure Bootstrap depuis un CDN -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


  <style type="text/css">
    body {

      color: #566787;
      background: #d9d9d9;
      font-family: 'Varela Round', sans-serif;
      font-size: 13px;
    }

    /* Style Bore */

    .btn-group-sm>.btn,
    .btn-sm {
      padding: .25rem .5rem;
      font-size: .875rem;
      border-radius: 1.2rem;
    }

    .dashco {
      background: #f8b739;
      border-radius: 5px;
    }

    .dashboard .info-card h6 {
      font-size: 25px;
      color: #ffffff;
      font-weight: 700;
    }

    .dashboard .revenue-card .card-icon {
      color: #7ED957;
      background: #fff;
      border: 1px solid;
    }



    .dashboard .top-selling .table thead {
      background: #7ED957;
      color: #fff;
      height: 50px;
    }

    /* table sticky*/

    table {
      width: 100%;
      border-collapse: collapse;
    }


    .header_fixed {
      max-height: 100vh;
      width: 100%;
      overflow: auto;
      /* border: 1px solid #dddddd; */
    }

    .header_fixed thead th {
      position: sticky;
      top: 0;
      /* background-color: #7ED957; */
      /* color: white; */
      font-size: 15px;
    }

    /* table sticky */
    /* scrool dossier file */
    .type-acte {
      background: #f9f9f9;
      /* min-width: 0px; */
      height: 300px;
      overflow-y: scroll;
      border-radius: 10px;
      /* border: 1px solid #000; */
      border: 1px solid #eee;

      &::-webkit-scrollbar {
        width: 5px;
        /* ajustez la largeur selon vos préférences */
      }

      &::-webkit-scrollbar-thumb {
        background-color: #f8b739;
        /* attribuez la couleur bleue à la poignée (thumb) */
        border-radius: 6px;
        /* arrondissez les coins de la poignée */
      }

      &::-webkit-scrollbar-track {
        background-color: #f9f9f9;
        /* attribuez la couleur de fond à la piste */
        border-radius: 10px;
        /* arrondissez les coins de la piste */
      }

      @media (max-width: 767px) {
        .dossierfile {
          height: 300px;
        }
      }

    }

    .rech {
      height: auto;
    }

    .aff {
      height: 500px;
      overflow-y: scroll;
      border-radius: 10px;
      /* border: 1px solid #000; */
      border: 1px solid #eee;

      &::-webkit-scrollbar {
        width: 5px;
        /* ajustez la largeur selon vos préférences */
      }

      &::-webkit-scrollbar-thumb {
        background-color: #f8b739;
        /* attribuez la couleur bleue à la poignée (thumb) */
        border-radius: 6px;
        /* arrondissez les coins de la poignée */
      }

      &::-webkit-scrollbar-track {
        background-color: #f9f9f9;
        /* attribuez la couleur de fond à la piste */
        border-radius: 10px;
        /* arrondissez les coins de la piste */
      }
    }

    .dossierfile {
      background: #fff;
      min-width: 320px;
      height: 575px;
      border-radius: 10px;

      @media (max-width: 767px) {
        .dossierfile {
          height: 300px;
        }
      }
    }


    /* scrool dossier file */


    /* style br */
    .table-wrapper {
      background: #fff;
      padding: 20px 25px;
      margin: 30px 0;
      border-radius: 3px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
      border-collapse: none;
      padding-bottom: 15px;
      background: #435d7d;
      color: #fff;
      padding: 16px 30px;
      margin: -20px -25px 10px;
      border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
      margin: 5px 0 0;
      font-size: 24px;
    }

    .table-title .btn-group {
      float: right;
    }

    .table-title .btn {
      color: #fff;
      float: right;
      font-size: 13px;
      border: none;
      min-width: 50px;
      border-radius: 2px;
      border: none;
      outline: none !important;
      margin-left: 10px;
    }

    .table-title .btn i {
      float: left;
      font-size: 21px;
      margin-right: 5px;
    }

    .table-title .btn span {
      float: left;
      margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
      border-color: #e9e9e9;
      padding: 12px 15px;
      vertical-align: middle;
    }

    table.table tr th:first-child {
      width: 60px;
    }

    table.table tr th:last-child {
      width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
      background: #f5f5f5;
    }

    table.table th i {
      font-size: 13px;
      margin: 0 5px;
      cursor: pointer;
    }

    table.table td:last-child i {
      opacity: 0.9;
      font-size: 22px;
      margin: 0 5px;
    }

    table.table td a {
      font-weight: bold;
      color: #566787;
      display: inline-block;
      text-decoration: none;
      outline: none !important;
    }

    table.table td a:hover {
      color: #2196F3;
    }

    table.table td a.edit {
      color: #FFC107;
    }

    table.table td a.delete {
      color: #F44336;
    }

    table.table td i {
      font-size: 19px;
    }

    table.table .avatar {
      border-radius: 50%;
      vertical-align: middle;
      margin-right: 10px;
    }

    .hint-text {
      float: left;
      margin-top: 10px;
      font-size: 13px;
    }

    /* Custom checkbox */
    .custom-checkbox {
      position: relative;
    }

    .custom-checkbox input[type="checkbox"] {
      opacity: 0;
      position: absolute;
      margin: 5px 0 0 3px;
      z-index: 9;
    }

    .custom-checkbox label:before {
      width: 18px;
      height: 18px;
    }

    .custom-checkbox label:before {
      content: '';
      margin-right: 10px;
      display: inline-block;
      vertical-align: text-top;
      background: white;
      border: 1px solid #bbb;
      border-radius: 2px;
      box-sizing: border-box;
      z-index: 2;
    }

    .custom-checkbox input[type="checkbox"]:checked+label:after {
      content: '';
      position: absolute;
      left: 6px;
      top: 3px;
      width: 6px;
      height: 11px;
      border: solid #000;
      border-width: 0 3px 3px 0;
      transform: inherit;
      z-index: 3;
      transform: rotateZ(45deg);
    }

    .custom-checkbox input[type="checkbox"]:checked+label:before {
      border-color: #03A9F4;
      background: #03A9F4;
    }

    .custom-checkbox input[type="checkbox"]:checked+label:after {
      border-color: #fff;
    }

    .custom-checkbox input[type="checkbox"]:disabled+label:before {
      color: #b8b8b8;
      cursor: auto;
      box-shadow: none;
      background: #ddd;
    }

    /* Modal styles */
    .modal .modal-dialog {
      max-width: 400px;
    }

    .modal .modal-header,
    .modal .modal-body,
    .modal .modal-footer {
      padding: 20px 30px;
    }

    .modal .modal-content {
      border-radius: 3px;
    }

    .modal .modal-footer {
      background: #ecf0f1;
      border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
      display: inline-block;
    }

    .modal .form-control {
      border-radius: 2px;
      box-shadow: none;
      border-color: #dddddd;
    }

    .modal textarea.form-control {
      resize: vertical;
    }

    .modal .btn {
      border-radius: 2px;
      min-width: 100px;
    }

    .modal form label {
      font-weight: normal;
    }

    /* Styles spécifiques pour l'affichage en grande miniature */
    .icon-large {
      font-size: 48px;
      /* Ajustez la taille selon vos besoins */
      color: #007bff;
      /* Couleur de l'icône */
      margin-right: 10px;
      /* Marge à droite pour l'espace entre l'icône et le texte */
    }

    /* Styles spécifiques pour l'affichage en liste */
    .icon-list {
      font-size: 24px;
      /* Ajustez la taille selon vos besoins */
      color: #5bc0de;
      /* Couleur de l'icône */
      margin-right: 5px;
      /* Marge à droite pour l'espace entre l'icône et le texte */
    }
  </style>
  <!-- <script type="text/javascript">
    $(document).ready(function() {
      // Activate tooltip
      $('[data-toggle="tooltip"]').tooltip();
      // Select/Deselect checkboxes
      var checkbox = $('table tbody input[type="checkbox"]');
      $("#selectAll").click(function() {
        if (this.checked) {
          checkbox.each(function() {
            this.checked = true;
          });
        } else {
          checkbox.each(function() {
            this.checked = false;
          });
        }
      });
      checkbox.click(function() {
        if (!this.checked) {
          $("#selectAll").prop("checked", false);
        }
      });
    });
  </script> -->

  <!-- <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <a href="dashboard.php" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
        <ul class="list-unstyled components mb-5">

          <li>
            <a href="dashboard.php" class="btn"><span class="text-dark"></span>Dashboard</a>
          </li>

          <?php
          // if (
          //   $_SESSION['departement_user'] == "Clerc Principal" ||
          //   $_SESSION['departement_user'] == "Notaire" ||
          //   $_SESSION['departement_user'] == "Clerc Immobilier/Assistant Études" ||
          //   $_SESSION['departement_user'] == "Clerc Sociétés" ||
          //   $_SESSION['departement_user'] == "Secrétaire Clerc/Caisse" ||
          //   $_SESSION['departement_user'] == "Secrétaire Clerc"
          // ) {
          ?>


            <li>
              <a href="recup.php" class="btn"><span class="text-dark"></span>Dossiers</a>
            </li>

            <li>
              <a href="nouveau_dossier.php" class="btn"><span class="text-dark"></span>Ouvrir un Nouveau Dossier</a>
            </li>

            <li>
              <a href="message_privee.php?id=1" class="btn"><span class="text-dark"></span>Messagerie</a>
            </li>

            <li>
              <a href="pourcentages.php" class="btn"><span class="text-dark"></span>Pourcentages</a>
            </li>
            <li>
              <a href="historique_auth.php" class="btn"><span class="text-dark"></span>Historique des authentifications</a>
            </li>

          <?php
          //}
          ?>












          <li>
            <a href="modification_password.php" class="btn"><span class="text-dark"></span>Modifier Le Mot De Passe</a>
          </li>

          <?php

          // if ($_SESSION['departement_user'] == "GRH") {
          // 
          ?>

            <li>
              <a href="nouveau_user.php" class="btn"><span class="text-dark"></span>Ajouter Le Nouveau Personnel</a>
            </li>

            <li>
              <a href="reunion.php" class="btn"><span class="text-dark"></span>Reunion</a>
            </li>
          <?php
          // }
          ?>


        </ul>

        <div class="footer">
          <p>-->
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <!-- Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> Tout droits réservés | Edit<i class="icon-heart" aria-hidden="true"></i> by <a href="https://www.imperis.com/" target="_blank">Imperis.com</a>
            Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.</p> -->
  <!-- </div>

      </div>
    </nav>

    <div id="content" class="p-4 p-md-5">


      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button> -->

  <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">-->
  <!-- <ul class="nav navbar-nav ml-auto"> -->
  <!--<li class="nav-item active">
                    <a class="nav-link" href="#">Statistique</a>
                </li>
               <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>-->
  <!-- <li class="nav-item active">
              <form method="post" action="deconnexion.php">
                <input type="submit" class="btn btn-dark" value="Deconnexion" name="logout">
              </form>
            </li>
          </ul> -->
  <!--</div>-->
  <!-- </div>
      </nav> -->

  <!-- esss -->
  <div class="main-wrapper">

    <!-- En tete le haut du Nav -->

    <div class="header">

      <div class="header-left">
        <a href="dashboard.php" class="logo">
          <img src="assetstyle/img/LOGONOTARIS.png" alt="Logo">
        </a>
        <a href="dashboard.php" class="logo logo-small">
          <img src="assetstyle/img/logo-small.png" alt="Logo" width="30" height="30">
        </a>
      </div>

      <div class="menu-toggle">
        <a href="javascript:void(0);" id="toggle_btn">
          <i class="fas fa-bars"></i>
        </a>
      </div>

      <!--<div class="top-nav-search">
        <form>
          <input type="text" class="form-control" placeholder="Search here">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>-->



      <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
      </a>


      <ul class="nav user-menu">
        <!-- <li class="nav-item dropdown language-drop me-2">
          <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
            <img src="assetstyle/img/icons/header-icon-01.svg" alt="">
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="javascript:;"><i class="flag flag-bl me-2"></i>Francais</a>
            <a class="dropdown-item" href="javascript:;"><i class="flag flag-lr me-2"></i>English</a>
            <a class="dropdown-item" href="javascript:;"><i class="flag flag-cn me-2"></i>Turkce</a>
          </div>
        </li> -->

        <li class="nav-item dropdown noti-dropdown me-2">
          <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
            <?php
            $sqlnotification = "SELECT * FROM messagerie WHERE email_recepteur = :email_recepteur AND lecture = :lecture";
            $smtpnotification = $conn->prepare($sqlnotification);
            $smtpnotification->bindParam(':email_recepteur', $_SESSION['email_user'], PDO::PARAM_STR);
            $lecturenotification = "Non"; // Définir la valeur de lecture
            $smtpnotification->bindParam(':lecture', $lecturenotification, PDO::PARAM_STR);
            $smtpnotification->execute();

            if ($smtpnotification->rowCount() == 0) {
            ?>
              <img src="assetstyle/img/icons/header-icon-05.svg" alt="">
            <?php } else { ?>

              <img src="assetstyle/img/icons/bell-pin-svgrepo-com.svg" width="25" height="25" alt="">
            <?php  } ?>
          </a>
          <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header">
              <span class="notification-title">Notifications</span>

            </div>
            <div class="noti-content">
              <ul class="notification-list">
                <?php
                $sqluser = "SELECT m.*, u.nom_user AS nom_emetteur, u.prenom_user AS prenom_emetteur
            FROM messagerie m
            JOIN users u ON m.email_emetteur = u.email_user
            WHERE m.email_recepteur = :email_recepteur 
            AND m.lecture = :lecture";
                $stmtuser = $conn->prepare($sqluser);
                $stmtuser->bindParam(':email_recepteur', $_SESSION['email_user'], PDO::PARAM_STR);
                $lecture = "Non"; // Définir la valeur de lecture
                $stmtuser->bindParam(':lecture', $lecture, PDO::PARAM_STR);
                $stmtuser->execute();

                if ($stmtuser->rowCount() == 0) {
                  echo '<li class="notification-message">
            <div class="media d-flex">
              <div class="media-body flex-grow-1">
                <p class="noti-details"><span class="noti-title"><center>Aucun Nouveau</span> Message <span class="noti-title">trouvé.</center></span></p>
                <p class="noti-time"><span class="notification-time"></span></p>
              </div>
            </div>
          </li>';
                } else {
                  while ($rowuser = $stmtuser->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <li class="notification-message">
                      <a href="message_contenu.php?nbr=<?php echo $rowuser['id']; ?>">
                        <div class="media d-flex">
                          <span class="avatar avatar-sm flex-shrink-0">
                            <img class="avatar-img rounded-circle" alt="User Image" src="assetstyle/img/profiles/avatar-02.jpg">
                          </span>
                          <div class="media-body flex-grow-1">
                            <p class="noti-details"><span class="noti-title"><?= $rowuser['prenom_emetteur'] ?> <?= $rowuser['nom_emetteur'] ?></span> Vous a envoyé un message.</p>
                            <p class="noti-time"><span class="notification-time"><?= $rowuser['datee'] ?></span></p>
                          </div>
                        </div>
                      </a>
                    </li>
                <?php
                  }
                }
                ?>






              </ul>
            </div>

          </div>
        </li>

        <li class="nav-item zoom-screen me-2">
          <a href="#" class="nav-link header-nav-list">
            <img src="assetstyle/img/icons/header-icon-04.svg" alt="">
          </a>
        </li>

        <li class="nav-item dropdown has-arrow new-user-menus">
          <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <span class="user-img">
              <?php
              // Assurez-vous de sécuriser votre requête en utilisant une requête préparée
              $sql = "SELECT * FROM users WHERE id_user_at = ?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$_SESSION['id_user']]);
              $row = $stmt->fetch(PDO::FETCH_ASSOC);

              if ($row && isset($row['avatar'])) {
                // Chemin complet de l'avatar
                $avatarFilePath = 'img/avatar_user/' . $row['avatar'];

                // Afficher l'avatar avec un identifiant unique
                echo '<img id="avatar" src="' . $avatarFilePath . '" class="rounded-circle" width="31" alt="Avatar Notaris">';
              } else {
                // Afficher un message si l'avatar n'est pas trouvé
                echo "Avatar non trouvé";
              }
              ?>
              <!--<img class="rounded-circle" src="assetstyle/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy">-->
              <div class="user-text">
                <h6><?php echo $_SESSION['prenom_user'] . " " . $_SESSION['nom_user']; ?></h6>
                <p class="text-muted mb-0"><?php echo $_SESSION['departement_user']; ?></p>
              </div>
            </span>
          </a>
          <div class="dropdown-menu">
            <div class="user-header">
              <div class="avatar avatar-sm">
                <?php
                // Assurez-vous de sécuriser votre requête en utilisant une requête préparée
                $sql = "SELECT * FROM users WHERE id_user_at = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$_SESSION['id_user']]);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row && isset($row['avatar'])) {
                  // Chemin complet de l'avatar
                  $avatarFilePath = 'img/avatar_user/' . $row['avatar'];

                  // Afficher l'avatar avec un identifiant unique
                  echo '<img id="avatar" src="' . $avatarFilePath . '" class="avatar-img rounded-circle" width="31" alt="Avatar Notaris">';
                } else {
                  // Afficher un message si l'avatar n'est pas trouvé
                  echo "Avatar non trouvé";
                }
                ?>
                <!--<img src="assetstyle/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">-->
              </div>
              <div class="user-text">
                <h6><?php echo $_SESSION['prenom_user'] . " " . $_SESSION['nom_user']; ?></h6>
                <p class="text-muted mb-0"><?php echo $_SESSION['departement_user']; ?></p>
              </div>
            </div>
            <a class="dropdown-item" href="profile.php">Profile</a>
            <a class="dropdown-item" href="message_prive.php?id=1">Messagerie</a>

            <?php
            if ($_SESSION['departement_user'] == "Notaire") {
            ?>
              <a class="dropdown-item" href="parametre.php"> Paramètres</a>
            <?php } ?>

            <form method="post" action="deconnexion.php">
              <input type="submit" class="dropdown-item" value="Deconnexion" name="logout">
            </form>
            <!--a class="dropdown-item" href="login.html">Logout</a>-->
          </div>
        </li>

      </ul>

    </div>

    <!-- fin du haut du Nav -->

    <!-- Debut du Sidebar a gauche -->
    <div class="sidebar" id="sidebar">
      <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
          <ul>
            <li class="menu-title">
              <span>Menu Principale</span>
            </li>
            <!-- <li class="submenu">
                            <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="index.html">Admin Dashboard</a></li>
                                <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
                                <li><a href="student-dashboard.html">Student Dashboard</a></li>
                            </ul>
                        </li> -->

            <!-- <li>
                            <a href="recup.php" class="btn"><span class="text-dark"></span>Dossiers</a>
                        </li>
                        
                        <li>
                            <a href="nouveau_dossier.php" class="btn"><span class="text-dark"></span>Ouvrir un Nouveau Dossier</a>
                        </li>
                        
                        <li>
                            <a href="message_privee.php?id=1" class="btn"><span class="text-dark"></span>Messagerie</a>
                        </li>
                        
                        <li>
                            <a href="pourcentages.php" class="btn"><span class="text-dark"></span>Pourcentages</a>
                        </li>
                        <li>
                            <a href="historique_auth.php" class="btn"><span class="text-dark"></span>Historique des authentifications</a>
                        </li> -->



            <li>
              <a href="dashboard.php"><i class="feather-grid"></i> <span> Dashboard</span></a>
            </li>
            <li>
              <a href="recup.php"><i class="fas fa-comment-dollar"></i> <span>Dossiers</span></a>
            </li>
            <li>
              <a href="nouveaudos.php"><i class="fas fa-clipboard-list"></i> <span>Nouveau Dossier</span></a>
            </li>
            <li>
              <a href="nouveau_user.php"><i class="fas fa-clipboard-list"></i> <span>Nouveau Personnel</span></a>
            </li>
            <li>
              <a href="message_prive.php?id=1"><i class="fa-solid fa-message"></i></i> <span>Messagerie</span></a>
            </li>
            <li>
              <a href="pourcentages.php"><i class="fa-solid fa-percent"></i><span>Pourcentages</span></a>
            </li>
            <li>
              <a href="modification_password.php"><i class="fas fa-table"></i> <span>Modifier Le Mot De Passe</span></a>
            </li>
            <li>
              <a href="historique_auth.php"><i class="fas fa-book"></i> <span>Historique connexion</span></a>
            </li>



          </ul>

        </div>
      </div>
    </div>

    <!-- fin du Sidebar a gauche -->


    <!-- Debut du contenu de la page -->
    <div class="page-wrapper">
      <div class="content container-fluid">
        <!-- debut content header -->

        <!-- <div class="page-header">
          <div class="row">
            <div class="col">
              <h3 class="page-title">Blank Page</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
              </ul>
            </div>
          </div>
        </div> -->
        <!-- fin content header -->


        <!-- debut contenu scroollable-->
        <!-- <div class="row">
          <div class="col-sm-12">
            Contents here
          </div>
        </div> -->
        <!-- fin contenu scroollable-->



        <script src="assetstyle/js/jquery-3.6.0.min.js"></script>

        <script src="assetstyle/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="assetstyle/js/feather.min.js"></script>

        <script src="assetstyle/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assetstyle/js/script.js"></script>