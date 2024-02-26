<?php 
if (!isset($_SESSION['id_user'])) {
    header('Location: index.php');
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="imperis.com">

        <title>MESSAGERIE</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Lien CDN pour jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Lien CDN pour jQuery DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Lien CDN pour jQuery DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
        <body>



            <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="p-4 pt-5">
                <a href="Acceuil.php" class="img logo rounded-circle mb-5" style="background-image: url(images/Notary.png);"></a>
            <ul class="list-unstyled components mb-5">
            <li>
              <a href="Acceuil.php" class="btn"><span class="text-dark"></span>Acceuil</a>
            </li>



            
              
            

    <li class="active">
                  <h5><a href="message_privee.php?id=3" class="btn"><span class="text-dark"></span>CONTACTS</a></h5>
    </li>



 <li class="active">
 <h5><a href="message_privee.php?id=1" class="btn"><span class="text-dark"></span>BOITE DE RECEPTION</a></h5>
 </li>



    <li class="active">
                  <h5><a href="message_privee.php?id=2" class="btn"><span class="text-dark"></span>MESSAGES ENVOYES</a></h5>
                  </li>

</ul>


              
             
            
            </ul>

            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Edit<i class="icon-heart" aria-hidden="true"></i> by <a href="https://www.imperis.com/" target="_blank">Imperis.com</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

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
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
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
                <li class="nav-item">
                  <form method="post" action="deconnexion.php">
    <button type="submit" name="logout" class="btn btn-dark">Deconnexion</button>
</form>

                </li>
              </ul>
            </div>
          </div>
        </nav>
    