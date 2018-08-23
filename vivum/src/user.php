<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

/*if (isset($_SESSION['userinfo']['id'])) {*/
  $u = $_SESSION['userinfo'];
  /*echo "<SCRIPT>console.log(\"Logged in.\")</SCRIPT>";
} else {
  echo '<script>window.location.replace("/")</script>';
  die();
}*/

?>
  <!DOCTYPE html>
  <html>

  <head>
        <meta charset="utf-8">
        <title>viv.um</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\css\material.min.css">
        <script src="assets\js\jquery-3.3.1.min.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="assets\css\bootstrap.min.css.map">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <script defer src="assets/js/material.min.js"></script>
    </head>

  <body>
  <style>
  .home{
    padding-top:30px;
    padding-left:30px;
    background: url('../assets/imgs/blue.png') center / cover;
    background-attachment: fixed;
    height: 300px;
  }
  </style>
  <div class="demo-layout-waterfall mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--waterfall">
    <!-- Top row, always visible -->
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">viv.um</span>
      <div class="mdl-layout-spacer"></div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="waterfall-exp">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="waterfall-exp">
        </div>
      </div>
    </div>
    <!-- Bottom row, not visible on scroll -->
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <span class="mdl-navigation__link">Hey, <?php echo $u['username']; ?></span>
        <a class="mdl-navigation__link" href="logout.php">Logout</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title"><code>viv.um</code></span>
    <nav class="mdl-navigation">
    <span style="margin:auto;">Hey, <?php echo $u['username']; ?></span>

      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="logout.php">Logout</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content">
      <div class='home'>
        <h1>home.div</h1>
      </div>
    </div>
  </main>
</div>
  </body>

  </html>
