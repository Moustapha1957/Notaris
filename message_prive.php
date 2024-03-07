<?php
session_start();
date_default_timezone_set('Africa/Bamako');
if (isset($_SESSION['email_user'])) {
  include 'nav.php';

  include 'bdconnect.php';
}
?>

<?php

if (isset($_GET['id']) and  $_GET['id'] == 1) {
  # code...
  /*      $p = $conn->prepare('SELECT email_expediteur , email_destinateur, indexx FROM notification WHERE email_destinateur = ? ORDER BY id_notif DESC');*/

  $element_par_page = 15;
  $sql = "SELECT id from messagerie where email_recepteur=? ";
  $element_total_req = $conn->prepare($sql);
  $element_total_req->execute(array($_SESSION['email_user']));
  $element_total = $element_total_req->rowcount();

  $page_totale = ceil($element_total / $element_par_page);

  if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0) {
    $_GET['page'] = intval($_GET['page']);
    $page_courante = $_GET['page'];
  } else {
    $page_courante = 1;
  }
  $depart = ($page_courante - 1) * $element_par_page;

  /*$p -> execute(array( $_SESSION['email']));*/
  $recupcabinet = $conn->prepare('SELECT * FROM messagerie  WHERE email_recepteur = ?  ORDER BY id  DESC LIMIT ' . $depart . ',' . $element_par_page);
  $recupcabinet->execute(array($_SESSION['email_user']));
?>

  <div class="row">
    <div class="col-lg-3 col-md-4">
      <div class="compose-btn">
        <a href="nouveau_message.php" class="btn btn-primary btn-block">
          Nouveaux Messages</a>
      </div>
      <ul class="inbox-menu">
        <li class="active">
          <a href="message_prive.php?id=1"><i class="fas fa-download"></i> Tous les Messages <span class="mail-count">(5)</span></a>
        </li>

        <li>
          <a href="message_select_contact.php?id=3"><i class="far fa-star"></i> Liste des Contacts</a>
        </li>
        <li>
          <a href="messageenvoyer.php?id=2"><i class="far fa-paper-plane"></i> Messages envoyer</a>
        </li>
        <!--<li>
