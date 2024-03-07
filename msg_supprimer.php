<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notaris Mail</title>
  <link rel="shortcut icon" href="./gmailcl/assests/images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./gmailcl/assests/css/style.css">
</head>

<body>

  <header class="header">
    <div class="nav-left d-flex">
      <!-- <div class="toggle-menu d-flex">
        <i class="fa-solid fa-bars d-flex"></i>
      </div> -->
      <div class="logo-box">
        <div class="logo">
          <img src="assetstyle/img/LOGONOTARIS.png" alt="logo">
        </div>
        <!-- <span class="logo-text">Gmail</span> -->
      </div>
    </div>
    <div class="search-box">
      <div class="search-icon">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
      <div class="search-input">
        <input type="text" name="email" id="Inputemail" placeholder="Search mail">
      </div>
      <div class="clear-search">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </div>
    <!--  -->
    <div class="nav-right">
      <i class="fa-solid fa-arrow-right-from-bracket"></i>
      <div class="user-profile hover">
        <img src="./gmailcl/assests/images/user.png" alt="user profile">
      </div>
    </div>
    <!--  -->
  </header>
  <div class="container">
    <div class="sidebar menu-open">
      <div class="sidebar-links navigation ">
        <div class="compose">
          <ol>
            <li>
              <span class="nav-icons"><i class="fa-solid fa-pen "></i></span>
              <span class="title">Nouveau message</span>
            </li>
          </ol>
        </div>
        <ul>
          <li>
            <a href="msgmail.php">
              <span class="nav-icons"><i class="fa-solid fa-image "></i></span>
              <span class="title">Tout</span>
            </a>
          </li>
          <li>
            <a href="msg_important.php">
              <span class="nav-icons"><i class="fa-regular fa-star"></i></span>
              <span class="title">Important</span>
            </a>
          </li>
          <li>
            <a href="msg_envoyer.php">
              <span class="nav-icons"><i class="fa-regular fa-paper-plane"></i></span>
              <span class="title">Mail Envoyer</span>
            </a>

          </li>
          <li>
            <a href="msg_archiver.php">
              <span class="nav-icons"><i class="fa-regular fa-file"></i></span>
              <span class="title">Archiver</span>
            </a>

          </li>
          <li class="active">
            <a href="msg_supprimer.php">
              <span class="nav-icons"><i class="fa-regular fa-file"></i></span>
              <span class="title">Corbeille</span>
            </a>

          </li>
        </ul>
      </div>
    </div>
    <div class="main">
      <div class="main-header">
        <div class="select-main-box">
          <input type="checkbox" name="dk" id="">
        </div>
        <div class="refresh-icon">
          <i class="fa-solid fa-rotate-right"></i>
        </div>
        <div class="more-icon">
          <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>
      </div>
      <!--  -->
      <div class="mail-sectionll">
        <div class="mail">
          <div class="mail-left-sec d-flex">
            <input type="checkbox" name="" id="" class="selectmail">
            <div class="mail-stared">
              <i class="fa-regular fa-star"></i>
            </div>
            <div class="main-sender">
              <p>{elem.sender}</p>
            </div>
          </div>
          <div class="message">
            <span class="message-subject">{elem.subject}objetnii</span>
            <span class="message-content">{elem.message}contenuuurrhrhrhdhdhrhhrhrhr</span>
          </div>
          <div class="mailfbox">
            <p class="date">${elem.date}dati</p>
            <div class="mail-function d-flex">
              <div class="google-calender hover">
                <!-- <i class="fa-solid fa-trash"></i> -->
                <img src="./gmailcl/assests/images/trash.png" alt="Google Calendar">
              </div>
              <div class="google-keep hover">
                <img src="./gmailcl/assests/images/archive-tick.png" alt="Google Calendar">
              </div>
            </div>
          </div>

        </div>

      </div>
      <!--  -->
      <!-- <div class="footer">
                <div class="storage">
                    <div class="storage-bar">
                        <div class="storage-thumb"></div>
                    </div>
                    <p>1.53 GB of 15 GB used</p>
                </div>
                <div class="copyright">
                    <a href="#">Terms</a>
                    <a href="#">Privacy</a>
                    <a href="#">Aditya Rawat</a>
                </div>
                <div class="activity">
                    <p>Last account activity: 2 hours ago</p>
                </div>
            </div> -->

      <div class="send-mail">
        <div class="send-mail-title">
          <div class="div">
            <p>New Message</p>
          </div>
          <div class="close-sendmail">
            <i class="fa-solid fa-xmark"></i>
          </div>
        </div>
        <div class="mail-content">
          <div>
            <input type="email" class="recipients" placeholder="Recipients">
            <hr>
          </div>
          <div>
            <input type="text" class="subject" placeholder="Subject">
            <hr>
          </div>
          <div class="msg-details">
            <textarea name="" id="msg-content" cols="30" rows="10"></textarea>
          </div>
        </div>
        <div class="send-function">
          <div class="mail-type d-flex">
            <div class="send-btn">
              Send
            </div>
            <div class="formatting">
              <i class="fa-solid fa-a hover"></i>
            </div>
            <div class="insert-file">
              <i class="fa-solid fa-paperclip hover"></i>
            </div>
            <div class="insert-link">
              <i class="fa-solid fa-link hover"></i>
            </div>
            <div class="insert-emoji">
              <i class="fa-solid fa-face-smile hover"></i>
            </div>
            <div class="google-drive">
              <i class="fa-brands fa-google-drive hover"></i>
            </div>
            <div class="insert-signature">
              <i class="fa-solid fa-signature hover"></i>
            </div>
            <div class="more-options">
              <i class="fa-solid fa-ellipsis-vertical hover"></i>
            </div>
          </div>
          <div class="delete-msg">
            <i class="fa-solid fa-trash hover"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- ======================= side panel ============================= -->
    <div class="side-panel">
      <div class="google-calender hover">
        <img src="./gmailcl/assests/images/Google_Calendar.png" alt="Google Calendar">
      </div>
      <div class="google-keep hover">
        <img src="./gmailcl/assests/images/google-keep.png" alt="Google Calendar">
      </div>
      <div class="google-task hover">
        <img src="./gmailcl/assests/images/Google_Tasks.png" alt="Google Calendar">
      </div>
    </div>
  </div>

  <script src="./gmailcl/assests/js/mails.js"></script>
  <script src="./gmailcl/assests/js/app.js"></script>
</body>

</html>