<a href="#"><i class="far fa-file-alt"></i> Drafts <span class="mail-count">(13)</span></a>
</li>-->
        <li>
          <a href="#"><i class="far fa-trash-alt"></i>supprimer</a>
        </li>
      </ul>
    </div>
    <div class="col-lg-9 col-md-8">
      <div class="card">
        <div class="card-body">
          <div class="email-header">
            <div class="row">
              <div class="col top-action-left">
                <div class="float-start">
                  <div class="btn-group dropdown-action">
                    <button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">Select <i class="fas fa-angle-down"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">All</a>
                      <a class="dropdown-item" href="#">None</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Read</a>
                      <a class="dropdown-item" href="#">Unread</a>
                    </div>
                  </div>

                  <div class="btn-group dropdown-action mail-search">
                    <input type="text" placeholder="Search Messages" class="form-control search-message">
                  </div>
                </div>
              </div>
              <div class="col-auto top-action-right">
                <div class="text-end">
                  <button type="button" title="Refresh" data-bs-toggle="tooltip" class="btn btn-white d-none d-md-inline-block"><i class="fas fa-sync-alt"></i></button>
                  <div class="btn-group">
                    <a class="btn btn-white"><i class="fas fa-angle-left"></i></a>
                    <a class="btn btn-white"><i class="fas fa-angle-right"></i></a>
                  </div>
                </div>
                <div class="text-end">
                  <span class="text-muted d-none d-md-inline-block">Showing 10 of 112
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="email-content">
            <div class="table-responsive">
              <!-- <h1>Liste des nouveaux Messages</h1> -->
              <table class="table table-inbox table-hover">
                <!-- all check -->
                <thead>
                  <tr>
                    <th colspan="6">
                      <input type="checkbox" class="checkbox-all">
                    </th>
                  </tr>
                </thead>
                <!-- all check -->
                <tbody>

                  <?php
                  while ($i = $recupcabinet->fetch()) {
                    # code...

                    $recupca = $conn->prepare('SELECT nom_user FROM users  WHERE email_user = ?  ');
                    $recupca->execute(array($i['email_emetteur']));
                    $nom = $recupca->fetch();

                    // if(isset($i['indexx']) and $i['indexx'] > 0 )
                    //  {
                    if ($i['lecture'] == "non") {
                      # code...


                  ?>
                      <tr class="unread clickable-row">
                        <td>
                          <input type="checkbox" class="checkmail">
                        </td>
                        <td><span class="mail-important"><i class="far fa-star"></i></span>
                        </td>
                        <td>
                          <strong><a href="message_contenu.php?nbr=<?php echo $i['id']; ?>"><?php echo $nom['nom_user']; ?></a></strong>
                        </td>
                        <td>
                          <strong><a href="message_contenu.php?nbr=<?php echo $i['id']; ?>"><?php echo $i['sujet']; ?></a></strong>
                        </td>

                        <td>
                          <strong><a href="message_contenu.php?nbr=<?php echo $i['id']; ?>"><?php
                                                                                            if (date("Y-m-d 00:00:00") <= $i['datee'] and date("Y-m-d 23:59:59") >= $i['datee']) {
                                                                                              echo "Aujourd'hui";
                                                                                            } else
                                                                                              echo $i['datee']; ?></a></strong>
                        </td>

                      </tr>
                    <?php
                    } else {

                    ?>
                      <tr class="unread clickable-row">
                        <td>
                          <input type="checkbox" class="checkmail">
                        </td>
                        <td><span class="mail-important"><i class="far fa-star"></i></span>
                        </td>
                        <td class="name">
                          <a href="message_contenu.php?nbr=<?php echo $i['id']; ?>"><?php echo $nom['nom_user']; ?></a>
                        </td>
                        <td scope="row"><a href="message_contenu.php?nbr=<?php echo $i['id']; ?>"><?php echo $i['sujet']; ?></a>
                        </td>
                        <td class="subject"><a href="message_contenu.php?nbr=<?php echo $i['id']; ?>"><?php if (date("Y-m-d 00:00:00") <= $i['datee'] and date("Y-m-d 23:59:59") >= $i['datee']) {
                                                                                                        echo "Aujourd'hui";
                                                                                                      } else
                                                                                                        echo $i['datee']; ?></a>
                        </td>
                      <?php
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
    </div>
  </div>
  <!--  -->
  <!--  --><!--  -->

  <div class="content container-fluid">

    <div class="page-header">
      <div class="row">
        <div class="col">
          <h3 class="page-title">Inbox</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Inbox</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4">
        <div class="compose-btn">
          <a href="compose.html" class="btn btn-primary btn-block">
            Nouveau message
          </a>
        </div>
        <ul class="inbox-menu">
          <li class="active">
            <a href="#"><i class="fas fa-download"></i> Tout les message <span class="mail-count">(5)</span></a>
          </li>
          <li>
            <a href="#"><i class="far fa-star"></i> Important</a>
          </li>
          <li>
            <a href="#"><i class="far fa-paper-plane"></i>mail envoye</a>
          </li>
          <li>
            <a href="#"><i class="far fa-file-alt"></i> Archiver <span class="mail-count">(13)</span></a>
          </li>
          <li>
            <a href="#"><i class="far fa-trash-alt"></i> Corbeille</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-9 col-md-8">
        <div class="card">
          <div class="card-body">
            <div class="email-header">
              <div class="row">
                <div class="col top-action-left">
                  <div class="float-start">
                    <div class="btn-group dropdown-action">
                      <button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">Select <i class="fas fa-angle-down"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">None</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Read</a>
                        <a class="dropdown-item" href="#">Unread</a>
                      </div>
                    </div>

                    <div class="btn-group dropdown-action mail-search">
                      <input type="text" placeholder="Search Messages" class="form-control search-message">
                    </div>
                  </div>
                </div>
                <div class="col-auto top-action-right">
                  <div class="text-end">
                    <button type="button" title="Refresh" data-bs-toggle="tooltip" class="btn btn-white d-none d-md-inline-block"><i class="fas fa-sync-alt"></i></button>
                    <div class="btn-group">
                      <a class="btn btn-white"><i class="fas fa-angle-left"></i></a>
                      <a class="btn btn-white"><i class="fas fa-angle-right"></i></a>
                    </div>
                  </div>
                  <div class="text-end">
                    <span class="text-muted d-none d-md-inline-block">Showing 10 of 112
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="email-content">
              <div class="table-responsive">
                <table class="table table-inbox table-hover">
                  <!-- all check -->
                  <thead>
                    <tr>
                      <th colspan="6">
                        <input type="checkbox" class="checkbox-all">
                      </th>
                    </tr>
                  </thead>
                  <!-- all check -->
                  <tbody>
                    <!-- cliquable -->
                    <tr class="unread clickable-row">
                      <td>
                        <input type="checkbox" class="checkmail">
                      </td>
                      <td><span class="mail-important"><i class="fas fa-star starred"></i></span></td>
                      <td class="name">John Doe</td>
                      <td class="subject">Lorem ipsum dolor sit amet, consectetuer
                        adipiscing elit</td>
                      <td><i class="fas fa-paperclip"></i></td>
                      <td class="mail-date">13:14</td>
                    </tr>
                    <!-- cliquable -->
                    <!-- Noncliquable -->

                    <tr class="clickable-row">
                      <td>
                        <input type="checkbox" class="checkmail">
                      </td>
                      <td><span class="mail-important"><i class="far fa-star"></i></span>
                      </td>
                      <td class="name">Twitter</td>
                      <td class="subject">HRMS Bootstrap Admin Template</td>
                      <td></td>
                      <td class="mail-date">30 Nov</td>
                    </tr>
                    <!-- Noncliquable -->

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--  --><!--  -->
  <!--  -->

<?php
}
?>


<!-- <script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/script.js"></script> -->
</body>

</html>